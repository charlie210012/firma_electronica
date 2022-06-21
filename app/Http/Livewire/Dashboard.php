<?php

namespace App\Http\Livewire;

use Laravel\Passport\Client;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard',[
            'clientes'=>Client::all(),
        ]);
    }
}
