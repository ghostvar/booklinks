<?php

use Crockett\CsvSeeder\CsvSeeder;

class TarifPenerbanganTableSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
	{
        $this->table = 'tarif_penerbangan';
        $this->filename = base_path('/database/seeds/csvs/tarif_penerbangan_table.csv');
        $this->offset_rows = 1;
        $this->mapping = [
            0 => 'id',
            1 => 'penerbangan',
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
