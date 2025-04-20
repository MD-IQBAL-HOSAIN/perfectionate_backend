<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValueWeOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!\App\Models\ValueWeOffer::first()) {
            \App\Models\ValueWeOffer::create([
                'title' => null,
                'description' => null,
                'image_one' => null,
                'image_two' => null,
            ]);
        }
    }
}
