<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FirstLoginModal extends Component
{
    public $showModal = false;

    protected $listeners = ['openFirstLoginModal' => 'openModal'];

    public function mount(): void
    {
        $user = Auth::user();

        // Check if it's the first login and if the modal has already been shown in this session
        if ($user && $user->first_login && !Session::has('first_login_shown')) {
            $this->showModal = true;
            $user->update(['first_login' => false]); // Update the database
            Session::put('first_login_shown', true); // Store session flag
        }
    }

    public function openModal(): void
    {
        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
    }

    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        return view('livewire.first-login-modal');
    }
}
