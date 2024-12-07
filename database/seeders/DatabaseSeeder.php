<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       Product::factory()->count(8)
                         ->hasVariants(4)
                         ->has(Image::factory(4)->sequence(fn(Sequence $sequence)=>['featured'=>$sequence->index==0]))
                         ->create();

        User::factory()->create([
            'email' => 'johndoe@gmail.com',
            'password' => '112233',
        ]);
    }
}
