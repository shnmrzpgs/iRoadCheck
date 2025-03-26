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
    public $hideSearchBar;

    public function __construct($action = '#', $method = 'GET', $placeholder = 'Search', $hideSearchBar = false)
    {
        $this->action = $action;
        $this->method = $method;
        $this->placeholder = $placeholder;

        // Ensure the condition is correctly handled
        $this->hideSearchBar = $hideSearchBar || request()->routeIs('admin.profile-edit') || request()->routeIs('admin.road-defect-reports');
    }

    public function render(): View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\Support\Htmlable|Closure|string|\Illuminate\View\View
    {
        return view('components.search-bar', [
            'action' => $this->action,
            'method' => $this->method,
            'placeholder' => $this->placeholder,
            'hideSearchBar' => $this->hideSearchBar,
        ]);
    }
}
