<?php

namespace App\Livewire\Modals\Admin\UsersModal;
use App\Models\User;
use App\Http\Livewire\Traits\BaseForm; 

use Livewire\Component;

class EditUserAccountModal extends Component
{
    use BaseForm; // Include shared form logic here

    public $user; // Pass user data for editing

    public function mount($user)
    {
        $this->user = $user;
        $this->fill([
            'first_name' => $user->first_name,
            'email' => $user->email,
        ]);
    }


    public function validateAndSubmit()
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $this->user->update([
            'first_name' => $this->first_name,
            'email' => $this->email,
        ]);

        session()->flash('message', 'User account updated successfully.');
    }

    public function render()
    {
        return view('livewire.edit-user-account-form');
    }
}
