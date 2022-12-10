<?php

namespace App\View\Components;

use Illuminate\View\Component;

class App extends Component
{
    
    public function __construct()
    {
        //
    }

   
    public function render()
    {
        return view('layout.app');
    }
}
