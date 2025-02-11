<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditButton extends Component
{
    public $type;
    public $route;
    public $id;
    public $text;
    public $class;
    public function __construct($type, $route, $id, $text, $class)
    {
        $this->type = $type;
        $this->route = $route;
        $this->id = $id;
        $this->text = $text;
        $this->class = $class;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.edit-button');
    }
}
