<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class checkboxStatus extends Component
{
    public $name;
    public $label;

    /**
     * Create a new component instance.
     *
     * @param $name
     * @param $label
     */
    public function __construct($name, $label)
    {
        $this->name = $name;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.checkbox-status');
    }
}
