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

    public string $identifier = ''; // Identifier property to uniquely identify the modal

    public function mount(): void
    {
        $this->identifier = uniqid(); // Generate a unique identifier for the modal instance
    }

    #[On('show-view-user-modal')]
    public function showModal(int $userId): void
    {
        $this->user = User::with('staff')->find($userId);

        if (!$this->user) {
            session()->flash('error', 'User not found.');
            return;
        }

        // Dispatch the event with the unique identifier to show the specific modal
        $this->dispatch('show-' . $this->identifier);
        $this->dispatch('view-user-modal-shown'); // Optional event to indicate the modal is shown
    }

    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.modals.admin.users-modal.view-user-modal', [
            'user' => $this->user,
            'identifier' => $this->identifier, // Pass the identifier to the view
        ]);
    }
}
