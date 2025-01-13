<?php

namespace App\Livewire\Pages\Admin;

//use App\Mail\OtpMail;
use App\Models\AdminLog;

//use App\Models\OtpVerification;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class ProfileEdit extends Component
{
    public $id_number;

    public $current_password;

    public $password;

    public $password_confirmation;

    public $first_name;

    public $middle_name;

    public $last_name;

    public $gender;

    public $phone;

    public $email;

    public $work_position;

    public $showModal = false;

    public function mount(): void
    {
        $user = Auth::user();
        $this->id_number = $user->id_number;
        $this->first_name = $user->first_name;
        $this->middle_name = $user->middle_name;
        $this->last_name = $user->last_name;
        $this->gender = $user->gender;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->work_position = $user->admin->work_position;
    }

    public function updateAccount(): void
    {
        $user = Auth::user();

        $this->validate([
            'id_number' => ['required', 'string'],
            'current_password' => ['required', 'string'],
            'password' => ['nullable', 'confirmed', Password::min(8)],
        ]);

        if (! Hash::check($this->current_password, $user->password)) {
            $this->dispatch('admin_password_update_fail');

            return;
        }

        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        $user->id_number = $this->id_number;
        $user->save();
        AdminLog::create([
            'action' => 'Update Account',
            'description' => 'Admin updated account details',
            'date' => now(),
            'user_id' => $user->id
        ]);
        $this->dispatch('admin_password_updated');
    }

    public function updatePersonalInfo(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:male,female,other'],
            'phone' => ['required', 'string', 'max:15'],
            'email' => ['required', 'email', 'max:255'],
            'work_position' => ['required'],
        ]);

        if ($user->email !== $this->email) {
            // Check for duplicate email
            if (User::where('email', $this->email)->exists()) {
                $this->dispatch('duplicate_email');

                return;
            }

            // Generate and send OTP
            $otp = rand(100000, 999999);

            OtpVerification::updateOrCreate(
                ['email' => $this->email],
                ['otp' => $otp, 'expires_at' => now()->addMinutes(2)]
            );

            Mail::to($this->email)->send(new OtpMail($otp));

            // Show the OTP modal
            $this->dispatch('show_otp_verification_modal', new_email: $this->email);
        }

        $user->update([
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'last_name' => $validated['last_name'],
            'gender' => $validated['gender'],
            'phone' => $validated['phone'],
        ]);

        $user->admin->update(['work_position' => $validated['work_position']]);

        AdminLog::create([
            'action' => 'Update Personal Info',
            'description' => 'Admin updated personal info (name, phone, etc.)',
            'date' => now(),
            'user_id' => $user->id
        ]);

        $this->dispatch('admin_profile_updated');
    }

    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        return view('livewire.pages.admin.profile-edit');
    }
}

