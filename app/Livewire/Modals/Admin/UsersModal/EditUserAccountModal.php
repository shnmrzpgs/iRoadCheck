<?php

namespace App\Livewire\Modals\Admin\UsersModal;
use App\Models\User;

use Livewire\Component;

class EditUserAccountModal extends Component
{
    public function render()
    {
        return view('livewire.modals.admin.users-modal.edit-user-modal');
    }
}
