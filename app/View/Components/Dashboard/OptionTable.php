<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OptionTable extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $param,
        public $list,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.option-table');
    }
}
