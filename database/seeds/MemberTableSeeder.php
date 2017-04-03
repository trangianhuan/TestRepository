<?php

use Illuminate\Database\Seeder;
use App\Model\Member;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker =Faker\Factory::create();
        foreach (range(1,10) as $index) {
            Member::create([
                'memberNo' => $faker->text(5),
                'name' => $faker->text($min=5,$max=10),
                'email' => $faker->email(),
                'lastConnect' => $faker->dateTime()
            ]);
        }
    }
}
