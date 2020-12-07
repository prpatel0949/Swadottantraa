<?php

use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    protected $images = [ 
        [ 'image' => 'http://firstaid.sapeksh.com/AppImages/Chrysanthemum.jpg' ],
        [ 'image' => 'http://firstaid.sapeksh.com/AppImages/Tulips.jpg' ],
        [ 'image' => 'http://firstaid.sapeksh.com/AppImages/Hydrangeas.jpg' ],
        [ 'image' => 'http://firstaid.sapeksh.com/AppImages/Tulips.jpg' ],
     ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->images as $image) {
            DB::table('images')->insert($image);
        }
    }
}
