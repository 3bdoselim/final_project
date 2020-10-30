<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
            $arr = [    
                ["All Fit","No Defiend Size"],
                ["S","Small"],
                ["M","Medium"],
                ["L","Large"],
                ["XL","Extra Large 1"],
                ["2XL","Extra Large 2"],
                ["3XL","Extra Large 3"],
                ["4XL","Extra Large 4"],
            ];
    
                        
            for($i=0;$i<count($arr);$i++){
                $b = new Size();
                $b->size_name=$arr[$i][0];
                $b->size_description=$arr[$i][1];
                $b->save();
            }
    }
}
