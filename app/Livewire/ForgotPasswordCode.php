<?php

namespace App\Livewire;

use App\Models\Resident;
use Livewire\Component;
use function Laravel\Prompts\clear;

class ForgotPasswordCode extends Component
{
    public $code;

    public function render()
    {
        return view('livewire.forgot-password-code');
    }
    public function verify(){
        $validated = $this->validate([
            'code' => ['required', 'digits:6'],
        ]);

        $code = $validated['code'];

        // Get the currently logged in user
        $user = \Auth::user();

        // Find the resident associated with this user
        $resident = Resident::where('user_id', $user->id)->first();

        if (!$resident) {
            session()->flash('error', 'No resident record found for your account.');
            return null;
        }

        if ($resident->code == $code) {

            // Code is correct — proceed (e.g. redirect or flag as verified)
            return $this->redirect(route('createNewPass'), navigate: true);

        } else {
            $this->code = clear();
            session()->flash('error', 'The verification code you entered is incorrect.');
            return $this->redirect('/resident/enter-code', navigate: true);
        }
    }
}
