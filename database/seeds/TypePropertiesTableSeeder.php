<?php

use Illuminate\Database\Seeder;

class TypePropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker =Faker\Factory::create();
        foreach (range(1,10) as $index) {
            \App\Model\TypeProperties::create([
                'typeNo' => $faker->numberBetween(1,10),
                'type' => $faker->text($min=5,$max=10),
                'name' => $faker->text(10)
            ]);
        }
    }
}
