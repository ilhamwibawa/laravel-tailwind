<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Select extends Component
{
    public $label;
    public $id;
    public $name;
    public $value;
    public $isRequired;
    public $hintText;
    public $options;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $label = "",
        $id = "",
        $name = "",
        $value = "",
        $isRequired = false,
        $hintText = null,
        $options = []
    ) {
        $this->label = $label;
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->isRequired = $isRequired;
        $this->hintText = $hintText;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.select');
    }
}
