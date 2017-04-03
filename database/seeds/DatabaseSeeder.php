<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Model::unguard();

        //$this->call(MemberTableSeeder::class);
        $this->call(HistoryTableSeeder::class);
        $this->call(TemplateTableSeeder::class);
        $this->call(TickedTableSeeder::class);
        $this->call(TypePropertiesTableSeeder::class);

        Model::reguard();
    }
}
