<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class ActionTable extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $edit,
        public string $destroy,
        public Model $item,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.action-table');
    }
}
