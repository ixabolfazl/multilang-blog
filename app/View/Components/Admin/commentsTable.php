<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class commentsTable extends Component
{

    public $comments;
    public $type;

    /**
     * Create a new component instance.
     *
     * @param $comments
     * @param string $type
     */
    public function __construct($comments, $type = 'comments')
    {
        $this->comments = $comments;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.comments-table');
    }
}
