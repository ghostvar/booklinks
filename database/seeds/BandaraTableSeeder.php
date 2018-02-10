<?php

use Crockett\CsvSeeder\CsvSeeder;

class BandaraTableSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
	{
        $this->table = 'bandara';
        $this->filename = base_path('/database/seeds/csvs/bandara_table.csv');
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
