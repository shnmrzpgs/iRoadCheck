<?php

namespace App\Livewire\Pages\Admin;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class UserTypeTable extends Component
{
    public function render(): Factory|Application|View|\Illuminate\View\View
    {
        return view('livewire.pages.admin.user-type-table');
    }
}
