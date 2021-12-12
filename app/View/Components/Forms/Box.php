<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Box extends Component
{
    public $id;
    public $name;
    public $type;
    public $label;
    public $value;
    public $disabled;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $id = '',
        $name = '',
        $type = 'checkbox',
        $label = '',
        $value = '',
        $disabled = false
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->label = $label;
        $this->value = $value;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.box');
    }
}
