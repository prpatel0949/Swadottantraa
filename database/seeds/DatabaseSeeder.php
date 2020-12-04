<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // $this->call(EmotionSeeder::class);
        // $this->call(SubEmotionSeeder::class);
        $this->call(EmotionalPainIntensitySeeder::class);
        $this->call(EmotionalInjurySeeder::class);
        $this->call(TipSeeder::class);
        $this->call(TraumaSeeder::class);
        $this->call(MenuLinkSeeder::class);
    }
}
