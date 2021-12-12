<?php

namespace App\View\Components\Forms;

use Illuminate\Support\Arr;
use Illuminate\View\Component;

class File extends Component
{
    public $label;
    public $maxFiles;
    public $collection;
    public $mediaType;
    public $media;
    public $hasMedia;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $label = false,
        $maxFiles = 1,
        $collection = null,
        $mediaType = ''
    ) {
        $this->label = $label;
        $this->maxFiles = $maxFiles;
        if ($collection) {
            $this->hasMedia = $collection->hasMedia($mediaType);
            $this->media = $collection->getMedia($mediaType);
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.file');
    }
}
