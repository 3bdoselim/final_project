<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;
class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $arr = [    
            ["Cyan","#60f4f6"],
            ["Brown","#381e08"],
            ["Red","#ff0000"],
            ["Blue","#0300ff"],
            ["Black","#000000"],
            ["Green","#00ff05"],
            ["Light Yellow","#f5ffbe"],
        ];

        			
        for($i=0;$i<count($arr);$i++){
            $b = new Color();
            $b->color_name=$arr[$i][0];
            $b->color_description=$arr[$i][1];
            $b->save();
        }
    }
}
