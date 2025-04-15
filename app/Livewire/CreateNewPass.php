<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateNewPass extends Component
{
    public $password, $confirmPassword;
    public function render()
    {
        return view('livewire.create-new-pass');
    }
    public function newPass()
    {
        $this->validate([
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',      // at least one lowercase letter
                'regex:/[A-Z]/',      // at least one uppercase letter
                'regex:/[0-9]/',      // at least one number
                'regex:/[@$!%*#?&]/', // at least one special character
            ],
            'confirmPassword' => 'required|same:password',
        ], [
            'password.regex' => 'Password must include uppercase, lowercase, number, and a symbol.',
            'confirmPassword.same' => 'Password confirmation does not match.',
        ]);

        $user = auth()->user();

        $user->password = bcrypt($this->password);
        $user->save();
        if ($user->resident) {
            $user->resident->is_activated = 1;
            $user->resident->save();
        }

        $this->reset(['password', 'confirmPassword']);
        Auth::logout();
        session()->flash('success', 'Your password has been updated successfully!');
        return $this->redirect('/resident/login', navigate: true);
    }
}
