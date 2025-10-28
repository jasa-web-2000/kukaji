<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PreviewImage extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $src = '/img/notfound.jpg',
        public bool $required = true,
        public string $name = 'thumbnail',
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.preview-image');
    }
}
