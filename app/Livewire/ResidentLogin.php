<?php

namespace App\Livewire;

use Livewire\Component;

class ResidentLogin extends Component
{
    public $email = '';
    public $password = '';
    public function login()
    {

        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('residents-dashboard'); // Change 'dashboard' to your intended route
        } else {
            session()->flash('error', 'Invalid email or password.');
        }
    }


    public function render()
    {
        return view('livewire.resident-login');
    }
}
