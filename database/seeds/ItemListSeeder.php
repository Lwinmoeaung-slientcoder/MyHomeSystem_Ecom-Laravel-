<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\ProductLists;

class ItemListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            ProductLists::create(
            [
                'name'=>$faker->name,
                'goldquality'=>'A',
                'shopname'=>$faker->name,
                'kyat'=>$faker->numberBetween($min = 0, $max = 8),
                'pel'=>$faker->numberBetween($min = 0, $max = 8),
                'yway'=>$faker->numberBetween($min = 0, $max = 8),
                'ayaw'=>$faker->numberBetween($min = 0, $max = 8),
                'k_price'=>$faker->numberBetween($min = 0, $max = 8),
                'k_kyat'=>'1',
                'k_pel'=>'1',
                'k_yway'=>'1',
                'bought_date'=>$faker->DateTime,
            ]
        );
    }
    }
}
