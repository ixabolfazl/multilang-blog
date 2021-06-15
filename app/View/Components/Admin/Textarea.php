<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $name;
    public $label;
    public $placeholder;
    public $tabindex;
    public $type;
    public $value;
    public $rows;
    public $local;
    public $dir;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string $label
     * @param string $placeholder
     * @param int $tabindex
     * @param string $value
     * @param string $type
     * @param string $local
     * @param int $rows
     */
    public function __construct($name, $label = null, $placeholder = null, $tabindex, $value = null, $type = 'default', $rows = 2, $local = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder == null ? $label : $placeholder;
        $this->tabindex = $tabindex;
        $this->type = $type;
        $this->value = $value;
        $this->rows = $rows;
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
        return view('components.admin.textarea');
    }
}
