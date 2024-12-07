<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use League\CommonMark\Extension\CommonMark\Node\Block\ListItem;

use function PHPUnit\Framework\isList;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
   

/**
 * Define the model's default state.
 *
 * @return array
 */
public function definition()
{
    static $paths = [
        '/photo/tshirt2.png', 
        '/photo/tshirt.png', 
        '/photo/tshirt3.png', 
        '/photo/tshirt4.png', 
        
        '/photo/cap2.png', 
        '/photo/cap3.png', 
        '/photo/cap.png', 
        '/photo/cap4.png',

        '/photo/sweter.png', 
        '/photo/sweter2.png', 
        '/photo/sweter3.png', 
        '/photo/sweter4.png',

        '/photo/sportbottle.png', 
        '/photo/sportbottle2.png', 
        '/photo/sportbottle3.png', 
        '/photo/sportbottle4.png', 
        
        '/photo/band2.png',
        '/photo/band.png',
        '/photo/band3.png',
        '/photo/band.png',
        
        
        
        '/photo/pant.png', 
        '/photo/pant2.png', 
        '/photo/pant3.png', 
        '/photo/pant4.png',

        '/photo/hybird.png', 
        '/photo/hybird2.png', 
        '/photo/hybird3.png', 
        '/photo/hybird4.png',

        '/photo/belt.png', 
        '/photo/belt2.png', 
        '/photo/belt.png', 
        '/photo/belt2.png', 
        
    ];

    static $counter = 0;

    // Get the path at the current counter index
    $path = $paths[$counter];

    // Increment counter for next call
    $counter++;

    // Reset counter if it reaches the end of the list
    if ($counter >= count($paths)) {
        $counter = 0;
    }

    return [
        'path' => $path
    ];
}
        
}

            
            
            
            
            
            
            
