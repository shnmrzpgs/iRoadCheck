<?php

// namespace App\Livewire\Forms;

// use Livewire\Form;
// use Illuminate\Support\Facades\DB;
// use App\Models\UserProfilePhoto;
// use Illuminate\Validation\Rules\Password;
// use Exception;
// use Illuminate\Support\Facades\Storage;

// class EditUserAccountForm extends Form
{
    // public string $first_name = '';

    // public string $middle_name = '';

    // public string $last_name = '';

    // public string $sex = '';

    // public ?string $date_of_birth = null;

    // public string $email = '';
    // //Permission

    // public ?string $role = null;

    // public string $password = '';

    // public bool $user_status = true;
    // public $staff;
    // public $form;
    // public $photo;
    // public $photo_path;
    // public $user;

    // public function mount($staff): void
    // {
    //     $this->staff = $staff;
    //     $this->first_name = $staff->user->first_name;
    //     $this->middle_name = $staff->user->middle_name;
    //     $this->last_name = $staff->user->last_name;
    //     $this->sex = $staff->user->sex;
    //     $this->date_of_birth = $staff->user->date_of_birth;
    //     $this->email = $staff->user->email;

    //     $this->user_status = $staff->user_status;
    // }

    // public function rules(): array
    // {
    //     return [
    //         'first_name' => ['required', 'string'],
    //         'middle_name' => ['nullable', 'string'],
    //         'last_name' => ['required', 'string'],
    //         'sex' => ['required', 'in:male,female'],
    //         'date_of_birth' => ['nullable', 'date', 'date_format:Y-m-d'],
    //         'email' => ['required', 'email', 'unique:users,email'],
    //         'password' => ['required', 'string', Password::default()],
    //     ];
    // }

    // public function messages(): array
    // {
    //     return [
    //         // Basic information
    //         'first_name.required' => 'The first name field is required.',
    //         'middle_name.string' => 'The middle name field must be a string.',
    //         'last_name.required' => 'The last name field is required.',
    //         'sex.required' => 'The gender field is required.',
    //         'email.required' => 'The email field is required.',
    //         'email.email' => 'The email field must be a valid email.',
    //         'email.unique' => 'The email field has already been taken.',
    //         'email.exists' => 'The email field is invalid.',
    //         'password.required' => 'The password field is required.',
    //     ];
    // }

    // public function save(): bool
    // {
    //     if ($this->user->is_first_time) {
    //         $this->validate([
    //             'password' => ['required', 'string', Password::default()],
    //             'photo' => 'nullable|image|max:2048',
    //         ]);
    //     }

    //     $this->validate();

    //     DB::beginTransaction();

    //     try {
    //         if ($this->staff->user->is_first_time) {
    //             $this->staff->user->update([
    //                 'generated_password' => $this->password,
    //                 'password' => bcrypt($this->password),
    //             ]);
    //         }

    //         $this->staff->user->update([
    //             'last_name' => $this->last_name,
    //             'first_name' => $this->first_name,
    //             'middle_name' => $this->middle_name,
    //             'email' => $this->email,
    //             'status' => $this->user_status,
    //             'sex' => $this->sex,
    //             'date_of_birth' => $this->date_of_birth,
    //             'updated_at' => now(),
    //         ]);

    //         if ($this->photo) {
    //             $existingPhoto = UserProfilePhoto::where('user_id', $this->user->id)->first();
    //             if ($existingPhoto) {
    //                 Storage::delete($existingPhoto->photo_path);
    //                 $existingPhoto->delete();
    //             }
        
    //             $path = $this->photo->store('profile_photos');
    //             UserProfilePhoto::create([
    //                 'user_id' => $this->user->id,
    //                 'photo_path' => $path,
    //             ]);
    //         }

    //         DB::commit();

    //         return true;
    //     } catch (Exception $e) {
    //         DB::rollback();

    //         return false;
    //     }
    // }

    // //   protected function isRootComponent() {}

    // public function render()
    // {
    //     return view('livewire.forms.edit-user-account-form');
    // }
// }
