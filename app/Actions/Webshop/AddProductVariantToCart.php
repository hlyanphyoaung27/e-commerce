<?php
namespace App\Actions\Webshop;

use App\Factories\CartFactory;
use App\Models\Cart;

class AddProductVariantToCart{
    public function add($variantId, $quantity = 1, $cart = null) {

        ( $cart ?: CartFactory::make() )->item()->firstOrCreate(
            [
                'product_variant_id' => $variantId,
            ],
            ['quantity'=> 0])->increment('quantity', $quantity);
        
        
        
        
     }
 }


        
