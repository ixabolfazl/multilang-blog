<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $label;
    public $placeholder;
    public $tabindex;
    public $type;

    /**
     * Create a new component instance.
     *
     * @param $name
     * @param $label
     * @param $placeholder
     * @param $tabindex
     * @param $type
     */
    public function __construct($name, $label, $placeholder = null, $tabindex, $type = 'text')
    {
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder == null ? $label : $placeholder;
        $this->tabindex = $tabindex;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.input');
    }
}
