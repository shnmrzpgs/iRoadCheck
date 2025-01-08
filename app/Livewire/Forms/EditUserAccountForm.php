<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Exception;

class EditUserAccountForm extends Form
{
    public string $first_name = '';

    public string $middle_name = '';

    public string $last_name = '';

    public string $sex = '';

    public ?string $date_of_birth = null;

    public string $email = '';

  //   // public string $id_number = '';
  //   public string $position = '';

    //Permission

    public ?string $user_role = null;

    public string $password = '';

    public bool $user_status = true;
    public $form;
    public $photo_path;
    public $user;

  public function mount($user): void
  {
      $this->user = $user;
      $this->first_name = $user->first_name;
      $this->middle_name = $user->middle_name;
      $this->last_name = $user->last_name;
      $this->sex = $user->sex;
      $this->date_of_birth = $user->date_of_birth;
      $this->email = $user->email;
      $this->user_role = $user->userRole->user_role;
      $this->user_status = $user->user_status;
  }

  public function rules(): array
  {
      return [
          'first_name' => ['required', 'string'],
          'middle_name' => ['nullable', 'string'],
          'last_name' => ['required', 'string'],
          'sex' => ['required', 'in:male,female'],
          'date_of_birth' => ['nullable', 'date', 'date_format:Y-m-d'],
          'email' => ['required', 'email', 'unique:users,email'],
          'password' => ['required', 'string', Password::default()],
      ];
  }

  public function messages(): array
  {
      return [
          // Basic information
          'first_name.required' => 'The first name field is required.',
          'middle_name.string' => 'The middle name field must be a string.',
          'last_name.required' => 'The last name field is required.',
          'sex.required' => 'The gender field is required.',
          'email.required' => 'The email field is required.',
          'email.email' => 'The email field must be a valid email.',
          'email.unique' => 'The email field has already been taken.',
          'email.exists' => 'The email field is invalid.',
          'password.required' => 'The password field is required.',
      ];
  }

  public function save(): bool
  {
      if ($this->user->is_first_time) {
          $this->validate([
              'password' => ['required', 'string', Password::default()],
          ]);
      }

      $this->validate();

      DB::beginTransaction();

      try {
          if ($this->user->is_first_time) {
              $this->user->update([
                  'generated_password' => $this->password,
                  'password' => bcrypt($this->password),
              ]);
          }

          $this->user->update([
              'last_name' => $this->last_name,
              'first_name' => $this->first_name,
              'middle_name' => $this->middle_name,
              'email' => $this->email,
              'status' => $this->user_status,
              'sex' => $this->sex,
              'updated_at' => now(),
          ]);

          DB::commit();

          return true;
      } catch (Exception $e) {
          DB::rollback();

          return false;
      }

  }

//   protected function isRootComponent() {}

    public function render()
    {
        return view('livewire.forms.edit-user-account-form');
    }
}
