<?php

namespace App\Livewire\Forms;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;
use Livewire\Form;
use PHPUnit\Framework\MockObject\Exception;

class EditStaffRoleForm extends Component
{
    public function render(): Factory|View|Application|\Illuminate\View\View
    {
        return view('livewire.forms.edit-staff-role-form');
    }
}
