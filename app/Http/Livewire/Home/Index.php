<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;

class Index extends Component
{

    public $layout = 'layouts.landingPage';
    public function render()
    {
        return view('livewire.home.index');
    }
}
