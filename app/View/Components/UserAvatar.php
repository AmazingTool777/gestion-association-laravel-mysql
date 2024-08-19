<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class UserAvatar extends Component
{
    /**
     * The first name of the user
     */
    public $firstname;

    /**
     * The last name of the user
     */
    public $lastname;

    /**
     * Gets the accronym to show on the avatar if the user does not have a profile picture
     */
    public function getAccronym(): string
    {
        return strtoupper(substr($this->firstname, 0, 1)) . strtoupper(substr($this->lastname, 0, 1));
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $firstname, string $lastname)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-avatar');
    }
}
