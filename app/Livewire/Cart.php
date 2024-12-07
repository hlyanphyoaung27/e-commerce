<?php

namespace App\Livewire;

use App\Actions\Webshop\CreateStripeCheckoutSession;
use App\Factories\CartFactory;
use Livewire\Component;

class Cart extends Component
{

    public function checkout(CreateStripeCheckoutSession $checkoutSession)
    {
       return $checkoutSession->createFromCart($this->cart);
        
    }

    public function getCartProperty()
    {
        return CartFactory::make()->loadMissing(['item', 'item.product', 'item.variant']);
    }
    public function getItemsProperty()
    {
        return $this->cart->item; 
    }
    
    public function delete($itemId) {
        $deleted = $this->cart->item()->where('id', $itemId)->delete();
        if ($deleted) {
            $this->dispatch('cartRefresh:refresh');
        }
        return $deleted;
    }

    public function increase($itemId) {
         $this->cart->item()->find($itemId)?->increment('quantity');
        
    }
    public function decrease($itemId) {
        $items =  $this->cart->item()->find($itemId);
        if($items -> quantity > 1) {
            $items ?->decrement('quantity');
        }
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
