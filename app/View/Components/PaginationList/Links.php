<?php

namespace App\View\Components\PaginationList;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;

class Links extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public LengthAwarePaginator $paginator)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pagination-list.links');
    }
}
