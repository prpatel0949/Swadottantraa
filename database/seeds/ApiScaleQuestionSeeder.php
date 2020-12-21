<?php

use Illuminate\Database\Seeder;

class ApiScaleQuestionSeeder extends Seeder
{
    protected $questions = [
        [ 'id' => 1, 'description' => 'Feeling nervous, anxious or on edge', 'mdescription' => 'चिंताग्रस्त, बेचैन आणि अस्वस्थ वाटणे' ],
        [ 'id' => 2, 'description' => 'Not being able to stop or control worrying', 'mdescription' => 'काळजीचे विचार थांबवता किंवा कमी करता न येणे' ],
        [ 'id' => 3, 'description' => 'Little interest or pleasure in doing things', 'mdescription' => 'कोणतीही गोष्ट करण्यासाठी खूप कमी रस किंवा आनंद' ],
        [ 'id' => 4, 'description' => 'Feeling down, depressed, or hopeless', 'mdescription' => 'निरुत्साही, दु:खी किंवा निराश वाटणे' ],
    ];

    protected $answers = [
        [ 'question_id' => 1, 'description' => 'Not at all', 'mdescription' => 'मुळीच\r\n नाही', 'score' => 0.00 ],
        [ 'question_id' => 1, 'description' => 'Less than a week', 'mdescription' => 'एका आठवड्या पेक्षा कमी', 'score' => 1.00 ],
        [ 'question_id' => 1, 'description' => 'More than a week', 'mdescription' => 'एका आठवड्या पेक्षा जास्त', 'score' => 2.00 ],
        [ 'question_id' => 1, 'description' => 'Nearly every day', 'mdescription' => 'जवळपास दररोज', 'score' => 3.00 ],
        [ 'question_id' => 2, 'description' => 'Not at all', 'mdescription' => 'मुळीच\r\n नाही', 'score' => 0.00 ],
        [ 'question_id' => 2, 'description' => 'Less than a week', 'mdescription' => 'एका आठवड्या पेक्षा कमी', 'score' => 1.00 ],
        [ 'question_id' => 2, 'description' => 'More than a week', 'mdescription' => 'एका आठवड्या पेक्षा जास्त', 'score' => 2.00 ],
        [ 'question_id' => 2, 'description' => 'Nearly every day', 'mdescription' => 'जवळपास दररोज', 'score' => 3.00 ],
        [ 'question_id' => 3, 'description' => 'Not at all', 'mdescription' => 'मुळीच\r\n नाही', 'score' => 0.00 ],
        [ 'question_id' => 3, 'description' => 'Less than a week', 'mdescription' => 'एका आठवड्या पेक्षा कमी', 'score' => 1.00 ],
        [ 'question_id' => 3, 'description' => 'More than a week', 'mdescription' => 'एका आठवड्या पेक्षा जास्त', 'score' => 2.00 ],
        [ 'question_id' => 3, 'description' => 'Nearly every day', 'mdescription' => 'जवळपास दररोज', 'score' => 3.00 ],
        [ 'question_id' => 4, 'description' => 'Not at all', 'mdescription' => 'मुळीच\r\n नाही', 'score' => 0.00 ],
        [ 'question_id' => 4, 'description' => 'Less than a week', 'mdescription' => 'एका आठवड्या पेक्षा कमी', 'score' => 1.00 ],
        [ 'question_id' => 4, 'description' => 'More than a week', 'mdescription' => 'एका आठवड्या पेक्षा जास्त', 'score' => 2.00 ],
        [ 'question_id' => 4, 'description' => 'Nearly every day', 'mdescription' => 'जवळपास दररोज', 'score' => 3.00 ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->questions as $question) {
            DB::table('api_scale_questions')->insert($question);
        }

        foreach ($this->answers as $answer) {
            DB::table('api_scale_question_answers')->insert($answer);
        }
    }
}
