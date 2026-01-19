<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        /** * Mengarahkan ke resources/views/layouts/admin-layout.blade.php
         * Pastikan nama file blade kamu sama persis dengan yang ada di dalam tanda petik.
         */
        return view('layouts.admin-layout');
    }
}