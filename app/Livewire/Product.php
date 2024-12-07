<?php
namespace App\Livewire;

use App\Actions\Webshop\AddProductVariantToCart;
use App\Models\Product as ModelsProduct;
use Livewire\Component;

class Product extends Component
{
    public $productId;
    public $variant;
    public $bannerMessage = '';

    public $rules = [
        'variant' => ['required', 'exists:App\Models\ProductVariant,id']
    ];

    public function addToCart(AddProductVariantToCart $cart)
    {
        $this->validate();
        $cart->add(
            variantId: $this->variant
        );
        $this->bannerMessage = 'Product added to cart successfully!';

        $this->dispatch('cartRefresh:refresh');
    }

    public function mount()
    {
        $this->variant = $this->product->Variants()->value('id');
    }

    public function getProductProperty()
    {
        return ModelsProduct::findOrFail($this->productId);
    }

    public function render()
    {
        return view('livewire.product', ['bannerMessage' => $this->bannerMessage]);
    }
}
