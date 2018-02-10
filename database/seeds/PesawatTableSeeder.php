<?php

use Crockett\CsvSeeder\CsvSeeder;

class PesawatTableSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
	{
        $this->table = 'pesawat';
        $this->filename = base_path('/database/seeds/csvs/pesawat_table.csv');
        $this->offset_rows = 1;
        $this->mapping = [
            0 => 'id',
            1 => 'name',
            2 => 'kode',
            3 => 'type_pesawat',
            4 => 'exec_seat_num',
            5 => 'busines_seat_num',
            6 => 'eco_seat_num'
        ];
        $this->should_trim = true;
	}

    public function run()
    {
        parent::run();
    }
}
