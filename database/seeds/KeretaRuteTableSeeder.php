<?php

use Crockett\CsvSeeder\CsvSeeder;

class KeretaRuteTableSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
	{
        $this->table = 'rute_kereta';
        $this->filename = base_path('/database/seeds/csvs/rute_kereta_table.csv');
        $this->offset_rows = 1;
        $this->mapping = [
            0 => 'id',
            1 => 'jurusan_id',
            2 => 'stasiun_berangkat',
            3 => 'stasiun_sampai',
            4 => 'waktu_berangkat',
            5 => 'waktu_sampai',
            6 => 'urutan',
        ];
        $this->should_trim = true;
	}

    public function run()
    {
        parent::run();
    }
}
