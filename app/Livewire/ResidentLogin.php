<?php

namespace App\Livewire;

use Livewire\Component;

class ResidentLogin extends Component
{
    public $phone = ''; // Replace 'email' with 'phone'
    public $password = '';

    public function login()
    {
        $this->validate([
            'phone' => 'required|regex:/^0\d{10}$/', // Validate as a Philippine phone number
            'password' => 'required|min:6',
        ]);
        $phone = $this->phone;
        $formattedPhone = preg_replace('/^0/', '+63', $phone);
        $resident = \DB::table('residents')
            ->where('phone', $formattedPhone, 1)
            ->first();

        if ($resident) {
            // Attempt to log in using the related user's credentials
            if (auth()->attempt(['id' => $resident->user_id, 'password' => $this->password])) {
                return redirect()->route('residents-dashboard'); // Adjust to your intended route
            } else {
                session()->flash('error', 'Invalid phone or password.');
            }
        } else {
            session()->flash('error', 'Phone number not found.');
        }
    }


    public function render()
    {
        return view('livewire.resident-login');
    }
}
