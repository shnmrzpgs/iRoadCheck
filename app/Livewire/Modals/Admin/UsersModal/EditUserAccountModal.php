<?php

namespace App\Livewire\Modals\Admin\UsersModal;

use App\Models\User;
use App\Models\UserProfilePhoto;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Enums\User\UserSex;
use App\Models\Staff;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class EditUserAccountModal extends Component
{
    use WithFileUploads;

    public Collection $sexes;
    public string $identifier = '';
    public $user; // User data
    public $photo; // For the uploaded photo
    public $currentPhoto; // Existing profile photo URL
    public ?Staff $staff = null;
    public $first_name;
    public $email;

    public function mount($user)
    {
        $this->identifier = uniqid('edit_user_account_modal');
        $this->sexes = collect([
            (object)[
                'id' => UserSex::MALE,
                'value' => UserSex::MALE,
            ],
            (object)[
                'id' => UserSex::FEMALE,
                'value' => UserSex::FEMALE,
            ]
        ]);

        $this->user = $user;

        if ($user) {
            $this->user = User::findOrFail($user->id); // Safely assign the user
        }

        // Retrieve the existing profile photo, if any
        // $existingPhoto = UserProfilePhoto::where('user_id', $this->user->id)->first();

        // if ($existingPhoto) {
        //     Log::info('Existing photo found: ', ['path' => $existingPhoto->photo_path]);
        // } else {
        //     Log::info('No profile photo found for user ID: ' . $this->user->id);
        // }

        // $this->currentPhoto = $existingPhoto && $existingPhoto->photo_path 
        //     ? Storage::url($existingPhoto->photo_path) 
        //     : asset('storage/icons/profile-graphics.png');
    }

    protected $listeners = ['setUser'];
    public function setUser($userId): void
    {
        $user = User::find($userId);

        if (!$user) {
            session()->flash('error', 'User not found.');
            return;
        }

        $this->mount($user); // Reinitialize the modal with the selected user
    }


    public array $tabs = [
        ['key' => 'basic-info', 'label' => 'Basic Information'],
        ['key' => 'access-info', 'label' => 'Access Control'],
        ['key' => 'account-info', 'label' => 'Account Settings'],
    ];

    public string $activeTab = 'basic-info';
    public array $visitedTabs = [];

    public function activateTab(string $tabKey): void
    {
        $this->activeTab = $tabKey;
    }

    public function nextTab(): void
    {
        $currentIndex = collect($this->tabs)->search(fn($tab) => $tab['key'] === $this->activeTab);
        if ($currentIndex !== false && $currentIndex < count($this->tabs) - 1) {
            $this->visitedTabs[] = $this->activeTab;
            $this->activeTab = $this->tabs[$currentIndex + 1]['key'];
        }
    }

    public function previousTab(): void
    {
        $currentIndex = collect($this->tabs)->search(fn($tab) => $tab['key'] === $this->activeTab);
        if ($currentIndex !== false && $currentIndex > 0) {
            $this->activeTab = $this->tabs[$currentIndex - 1]['key'];
        }
    }

    public function save()
    {
        $this->validate([
            'photo' => 'nullable|image|max:2048', // Validate photo if uploaded
        ]);

        // Handle profile photo upload
        if ($this->photo) {
            // Delete old photo if exists
            $existingPhoto = UserProfilePhoto::where('user_id', $this->user->id)->first();
            if ($existingPhoto) {
                Storage::delete($existingPhoto->photo_path);
                $existingPhoto->delete();
            }

            // Save new photo
            $path = $this->photo->store('profile_photos');
            UserProfilePhoto::create([
                'user_id' => $this->user->id,
                'photo_path' => $path,
            ]);
        }

        $form_saved = $this->form->save();


        if ($form_saved) {
            $this->dispatch('user_account_updated');
        } else {
            $this->dispatch('user_account_not_updated');
        }

        session()->flash('message', 'User account updated successfully.');
        $this->emit('userUpdated'); // Emit an event to notify listeners
    }

    public function render()
    {
        return view('livewire.modals.admin.users-modal.edit-user-account-modal');
    }
}
