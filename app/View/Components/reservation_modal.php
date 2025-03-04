<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class reservation_modal extends Component
{
    public $reservation;
    public $announcement_id;
    public function __construct($reservation = [], $announcement_id)
    {
        $this->reservation = $reservation;
        $this->announcement_id = $announcement_id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $reservation = $this->reservation;
        $announcement_id = $this->announcement_id;
        return view('components.reservation_modal', compact("reservation,announcement_id"));
    }
}
