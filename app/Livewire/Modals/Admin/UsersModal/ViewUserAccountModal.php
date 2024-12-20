<?php

namespace App\Livewire\Modals\Admin\UsersModal;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use App\Models\User;
use Livewire\Attributes\Modelable;
use Livewire\Attributes\On;
use Livewire\Component;

class ViewUserAccountModal extends Component
{
    #[Modelable]
    public ?User $user = null;

    public string $identifier = '';

    public function mount(): void
    {
        $this->identifier = uniqid(); // Generates a unique identifier for the modal
    }

    #[On('show-view-user-modal')]
    public function showModal(): void
    {
        $this->dispatch('show-'.$this->identifier); // Dispatch event to show modal
        $this->dispatch('view-user-modal-shown'); // Optional event to indicate the modal is shown
    }

    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.modals.admin.users-modal.view-user-modal');
    }
}
