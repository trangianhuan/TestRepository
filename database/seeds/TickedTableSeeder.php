<?php

use Illuminate\Database\Seeder;

class TickedTableSeeder extends Seeder
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
            \App\Model\Ticked::create([
                'subject' => $faker->text(5),
                'typeNo' => $faker->numberBetween(1,10),
                'statusNo' => $faker->numberBetween($min=1,$max=10),
                'priority' => $faker->text(6),
                'assigneMemberNo' => $faker->text(5),
                'author' => $faker->text(5),
                'startDate' => $faker->dateTime(),
                'dueDate' => $faker->dateTime(),
                'descript' => $faker->text(50)
            ]);
        }

    }
}
