<?php

use Illuminate\Database\Seeder;

class HistoryTableSeeder extends Seeder
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
            \App\Model\History::create([
                'hisNum' => $faker->numberBetween($min=1,$max=5),
                'tickedNo' => $faker->numberBetween(1,10),
                'memberUpdate' => $faker->text(10),
                'contentUpdate' => $faker->text(20)
            ]);
        }
    }
}
