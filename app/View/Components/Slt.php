<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\HtmlString;
use Illuminate\View\Component;

class Slt extends Component
{
    public $type;
    public $dismissible;

    protected $types=['success','danger','warning','info','primary','secondary','light','dark'];
    public function __construct($type='', $dismissible=false)
    {
        $this->type = $type;
        $this->dismissible = $dismissible;
    }

    public function validateType(){
        return in_array($this->type, $this->types)?$this->type : 'info';
    }

    public function link($text, $target="#"){
        return new HtmlString('<a href="'.$target.'" class="alert-link">'.$text.'</a>');
    }
    public function render(): View|Closure|string
    {
        return view('components.slt');
    }
}
