<?php

use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    protected $states = [
            [ "name" => "Andaman and Nicobar Islands" ],
            [ "name" => "Andhra Pradesh" ],
            [ "name" => "Arunachal Pradesh" ],
            [ "name" => "Assam" ],
            [ "name" => "Bihar" ],
            [ "name" => "Chandigarh" ],
            [ "name" => "Chhattisgarh" ],
            [ "name" => "Dadra and Nagar Haveli" ],
            [ "name" => "Daman and Diu" ],
            [ "name" => "Delhi" ],
            [ "name" => "Goa" ],
            [ "name" => "Gujarat" ],
            [ "name" => "Haryana" ],
            [ "name" => "Himachal Pradesh" ],
            [ "name" => "Jammu and Kashmir" ],
            [ "name" => "Jharkhand" ],
            [ "name" => "Karnataka" ],
            [ "name" => "Kerala" ],
            [ "name" => "Ladakh" ],
            [ "name" => "Lakshadweep" ],
            [ "name" => "Madhya Pradesh" ],
            [ "name" => "Maharashtra" ],
            [ "name" => "Manipur" ],
            [ "name" => "Meghalaya" ],
            [ "name" => "Mizoram" ],
            [ "name" => "Nagaland" ],
            [ "name" => "Odisha" ],
            [ "name" => "Puducherry" ],
            [ "name" => "Punjab" ],
            [ "name" => "Rajasthan" ],
            [ "name" => "Sikkim" ],
            [ "name" => "Tamil Nadu" ],
            [ "name" => "Telangana" ],
            [ "name" => "Tripura" ],
            [ "name" => "Uttar Pradesh" ],
            [ "name" => "Uttarakhand" ],
            [ "name" => "West Bengal" ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->states as $key => $state) {
            DB::table('states')->insert($state);
        }
    }
}
