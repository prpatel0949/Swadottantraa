<?php

use Illuminate\Database\Seeder;

class MoodSeeder extends Seeder
{
    protected $moods = [
        [ "name_en" => "Acceptance", "name_mr" =>"स्वीकार" ],
        [ "name_en" => "Admiration", "name_mr" =>"कौतुक" ],
        [ "name_en" => "Aggressiveness", "name_mr" =>"आक्रमकता" ],
        [ "name_en" => "Anger", "name_mr" =>"राग" ],
        [ "name_en" => "Annoyance", "name_mr" =>"वैताग" ],
        [ "name_en" => "Anticipation", "name_mr" =>"हुरहूर" ],
        [ "name_en" => "Anxiety", "name_mr" =>"चिंता" ],
        [ "name_en" => "Boredom", "name_mr" =>"कंटाळा" ],
        [ "name_en" => "Compassion", "name_mr" =>"वात्सल्य" ],
        [ "name_en" => "Competition", "name_mr" =>"चढाओढ" ],
        [ "name_en" => "Confused", "name_mr" =>"भांबावणे" ],
        [ "name_en" => "Contempt", "name_mr" =>"अनादर" ],
        [ "name_en" => "Curiosity", "name_mr" =>"कुतूहल" ],
        [ "name_en" => "Depression", "name_mr" =>"वैफल्य" ],
        [ "name_en" => "Disappointed", "name_mr" =>"खट्टू" ],
        [ "name_en" => "Disapproval", "name_mr" =>"नापसंती" ],
        [ "name_en" => "Disgust", "name_mr" =>"किळस" ],
        [ "name_en" => "Distracted", "name_mr" =>"विचलित" ],
        [ "name_en" => "Ecstacy", "name_mr" =>"हर्षोन्माद" ],
        [ "name_en" => "Fear", "name_mr" =>"भीती" ],
        [ "name_en" => "Fightback Spirit", "name_mr" =>"लढाऊवृत्ती" ],
        [ "name_en" => "Forgiveness", "name_mr" =>"क्षमाशीलता" ],
        [ "name_en" => "Frustration", "name_mr" =>"हताशपणा" ],
        [ "name_en" => "Gloat", "name_mr" =>"गर्व" ],
        [ "name_en" => "Grief", "name_mr" =>"शोक" ],
        [ "name_en" => "Guilt", "name_mr" =>"अपराधीपणा" ],
        [ "name_en" => "Hate", "name_mr" =>"तिरस्कार" ],
        [ "name_en" => "Hope", "name_mr" =>"आशा" ],
        [ "name_en" => "Hopelessness", "name_mr" =>"निराशा" ],
        [ "name_en" => "Humorous", "name_mr" =>"मिश्किल" ],
        [ "name_en" => "Interest", "name_mr" =>"आवड" ],
        [ "name_en" => "Jealousy", "name_mr" =>"असूया" ],
        [ "name_en" => "Joy", "name_mr" =>"आनंद" ],
        [ "name_en" => "Lazy", "name_mr" =>"आळस" ],
        [ "name_en" => "Light-hearted", "name_mr" =>"बेपर्वा" ],
        [ "name_en" => "Love", "name_mr" =>"प्रेम" ],
        [ "name_en" => "Lust", "name_mr" =>"वासना" ],
        [ "name_en" => "Motivated", "name_mr" =>"प्रेरणा" ],
        [ "name_en" => "Pride", "name_mr" =>"स्वाभिमान" ],
        [ "name_en" => "Rage", "name_mr" =>"चवताळणे" ],
        [ "name_en" => "Regret", "name_mr" =>"पश्चात्ताप" ],
        [ "name_en" => "Rejection", "name_mr" =>"नाकारले जाणे" ],
        [ "name_en" => "Respect", "name_mr" =>"आदर" ],
        [ "name_en" => "Rivalry", "name_mr" =>"ईर्षा" ],
        [ "name_en" => "Sadness", "name_mr" =>"दु:ख" ],
        [ "name_en" => "Safe", "name_mr" =>"सुरक्षित" ],
        [ "name_en" => "Self-Confidence", "name_mr" =>"आत्मविश्वास" ],
        [ "name_en" => "Serenity", "name_mr" =>"प्रसन्नता" ],
        [ "name_en" => "Shocked", "name_mr" =>"धक्का" ],
        [ "name_en" => "Submission", "name_mr" =>"शरणागती" ],
        [ "name_en" => "Surprise", "name_mr" =>"आश्चर्य" ],
        [ "name_en" => "Terror", "name_mr" =>"दहशत" ],
        [ "name_en" => "Trust", "name_mr" =>"विश्वास" ],
        [ "name_en" => "Vigilance", "name_mr" =>"दक्षता" ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->moods as $mood) {
            DB::table('moods')->insert($mood);
        }
    }
}
