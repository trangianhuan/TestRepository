<?php

use Illuminate\Database\Seeder;

class TemplateTableSeeder extends Seeder
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
            \App\Model\Template::create([
                'typeNo' => $faker->numberBetween(1,10),
                'subject' => $faker->text($min=5,$max=10),
                'descript' => $faker->text(20)

            ]);
        }
    }
}
