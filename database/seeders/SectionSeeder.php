<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Men			
        Women			
        Kids			
        Accessories*/

        $arr = [    
            ["Men","Men"],
            ["Women","Women"],
            ["Kids","Kids"],
            ["Suits","Suits"],
            ["Sports wear","Sports"],
            ["Accessories","Accessories"],
        ];

                    
        for($i=0;$i<count($arr);$i++){
            $b = new Section();
            $b->section_name=$arr[$i][0];
            $b->section_description=$arr[$i][1];
            $b->save();
        }

    }
}
