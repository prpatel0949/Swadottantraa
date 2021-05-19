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
        // $this->call(EmotionalPainIntensitySeeder::class);
        // $this->call(EmotionalInjurySeeder::class);
        // $this->call(TipSeeder::class);
        // $this->call(TraumaSeeder::class);
        // $this->call(MenuLinkSeeder::class);
        // $this->call(ImageSeeder::class);
        // $this->call(ApiScaleQuestionSeeder::class);
        // $this->call(SubscriptionSeeder::class);
        // $this->call(MoodSeeder::class);
        // $this->call(TraumaCopingCartSeeder::class);
        // $this->call(ScaleTipsSeeder::class);
        // $this->call(StateSeeder::class);
        // $this->call(CitySeeder::class);
        $this->call(GoalSeeder::class);
        
    }
}
