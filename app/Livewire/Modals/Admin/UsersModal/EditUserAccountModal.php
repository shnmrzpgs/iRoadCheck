<?php

namespace App\Livewire\Modals\Admin\UsersModal;

use App\Models\User;
use App\Models\UserProfilePhoto;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditUserAccountModal extends Component
{
    use WithFileUploads;

    public $user; // User data
    public $photo; // For the uploaded photo
    public $currentPhoto; // Existing profile photo URL

    public $first_name;
    public $email;

    public function mount($user)
    {
        $this->user = $user;
        $this->first_name = $user->first_name;
        $this->email = $user->email;

        // Retrieve the existing profile photo, if any
        $existingPhoto = UserProfilePhoto::where('user_id', $this->user->id)->first();
        $this->currentPhoto = $existingPhoto ? Storage::url($existingPhoto->photo_path) : null;
    }

    public function save()
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'photo' => 'nullable|image|max:2048', // Validate photo if uploaded
        ]);

        $this->user->update([
            'first_name' => $this->first_name,
            'email' => $this->email,
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

        session()->flash('message', 'User account updated successfully.');
        $this->emit('userUpdated'); // Emit an event to notify listeners
    }

    public function render()
    {
        return view('livewire.modals.admin.users-modal.edit-user-account-modal');
    }
}
