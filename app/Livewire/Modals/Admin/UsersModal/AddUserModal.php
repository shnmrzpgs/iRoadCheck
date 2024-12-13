<?php

//namespace App\Livewire\Modals\Admin\UsersModal;
//
//use Illuminate\Contracts\View\Factory;
//use Illuminate\Contracts\View\View;
//use Illuminate\Foundation\Application;
//use Livewire\Component;
//
//class AddUserModal extends Component
//{
//    public function render(): Application|Factory|View|\Illuminate\View\View
//    {
//        return view('livewire.modals.admin.users-modal.add-user-modal');
//    }
//}


namespace App\Livewire\Modals\Admin\UsersModal;

use App\Livewire\Forms\AddUserForm;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AddUserModal extends Component
{
    public AddUserForm $form;

    public $firstName, $middleName, $lastName, $gender, $email, $password, $userType;
    public $userTypePermissions = [
        'Admin' => ['Manage Users', 'View Reports'],
        'Editor' => ['Edit Content', 'View Reports'],
        'Viewer' => ['View Content'],
    ];

    protected $rules = [
        'firstName' => 'required|string|max:255',
        'middleName' => 'nullable|string|max:255',
        'lastName' => 'required|string|max:255',
        'gender' => 'required|in:Male,Female,Other',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
        'userType' => 'required|string|in:Admin,Editor,Viewer',
    ];

    public function submit(): void
    {
        $this->validate();

        User::create([
            'first_name' => $this->firstName,
            'middle_name' => $this->middleName,
            'last_name' => $this->lastName,
            'gender' => $this->gender,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'user_type' => $this->userType,
        ]);

        session()->flash('message', 'User account created successfully!');
        $this->reset();
    }

    public function render(): Application|Factory|View
    {
        return view('livewire.modals.admin.users-modal.add-user-modal', [
            'userTypePermissions' => $this->userTypePermissions,
        ]);
    }
}
