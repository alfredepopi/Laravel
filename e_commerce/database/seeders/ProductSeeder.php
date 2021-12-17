<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'=>'New World',
                "price"=>"60",
                "brand"=>"Amazon",
                "description"=>"Jeux Amazon tres interessant",
                "category"=>"OW",
                "gallery"=>"https://www.breakflip.com/uploads2/Volkatz/AAA/MMO/New-World/Vignettes/new-world-date-sortie-beta-fermee-amazon.jpg",
                "quantity"=>"30",
            ],
            [
                'name'=>'CS GO',
                "price"=>"20",
                "brand"=>"Steam",
                "description"=>"Jeux steam tres interessant",
                "category"=>"Action",
                "gallery"=>"https://th.bing.com/th/id/OIP.AU4PvW1MGlLV-yS1ZSV2WgHaEd?pid=ImgDet&rs=1",
                "quantity"=>"30",
            ],
            [
                'name'=>'Skyrim',
                "price"=>"30",
                "brand"=>"Bethesda",
                "description"=>"Jeux Bethesda tres interessant,",
                "category"=>"Aventure",
                "gallery"=>"https://cdn02.nintendo-europe.com/media/images/11_square_images/games_18/nintendo_switch_5/SQ_NSwitch_TheElderScrollsVSkyrim.jpg",
                "quantity"=>"30",
            ],
            [
                'name'=>'GTA V',
                "price"=>"100",
                "brand"=>"RockStar",
                "description"=>"Jeux RockStar tres interessant,",
                "category"=>"action",
                "gallery"=>"https://th.bing.com/th/id/OIP.AdURJzyTK_hn_BUtGX_cSQHaEo?pid=ImgDet&rs=1",
                "quantity"=>"30",
            ],
            [
                'name'=>'Rainbow six siege',
                "price"=>"20",
                "brand"=>"Ubisoft",
                "description"=>"Jeux Ubisoft tres interessant,",
                "category"=>"action",
                "gallery"=>"https://wallup.net/wp-content/uploads/2017/11/22/411089-video_games-Rainbow_Six_Siege-Spetsnaz.jpg",
                "quantity"=>"30",
            ],
        ]);
    }
}
