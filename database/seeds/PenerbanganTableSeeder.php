<?php

use Crockett\CsvSeeder\CsvSeeder;

class PenerbanganTableSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
	{
        $this->table = 'penerbangan';
        $this->filename = base_path('/database/seeds/csvs/penerbangan_table.csv');
        $this->offset_rows = 1;
        $this->mapping = [
            0 => 'id',
            1 => 'no_penerbangan',
            2 => 'asal',
            3 => 'tujuan',
            4 => 'waktu_berangkat',
            5 => 'waktu_sampai',
            6 => 'pesawat_id'
        ];
        $this->should_trim = true;
	}

    public function run()
    {
        parent::run();
    }
}
