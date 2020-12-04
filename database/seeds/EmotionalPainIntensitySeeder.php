<?php

use Illuminate\Database\Seeder;

class EmotionalPainIntensitySeeder extends Seeder
{
    protected $emotionals = [
        [ 'emotional_pain_intensity' => 'There is no Pain at all', 'emotional_pain_intensity_marathi' => 'अजिबात वेदना नाही', 'emotional_pain_intensity_no' => 0 ],
        [ 'emotional_pain_intensity' => '', 'emotional_pain_intensity_marathi' => '', 'emotional_pain_intensity_no' => 1 ],
        [ 'emotional_pain_intensity' => 'Negligible Pain', 'emotional_pain_intensity_marathi' => 'नगण्य वेदना', 'emotional_pain_intensity_no' => 2 ],
        [ 'emotional_pain_intensity' => '', 'emotional_pain_intensity_marathi' => '', 'emotional_pain_intensity_no' => 3 ],
        [ 'emotional_pain_intensity' => '', 'emotional_pain_intensity_marathi' => '', 'emotional_pain_intensity_no' => 4 ],
        [ 'emotional_pain_intensity' => 'Moderate Pain', 'emotional_pain_intensity_marathi' => 'मध्यम वेदना', 'emotional_pain_intensity_no' => 5 ],
        [ 'emotional_pain_intensity' => '', 'emotional_pain_intensity_marathi' => '', 'emotional_pain_intensity_no' => 6 ],
        [ 'emotional_pain_intensity' => '', 'emotional_pain_intensity_marathi' => '', 'emotional_pain_intensity_no' => 7 ],
        [ 'emotional_pain_intensity' => 'Severe Pain', 'emotional_pain_intensity_marathi' => 'तीव्र वेदना', 'emotional_pain_intensity_no' => 8 ],
        [ 'emotional_pain_intensity' => '', 'emotional_pain_intensity_marathi' => '', 'emotional_pain_intensity_no' => 9 ],
        [ 'emotional_pain_intensity' => 'Profound Pain', 'emotional_pain_intensity_marathi' => 'टोकाची वेदना', 'emotional_pain_intensity_no' => 10 ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->emotionals as $emotional) {
            DB::table('emotional_pain_intensities')->insert($emotional);
        }
    }
}
