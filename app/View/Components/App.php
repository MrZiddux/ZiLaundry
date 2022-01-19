<?php

namespace App\View\Components;

use Illuminate\View\Component;

class App extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $script, $title, $btm;
    public function __construct($script = null, $title = null, $btm = null)
    {
        $this->script = $script ?? "";
        $this->title = $title ?? "";
        $this->btm = $btm ?? "";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.app');
    }
}
