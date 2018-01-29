<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(KeretaTableSeeder::class);
        $this->call(KeretaStasiunTableSeeder::class);
        $this->call(KeretaJurusanTableSeeder::class);
        $this->call(KeretaRuteTableSeeder::class);
        $this->call(PelangganTableSeeder::class);
    }
}
