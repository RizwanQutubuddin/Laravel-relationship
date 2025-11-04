<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Create a new component instance.
     */
    public $type;
    public $message;

    protected $types=['success','danger','warning','info','primary','secondary','light','dark'];
    public function __construct($type='', $message='empty alert message')
    {
        $this->type = $type;
        $this->message = $message;
    }

    public function validateType(){
        return in_array($this->type, $this->types)?$this->type : 'info';
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
