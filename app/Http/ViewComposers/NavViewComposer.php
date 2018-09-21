<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class NavViewComposer
{
    public function compose(View $view)
    {
        if (auth()->check()) {
            $view->with('tenants', auth()->user()->tenants);
        }
    }
}