<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchBar extends Component
{
    public $action;
    public $method;
    public $placeholder;

    public function __construct($action = '#', $method = 'GET', $placeholder = 'Search')
    {
        $this->action = $action;
        $this->method = $method;
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('components.search-bar');
    }
}
