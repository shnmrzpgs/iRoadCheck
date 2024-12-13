<?php

namespace App\Livewire\Pages\Admin;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class UserTypeTable extends Component
{
    public $userTypes;
    public function mount()
    {
        $this->userTypes = UserRole::all(); // Fetch all user roles
    }
    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        return view('livewire.pages.admin.user-type-table');
    }
}
