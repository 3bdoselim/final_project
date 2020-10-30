<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [    
            ["Shoes","category_description"],
            ["Shirt","category_description"],
            ["Skirt","category_description"],
            ["Dress","category_description"],
            ["Belt","category_description"],
            ["Watch","category_description"],
            ["Ring","category_description"],
            ["Earing","category_description"],
            ["Necklace","category_description"],
        ];

        			
        for($i=0;$i<count($arr);$i++){
            $b = new Category();
            $b->category_name=$arr[$i][0];
            $b->category_description=$arr[$i][1];
            $b->save();
        }
    }
}
