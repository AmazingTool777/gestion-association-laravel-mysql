<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavLink extends Component
{
    /**
     * The class name applied to the link when the link is active i.e matches the current URL path
     * @var string
     */
    public $activeClassName = "active";

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $activeClassName)
    {
        if ($activeClassName) {
            $this->activeClassName = $activeClassName;
        }
    }

    /**
     * Checks whether the link is active or not
     */
    public function isActive(string $href): bool
    {
        $urlStartRegex = '/^(http|https):\/\/(\d|\w|\.|:|-|_)+\/?/';
        $currentPath = preg_replace($urlStartRegex, "/", url()->current());
        if ($currentPath == "/") {
            return $currentPath == $href;
        } else {
            if ($href == "/") return false;
            return substr($currentPath, 0, strlen($href)) == $href;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav-link');
    }
}
