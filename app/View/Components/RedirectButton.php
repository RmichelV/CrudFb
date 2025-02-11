<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RedirectButton extends Component
{
    public $url;
    public $text;
    public $type;
    public $class;
    public $id;

    public function __construct($url, $text='',$type='button', $class='', $id='')
    {
        $this->url = $url;
        $this->text = $text;
        $this->type = $type;
        $this->class = $class;
        $this->id = $id;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.redirect-button');
    }
}
