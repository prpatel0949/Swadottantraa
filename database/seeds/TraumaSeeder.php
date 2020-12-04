<?php

use Illuminate\Database\Seeder;

class TraumaSeeder extends Seeder
{
    private $traumas = [
        [ 'trauma' => 'Rejection', 'trauma_marathi' => 'इतरांकडून झिडकारले जाणे' ],
        [ 'trauma' => 'Loss', 'trauma_marathi' => 'हानी' ],
        [ 'trauma' => 'Guilt', 'trauma_marathi' => 'अपराध / चूक' ],
        [ 'trauma' => 'Loneliness', 'trauma_marathi' => 'एकाकी पडणे' ],
        [ 'trauma' => 'Rumination', 'trauma_marathi' => 'विचारांचा भुंगा' ],
        [ 'trauma' => 'Failure', 'trauma_marathi' => 'अपयश' ],
        [ 'trauma' => 'Low Self Esteem', 'trauma_marathi' => 'आत्मसन्मानाला ठेच' ],
        [ 'trauma' => 'Unfair treatment', 'trauma_marathi' => 'इतरांकडून अन्याय होणे ' ],
        [ 'trauma' => 'Abuse', 'trauma_marathi' => 'इतरांकडून अत्याचार होणे' ],
        [ 'trauma' => 'Crises', 'trauma_marathi' => 'संकट' ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->traumas as $trauma) {
            DB::table('traumas')->insert($trauma);
        }
    }
}
