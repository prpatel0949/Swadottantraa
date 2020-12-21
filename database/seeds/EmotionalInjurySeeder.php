<?php

use Illuminate\Database\Seeder;

class EmotionalInjurySeeder extends Seeder
{
    protected $emotions = [
        [ 'emotional_injuries' => 'Sleep Affected', 'emotional_injuries_marathi' => 'झोपेवर परीणाम' ],
        [ 'emotional_injuries' => 'Appetite Affected', 'emotional_injuries_marathi' => 'भुकेवर परीणाम' ],
        [ 'emotional_injuries' => 'Aches and Pains', 'emotional_injuries_marathi' => 'शारीरिक वेदना' ],
        [ 'emotional_injuries' => 'Sexual Problems', 'emotional_injuries_marathi' => 'लैंगिक समस्या' ],
        [ 'emotional_injuries' => 'Irritability', 'emotional_injuries_marathi' => 'चिडचिड' ],
        [ 'emotional_injuries' => 'Worrying', 'emotional_injuries_marathi' => 'चिंता,काळजी' ],
        [ 'emotional_injuries' => 'Fatigue, Reduced Interest', 'emotional_injuries_marathi' => 'थकवा,निरुत्साह' ],
        [ 'emotional_injuries' => 'Difficulty in Concentrating', 'emotional_injuries_marathi' => 'एकाग्रता न होणे' ],
        [ 'emotional_injuries' => 'Feeling Lonely/Feeling like not mixing', 'emotional_injuries_marathi' => 'एकटे राहावे वाटणे' ],
        [ 'emotional_injuries' => 'Touchy Behaviour', 'emotional_injuries_marathi' => 'अति भावनाशील वर्तन' ],
        [ 'emotional_injuries' => 'Restlessness', 'emotional_injuries_marathi' => 'बेचैनपना' ],
        [ 'emotional_injuries' => 'Sadness', 'emotional_injuries_marathi' => 'दु:ख,निराशा' ],
        [ 'emotional_injuries' => 'Weakness', 'emotional_injuries_marathi' => 'अशक्तपणा' ],
        [ 'emotional_injuries' => 'Others', 'emotional_injuries_marathi' => 'इतर' ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->emotions as $emotion) {
            DB::table('emotional_injuries')->insert($emotion);
        }
    }
}
