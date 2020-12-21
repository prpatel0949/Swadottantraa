<?php

use Illuminate\Database\Seeder;

class EmotionSeeder extends Seeder
{
    protected $emotions = [
        [ 'id' => 1, 'emotions' => 'Fear', 'emotions_marathi' => 'भीती' ],
        [ 'id' => 2, 'emotions' => 'Sadness', 'emotions_marathi' => 'दुखः' ],
        [ 'id' => 3, 'emotions' => 'Anger', 'emotions_marathi' => 'राग' ],
        [ 'id' => 4, 'emotions' => 'Confusion', 'emotions_marathi' => 'गोंधळ' ],
        [ 'id' => 5, 'emotions' => 'Disgust', 'emotions_marathi' => 'तिरस्कार' ],
        [ 'id' => 6, 'emotions' => 'Fatigue', 'emotions_marathi' => 'थकवा' ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->emotions as $emotion) {
            DB::table('emotions')->insert($emotion);
        }
    }
}
