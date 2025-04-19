<?php

namespace App\Livewire;

use Livewire\Component;

class NotFromTagum extends Component
{
    public $isOpen = false;
    public function mount()
    {
        // Open modal if session exists
        if (session()->has('not_from_tagum')) {
            $this->isOpen = true;
        }
    }
    public function closeModal()
    {
        $this->isOpen = false;
        session()->forget('not_from_tagum');
    }
    public function render()
    {
        return view('livewire.not-from-tagum');
    }
}
