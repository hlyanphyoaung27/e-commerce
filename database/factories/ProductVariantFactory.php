<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $color = ['red', 'blue', 'white', 'black'];
        $size = ['S', 'M', 'L', 'XL', 'XXL'];

        return [
            'color'=> $color[rand(0, (count($color)-1))],

            'size'=> $size[rand(0, (count($size)-1))],



        ];

    
    }
}
