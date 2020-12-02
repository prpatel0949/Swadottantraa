<?php

use Illuminate\Database\Seeder;

class SubEmotionSeeder extends Seeder
{
    protected $emotions = [
        [ 'emotion_id' => 1, 'sub_emotions' => 'Apprehension', 'sub_emotions_marathi' => 'चिंता' ],
        [ 'emotion_id' => 1, 'sub_emotions' => 'Fear', 'sub_emotions_marathi' => 'भीती' ],
        [ 'emotion_id' => 1, 'sub_emotions' => 'Terror', 'sub_emotions_marathi' => 'दहशत' ],
        [ 'emotion_id' => 2, 'sub_emotions' => 'Pensiveness', 'sub_emotions_marathi' => 'खिन्नता' ],
        [ 'emotion_id' => 2, 'sub_emotions' => 'Sadness', 'sub_emotions_marathi' => 'दु:ख' ],
        [ 'emotion_id' => 2, 'sub_emotions' => 'Grief', 'sub_emotions_marathi' => 'शोक' ],
        [ 'emotion_id' => 3, 'sub_emotions' => 'Annoyance', 'sub_emotions_marathi' => 'वैताग' ],
        [ 'emotion_id' => 3, 'sub_emotions' => 'Anger', 'sub_emotions_marathi' => 'राग' ],
        [ 'emotion_id' => 3, 'sub_emotions' => 'Rage', 'sub_emotions_marathi' => 'क्रोध' ],
        [ 'emotion_id' => 4, 'sub_emotions' => 'Uncertain', 'sub_emotions_marathi' => 'अनिश्चितता' ],
        [ 'emotion_id' => 4, 'sub_emotions' => 'Confused', 'sub_emotions_marathi' => 'गोंधळ' ],
        [ 'emotion_id' => 4, 'sub_emotions' => 'Shocked', 'sub_emotions_marathi' => 'धक्का' ],
        [ 'emotion_id' => 5, 'sub_emotions' => 'Boredom', 'sub_emotions_marathi' => 'नीरसपणा' ],
        [ 'emotion_id' => 5, 'sub_emotions' => 'Disgust', 'sub_emotions_marathi' => 'किळस' ],
        [ 'emotion_id' => 5, 'sub_emotions' => 'Loathing', 'sub_emotions_marathi' => 'तिरस्कार' ],
        [ 'emotion_id' => 6, 'sub_emotions' => 'Laid back', 'sub_emotions_marathi' => 'निवांतपणा' ],
        [ 'emotion_id' => 6, 'sub_emotions' => 'Fatigue', 'sub_emotions_marathi' => 'थकवा' ],
        [ 'emotion_id' => 6, 'sub_emotions' => 'Exhausted', 'sub_emotions_marathi' => 'अती दमणूक' ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->emotions as $emotion) {
            DB::table('sub_emotions')->insert($emotion);
        }
    }
}
