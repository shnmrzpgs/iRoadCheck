<?php

namespace App\Livewire\Modals\Admin\UsersModal;

use App\Models\User;
use App\Models\UserProfilePhoto;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Enums\User\UserSex;
use App\Enums\Staff\StaffStatus;
use App\Models\Staff;
use App\Models\StaffRole;
use App\Models\StaffRolesPermissions;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Form;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class EditUserAccountModal extends Component
{
    use WithFileUploads;

    public Collection $sexes;
    public Collection $staff_status;
    public Collection $roles;
    public string $identifier = '';
    public $photo;
    public $currentPhoto;
    public ?Staff $staff = null;
    public array $form = [
        'first_name' => '',
        'middle_name' => '',
        'last_name' => '',
        'sex' => '',
        'date_of_birth' => '',
        'username' => '',
        'password' => '',
        'user_role' => '',
        'is_disabled' => false,
    ];
    public $photo_path;

    public array $selectedPermissions = [];

    public function mount(): void
    {
        $this->sexes = collect([
            (object) ['id' => UserSex::MALE, 'value' => UserSex::MALE],
            (object) ['id' => UserSex::FEMALE, 'value' => UserSex::FEMALE],
        ]);

        $this->staff_status = collect([
            (object) ['id' => StaffStatus::ACTIVE, 'value' => 'active'],
            (object) ['id' => StaffStatus::INACTIVE, 'value' => 'inactive'],
        ]);

        $this->roles = StaffRole::with('permissions')->get();
    }

    public function updatedFormUserRole($staffRoleId): void
    {
        $role = StaffRole::with('permissions')->find($staffRoleId);
        $this->selectedPermissions = $role ? $role->permissions->pluck('name')->toArray() : [];
    }


    #[On('show-edit-user-account-modal')]
    public function showModal(Staff $staff): void
    {
        $this->staff = $staff;

        // Load existing staff data into form
        $this->form = [
            'first_name' => $staff->user->first_name,
            'middle_name' => $staff->user->middle_name,
            'last_name' => $staff->user->last_name,
            'sex' => $staff->user->sex,
            'date_of_birth' => $staff->user && $staff->user->date_of_birth
                ? Carbon::parse($staff->user->date_of_birth)->format('F j, Y')
                : '',
            'username' => $staff->username,
            'password' => $staff->user->generated_password ?? '',
            'user_role' => $staff->staffRolesPermissions->staffRole->id,
            'is_disabled' => $staff->status === StaffStatus::INACTIVE,
        ];


        // $profilePhoto = $staff->user->profilePhoto;
        // $this->currentPhoto = $profilePhoto ? asset('storage/' . $profilePhoto->photo_path) : null;

        if ($staff->user->profilePhoto) {
            $this->currentPhoto = asset('storage/' . $staff->user->profilePhoto->photo_path);
        } else {
            $this->currentPhoto = null;
        }

        $role = StaffRole::with('permissions')->find($this->form['user_role']);
        $this->selectedPermissions = $role ? $role->permissions->pluck('name')->toArray() : [];
        // dd($this->staff);

        $this->dispatch('edit-user-account-modal-shown');
    }

    public array $tabs = [
        ['key' => 'basic-info', 'label' => 'Basic Information'],
        ['key' => 'access-info', 'label' => 'Access Control'],
        ['key' => 'account-info', 'label' => 'Account Settings'],
    ];

    public string $activeTab = 'basic-info';
    public array $visitedTabs = [];

    public function rules(): array
    {
        return [
            'form.first_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:50'],
            'form.last_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:50'],
            'form.username' => [
                'required',
                'string',
                Rule::unique('staffs', 'username')->ignore($this->staff->id), // Ensure unique username
            ],
            'form.date_of_birth' => ['nullable', 'date', 'before_or_equal:' . now()->subYears(18)->toDateString()],
            'form.user_role' => ['required', 'exists:staff_roles,id'],
            'form.password' => ['required', 'string', Password::default()],
            'form.sex' => ['required', 'in:' . UserSex::MALE . ',' . UserSex::FEMALE]
        ];
    }

    public function messages(): array
    {
        return [
            'form.username.unique' => 'The username is already in use.',
            'form.user_role.required' => 'The user role is required.',
            'form.first_name.required' => 'The first name is required.',
            'form.first_name.regex' => 'The first name must contain only letters and spaces.',
            'form.last_name.regex' => 'The last name must contain only letters and spaces.',
            'form.last_name.required' => 'The last name is required.',
            'form.date_of_birth.before_or_equal' => 'The staff must be at least 18 years old.',
            'form.password.required' => 'The password is required.',
            'form.username.required' => 'The username is required.',
            'form.sex.required' => 'The sex field is required.',
        ];
    }

    public function activateTab(string $tabKey): void
    {
        $this->activeTab = $tabKey;
        if (!in_array($tabKey, $this->visitedTabs)) {
            $this->visitedTabs[] = $tabKey;
        }
    }

    public function nextTab(): void
    {
        $currentIndex = collect($this->tabs)->search(fn($tab) => $tab['key'] === $this->activeTab);

        if ($currentIndex === false || $currentIndex >= count($this->tabs) - 1) {
            return;
        }

        // Validate the current tab
        $rules = $this->getValidationRulesForTab($this->activeTab);
        if (!empty($rules)) {
            $this->validate($rules);
        }

        // If validation passes, move to the next tab
        $this->visitedTabs[] = $this->activeTab;
        $this->activeTab = $this->tabs[$currentIndex + 1]['key'];
    }


    public function previousTab(): void
    {
        $currentIndex = collect($this->tabs)->search(fn($tab) => $tab['key'] === $this->activeTab);
        if ($currentIndex !== false && $currentIndex > 0) {
            $this->activeTab = $this->tabs[$currentIndex - 1]['key'];
        }
    }

    public function getValidationRulesForTab(string $tabKey): array
    {
        $rules = [
            'basic-info' => [
                'form.first_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:50'],
                'form.last_name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/', 'max:50'],
                'form.sex' => ['required', 'in:' . UserSex::MALE . ',' . UserSex::FEMALE],
                'form.date_of_birth' => ['nullable', 'date', 'before_or_equal:' . now()->subYears(18)->toDateString()],
            ],
            'access-info' => [
                'form.user_role' => ['required', 'exists:staff_roles,id'],
            ],
            'account-info' => [
                'form.password' => ['required', 'string', Password::default()],
                'form.username' => ['required', 'string', 'unique:staffs,username'],
                'photo' => ['nullable', 'image', 'max:1024'], // Example for photo validation
            ],
        ];

        return $rules[$tabKey] ?? [];
    }


    public function resetPhoto()
    {
        $this->photo = null;
        $this->dispatch('photo-reset');
    }

    public function saveProfilePhoto(string $path, User $user): void
    {
        // Delete old photo if it exists
        if ($user->profilePhoto) {
            Storage::disk('public')->delete($user->profilePhoto->photo_path);
        }

        // Update or create new photo record
        UserProfilePhoto::updateOrCreate(
            ['user_id' => $user->id],
            ['photo_path' => $path]
        );
    }

    public function updatedDateOfBirth($value): void
    {
        // Ensure date_of_birth is formatted correctly when updated
        try {
            $this->form['date_of_birth'] = Carbon::parse($value)->format('F j, Y');
        } catch (\Exception $e) {
            $this->form['date_of_birth'] = null; // Handle invalid date input
        }
    }

    public function save()
    {
        $this->validate();

        DB::beginTransaction();

        $this->validate([
            'form.first_name' => ['required', 'string'],
            'form.last_name' => ['required', 'string'],
            'form.username' => [
                'required',
                'string',
                Rule::unique('staffs', 'username')->ignore($this->staff->id), // Exclude current user
            ],
            'form.user_role' => ['required', 'exists:staff_roles,id'],
            'form.password' => ['nullable', 'string', Password::default()],
            'photo' => 'nullable|image|max:2048',
        ], [
            'form.username.unique' => 'The username is already in use.',
            'form.date_of_birth.date_format' => 'Invalid date format.',
        ]);

        try {
            // Update user information
            $this->staff->user->update([
                'first_name' => $this->form['first_name'],
                'middle_name' => $this->form['middle_name'],
                'last_name' => $this->form['last_name'],
                'date_of_birth' => $this->form['date_of_birth']
                    ? Carbon::createFromFormat('F j, Y', $this->form['date_of_birth'])->format('Y-m-d')
                    : null,

            ]);

            // Handle profile photo upload
            if ($this->photo) {
                $path = $this->photo->store('profile_photos', 'public');
                $this->saveProfilePhoto($path, $this->staff->user);

                // Update current photo display
                $this->currentPhoto = asset('storage/' . $path);
            }

            // Update password if provided
            if (!empty($this->form['password'])) {
                $this->staff->user->update([
                    'password' => bcrypt($this->form['password']),
                    'generated_password' => $this->form['password'],
                ]);
            }

            $staffRolePermission = $this->staff->staffRolesPermissions;
            $this->staff->update([
                'username' => $this->form['username'],
                'staff_roles_permissions_id' => $staffRolePermission->id,
                'status' => $this->form['is_disabled'] ? StaffStatus::INACTIVE : StaffStatus::ACTIVE,
            ]);



            DB::commit();
            session()->flash('message', 'staff Account updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to update user account: ' . $e->getMessage());
            session()->flash('error', 'Failed to update staff Account.');
        }
    }


    public function render()
    {
        return view('livewire.modals.admin.users-modal.edit-user-account-modal');
    }
}
