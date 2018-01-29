<?php

use Crockett\CsvSeeder\CsvSeeder;

class PelangganTableSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
	{
        $this->table = 'pelanggan';
        $this->filename = base_path('/database/seeds/csvs/pelanggan_table.csv');
        $this->offset_rows = 1;
        $this->mapping = [
            0 => 'id',
            1 => 'name',
            2 => 'email',
            3 => 'kota',
            4 => 'negara'
        ];
        $this->should_trim = true;
	}

    public function run()
    {
        parent::run();
    }
}
