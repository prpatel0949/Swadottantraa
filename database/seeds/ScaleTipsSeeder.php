<?php

use Illuminate\Database\Seeder;

class ScaleTipsSeeder extends Seeder
{
    protected $tips = [
        [ 'description' => 'GOOD, THAT YOU HAVE HANDLED YOUR EMOTIONAL HURT VE...', 'min_value' => 0, 'max_value' => 5, 'title' => 'Mild', 'lflag' => 0, 'is_active' => 1 ],
        [ 'description' => 'IT SEEMS YOU NEED STILL MORE HELP TO HEAL YOUR EMO...', 'min_value' => 6, 'max_value' => 8, 'title' => 'Moderate', 'lflag' => 0, 'is_active' => 1 ],
        [ 'description' => 'IT IS VERY LIKELY THAT YOU ARE IN AN URGENT NEED T...', 'min_value' => 9, 'max_value' => 12, 'title' => 'Severe', 'lflag' => 0, 'is_active' => 1 ],
        [ 'description' => 'तुमच्या बाबतीत मानसिक आरोग्य तज्ञाची मदत ताबडतोब ग...', 'min_value' => 9, 'max_value' => 12, 'title' => 'Severe', 'lflag' => 1, 'is_active' => 1 ],
        [ 'description' => 'तुमच्या दुखापतीतून सावरण्यासाठी तुम्हाला अधिक मदती...', 'min_value' => 6, 'max_value' => 8, 'title' => 'Moderate', 'lflag' => 1, 'is_active' => 1 ],
        [ 'description' => 'चांगली गोष्ट आहे की, तुम्ही तुमची भावनिक दुखापत यो...', 'min_value' => 0, 'max_value' => 5, 'title' => 'Mild', 'lflag' => 1, 'is_active' => 1 ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->tips as $tip) {
            DB::table('scale_tips')->insert($tip);
        }
    }
}
