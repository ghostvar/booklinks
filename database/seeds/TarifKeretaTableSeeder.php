<?php

use Crockett\CsvSeeder\CsvSeeder;

class TarifKeretaTableSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
	{
        $this->table = 'tarif_kereta';
        $this->filename = base_path('/database/seeds/csvs/tarif_kereta_table.csv');
        $this->offset_rows = 1;
        $this->mapping = [
            0 => 'id',
            1 => 'kereta',
            2 => 'kelas',
            3 => 'tarif'
        ];
        $this->should_trim = true;
	}

    public function run()
    {
        parent::run();
    }
}
