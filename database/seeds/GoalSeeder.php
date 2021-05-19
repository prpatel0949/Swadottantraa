<?php

use Illuminate\Database\Seeder;

class GoalSeeder extends Seeder
{
    protected $goals = [
        [ 'goal' => 'Emotional Wellness' ],
        [ 'goal' => 'Emotional Intelligence' ],
        [ 'goal' => 'Build Confidence' ],
        [ 'goal' => 'Develop Compassion' ],
        [ 'goal' => 'Develop Gratitude' ],
        [ 'goal' => 'Healthy Relationship' ],
        [ 'goal' => 'Calm Down' ],
        [ 'goal' => 'Managing Emotions' ],
        [ 'goal' => 'Managing Situations' ],
        [ 'goal' => 'Interpersonal Skills' ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->goals as $key => $value) {
            DB::table('goals')->insert($value);
        }
    }
}
