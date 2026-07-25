<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DangerButton extends Component
{
    public $button_type = '';
    /**
     * Create a new component instance.
     */
    public function __construct($b_type)
    {
        //
        $this->button_type = $b_type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.danger-button');
    }
}
