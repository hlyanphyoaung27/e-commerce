<?php
namespace App\Actions\Webshop;

use App\Factories\CartFactory;
use App\Models\Cart;

class RemoveCart{
    public function delete($variantId) {

        CartFactory::make()->item()->create(
            [
                'product_variant_id' => $variantId,
                'quantity'=> 1
            ]
        );
    }
 }


        
