<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $label;
    public $color;
    public $href;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $type = 'button',
        $label = '',
        $color = 'gray',
        $href = ''
    ) {
        $this->type = $type;
        $this->label = $label;
        $this->color = $color;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.button');
    }
}
