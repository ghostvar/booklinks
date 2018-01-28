<?php

use Crockett\CsvSeeder\CsvSeeder;

class KeretaTableSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
	{
        $this->table = 'kereta';
        $this->filename = base_path('/database/seeds/csvs/kereta_table.csv');
        $this->offset_rows = 1;
        $this->mapping = [
            0 => 'id',
            1 => 'eco_seat_num',
            2 => 'busines_seat_num',
            3 => 'exec_seat_num',
            4 => 'no_kereta',
            5 => 'name'
        ];
        $this->should_trim = true;
	}

    public function run()
    {
        parent::run();
    }
}
