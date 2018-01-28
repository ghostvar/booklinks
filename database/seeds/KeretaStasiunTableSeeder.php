<?php

use Crockett\CsvSeeder\CsvSeeder;

class KeretaStasiunTableSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
	{
        $this->table = 'stasiun';
        $this->filename = base_path('/database/seeds/csvs/stasiun_kereta_table.csv');
        $this->offset_rows = 1;
        $this->mapping = [
            0 => 'id',
            1 => 'kode',
            2 => 'kota',
            3 => 'name'
        ];
        $this->should_trim = true;
	}

    public function run()
    {
        parent::run();
    }
}
