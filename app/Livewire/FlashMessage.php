<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class FlashMessage extends Component
{
    public $message;
    public $type;
    public function mount()
    {
        $this->message = session('feedback');
        $this->type = session('feedback_type');

        // Clear session after rendering
        Session::forget(['feedback', 'feedback_type']);
    }
    public function render()
    {
        return view('livewire.flash-message');
    }
}
