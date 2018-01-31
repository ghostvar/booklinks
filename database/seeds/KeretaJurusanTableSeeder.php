<?php

use Crockett\CsvSeeder\CsvSeeder;

class KeretaJurusanTableSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
	{
        $this->table = 'jurusan_kereta';
        $this->filename = base_path('/database/seeds/csvs/jurusan_kereta_table.csv');
        $this->offset_rows = 1;
        $this->mapping = [
            0 => 'id',
            1 => 'kereta_no'
        ];
        $this->should_trim = true;
	}

    public function run()
    {
        parent::run();
    }
}
