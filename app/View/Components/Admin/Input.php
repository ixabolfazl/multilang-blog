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
    public $value;
    public $local;
    public $dir;
    public $disabled;

    /**
     * Create a new component instance.
     *
     * @param $name
     * @param null $label
     * @param null $placeholder
     * @param $tabindex
     * @param null $value
     * @param string $type
     * @param null $local
     * @param $disabled
     */
    public function __construct($name, $label = null, $placeholder = null, $tabindex, $value = null, $type = 'text', $local = null, $disabled = false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder == null ? $label : $placeholder;
        $this->tabindex = $tabindex;
        $this->type = $type;
        $this->value = $value;
        $this->disabled = $disabled;
        $this->local = $local != null ? $local : app()->getLocale();
        $this->dir = $this->local == 'fa' ? 'rtl' : 'ltr';

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
