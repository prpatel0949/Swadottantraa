<?php

use Illuminate\Database\Seeder;

class MenuLinkSeeder extends Seeder
{

    protected $links = [
        [ 'link' => 'http://www.firstaid.sapeksh.com/MenuLinks/Mind Landscape E.mp3', 'description' => 'Mindfulness (Trauma - D, G, E, J)', 'mlink' => 'http://www.firstaid.sapeksh.com/MenuLinks/Mind Landscape M.mp3' ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->links as $link) {
            DB::table('menu_links')->insert($link);
        }
    }
}
