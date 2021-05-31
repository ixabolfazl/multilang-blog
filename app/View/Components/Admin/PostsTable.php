<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class PostsTable extends Component
{
    public $posts;
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($posts, $type = 'posts')
    {
        $this->posts = $posts;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.posts-table');
    }
}
