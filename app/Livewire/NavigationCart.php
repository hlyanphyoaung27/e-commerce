<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use Database\Factories\CartFactory as FactoriesCartFactory;
use Livewire\Component;
use Livewire\Attributes\On;

class NavigationCart extends Component
{

    protected $listeners = [
        'cartRefresh:refresh'=>'refresh',
    ];
    

    public function getCountProperty()
    {
       return CartFactory::make()->item()->sum('quantity'); 
    }

    public function render()
    {
        return view('livewire.navigation-cart');
    }
}
