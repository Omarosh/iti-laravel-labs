<?php

namespace App\View\Components;

use Illuminate\View\Component;

class mybutton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public $href;
    
    public function __construct($type, $href)
    {
        $this->type = $type;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.mybutton');
    }
}
