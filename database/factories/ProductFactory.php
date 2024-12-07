<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Unique;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        static  $array = ['Tshirt', 'Cap', 'Sweater', 'SportBottle', 'Resistance band', 'Short Pant', 'Hybird', 'Belt' ];

        static  $counter = 0;

         $name = $array[$counter];

         $counter++;

         if($counter>= count($array)){
            $couter = 0;
         }

         

        return [
           'name'=> $name,

           'description'=> $this->faker->text(),

           'price' => $this -> faker ->numberBetween(500, 4500)
        ];
    }
}



