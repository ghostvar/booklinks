<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Routing\Controller;
use App\Kereta;
use App\Stasiun;
use App\JurusanKereta;
use App\Pesawat;
use App\Bandara;
use App\Penerbangan;

class ExcelController extends Controller
{
    public function exportKereta() {
        Excel::create(date_format(date_create(), 'Y_m_d_Him') . '_kereta_table_export', function($excel) {
            $excel->sheet('Sheet 1', function($sheet) {
                $kereta = Kereta::get();
                $sheet->row(1, ['No', 'No Kereta', 'Nama Kereta', 'Jumlah Kursi Ekonomi', 'Jumlah Kursi Bisnis', 'Jumlah Kereta Eksekutif']);
                $n = '2';
                foreach($kereta as $row) {
                    $sheet->row($n, [$n-1, $row->no_kereta, $row->name, $row->eco_seat_num, $row->busines_seat_num, $row->exec_seat_num]);
                    $n++;
                }
                $sheet->setOrientation('landscape');
            });
        })->download('xls');
    }

    public function exportStasiun() {
        Excel::create(date_format(date_create(), 'Y_m_d_Him') . '_stasiun_kereta_table_export', function($excel) {
            $excel->sheet('Sheet 1', function($sheet) {
                $stasiun = Stasiun::get();
                $sheet->row(1, ['No', 'kode Stasiun', 'Kota', 'Nama Stasiun']);
                $n = '2';
                foreach($stasiun as $row) {
                    $sheet->row($n, [$n-1, $row->kode, $row->kota, $row->name]);
                    $n++;
                }
                $sheet->setOrientation('landscape');
            });
        })->download('xls');
    }

    public function exportJurusan() {
        Excel::create(date_format(date_create(), 'Y_m_d_Him') . '_jurusan_kereta_table_export', function($excel) {
            $excel->sheet('Sheet 1', function($sheet) {
                $jurusan = JurusanKereta::with([
                    'kereta:no_kereta,name,eco_seat_num,busines_seat_num,exec_seat_num',
                    'rute.stasiunBerangkat:kode,kota,name',
                    'rute.stasiunSampai:kode,kota,name'
                ])->get();
                $sheet->row(1, ['No', 'Nama Kereta', 'Jurusan', 'Stasiun Keberangkatan', 'Waktu Berangkat', 'Stasiun Kedatangan', 'Waktu Sampai']);
                $index = 2;
                $no = 1;
                foreach($jurusan as $row) {
                    $merge = [];
                    $data = json_decode(json_encode($row));
                    $rute_length = count($data->rute);
                    $start = $index;
                    $end = 0;
                    for($rute = 0; $rute < $rute_length; $rute++) {
                        $sheet->row(
                            $index, [
                                $no,
                                $data->kereta->name,
                                current($data->rute)->stasiun_berangkat->kota . ' - ' . end($data->rute)->stasiun_sampai->kota,
                                $data->rute[$rute]->stasiun_berangkat->name,
                                $data->rute[$rute]->waktu_berangkat,
                                $data->rute[$rute]->stasiun_sampai->name,
                                $data->rute[$rute]->waktu_sampai
                            ]
                        );
                        $end = $index;
                        $index++;
                    }
                    $no++;
                    $sheet->mergeCells('A' . $start . ':A' . $end);
                    $sheet->mergeCells('B' . $start . ':B' . $end);
                    $sheet->mergeCells('C' . $start . ':C' . $end);
                }
                $sheet->setOrientation('landscape');
            });
        })->download('xls');
    }

    public function exportBandara() {
        Excel::create(date_format(date_create(), 'Y_m_d_Him') . '_bandara_table_export', function($excel) {
            $excel->sheet('Sheet 1', function($sheet) {
                $bandara = Bandara::get();
                $sheet->row(1, ['No', 'kode Bandara', 'Kota', 'Nama Bandara']);
                $n = '2';
                foreach($bandara as $row) {
                    $sheet->row($n, [$n-1, $row->kode, $row->kota, $row->name]);
                    $n++;
                }
                $sheet->setOrientation('landscape');
            });
        })->download('xls');
    }

    public function exportPesawat() {
        Excel::create(date_format(date_create(), 'Y_m_d_Him') . '_pesawat_table_export', function($excel) {
            $excel->sheet('Sheet 1', function($sheet) {
                $pesawat = Pesawat::get();
                $sheet->row(1, ['No', 'kode Pesawat', 'Tipe', 'Nama Pesawat', 'Jumlah Kursi Ekonomi', 'Jumlah Kursi Bisnis', 'Jumlah Kereta Eksekutif']);
                $n = '2';
                foreach($pesawat as $row) {
                    $sheet->row($n, [$n-1, $row->kode, $row->type_pesawat, $row->name, $row->eco_seat_num, $row->busines_seat_num, $row->exec_seat_num]);
                    $n++;
                }
                $sheet->setOrientation('landscape');
            });
        })->download('xls');
    }

    public function exportPenerbangan() {
        Excel::create(date_format(date_create(), 'Y_m_d_Him') . '_penerbangan_table_export', function($excel) {
            $excel->sheet('Sheet 1', function($sheet) {
                $penerbangan = Penerbangan::with([
                    'pesawat',
                    'asal',
                    'tujuan'
                ])->get();
                $sheet->row(1, ['No', 'Penerbangan', 'Pesawat', 'Asal', 'Waktu Berangkat', 'Tujuan', 'Waktu Sampai']);
                $n = '2';
                foreach($penerbangan as $row) {
                    $data = json_decode(json_encode($row));
                    $sheet->row($n, [
                        $n-1,
                        $data->pesawat->kode . ' ' . $data->no_penerbangan,
                        $data->pesawat->name,
                        $data->asal->name,
                        $row->waktu_berangkat,
                        $data->tujuan->name,
                        $row->waktu_sampai
                    ]);
                    $n++;
                }
                $sheet->setOrientation('landscape');
            });
        })->download('xls');
    }
}
