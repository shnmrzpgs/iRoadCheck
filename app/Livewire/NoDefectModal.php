<?php

namespace App\Livewire;

use Livewire\Component;

class NoDefectModal extends Component
{
    public $isOpen = false;

    public function mount()
    {
        // Open modal if session exists
        if (session()->has('no_defect_modal_open')) {
            $this->isOpen = true;
        }
    }

    public function closeModal()
    {
        $this->isOpen = false;
        session()->forget('no_defect_modal_open');
    }

    public function render()
    {
        return view('livewire.no-defect-modal');
    }
}
