<?php

namespace App\View\Components;

use App\Models\Quarter;
use Illuminate\View\Component;

class StudentSideMenuQuarter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $quarters; 

    public function __construct()
    {
        $this->quarters = Quarter::orderBy("name")->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $quarters = $this->quarters;
        return view('components.student-side-menu-quarter', compact("quarters"));
    }
}
