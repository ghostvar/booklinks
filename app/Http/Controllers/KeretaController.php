<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kereta;
use App\Stasiun;
use App\JurusanKereta;
use App\RuteKereta;

class KeretaController extends Controller
{
    public function getTrains () {
        return Kereta::get();
    }

    public function insertTrain (Request $request) {
        $kereta = new Kereta;
        $kereta->no_kereta = $request->input('no_kereta');
        $kereta->name = $request->input('name');
        $kereta->eco_seat_num = $request->input('eco_seat_num');
        $kereta->busines_seat_num = $request->input('busines_seat_num');
        $kereta->exec_seat_num = $request->input('exec_seat_num');
        $kereta->save();
        return [ 'status' => 'success', 'messages' => 'all done!' ];
    }

    public function updateTrain (Request $request) {
        $kereta = Kereta::find($request->input('id'));
        $kereta->no_kereta = $request->input('no_kereta');
        $kereta->name = $request->input('name');
        $kereta->eco_seat_num = $request->input('eco_seat_num');
        $kereta->busines_seat_num = $request->input('busines_seat_num');
        $kereta->exec_seat_num = $request->input('exec_seat_num');
        $kereta->save();
        return [ 'status' => 'success', 'messages' => 'all done!' ];
    }

    public function deleteTrain ($id) {
        $kereta = Kereta::find($id);
        $kereta->delete();
        return [ 'status' => 'success', 'messages' => 'all done!' ];
    }

    public function getStasiun () {
        return Stasiun::get();
    }

    public function insertStasiun (Request $request) {
        $stasiun = new Stasiun;
        $stasiun->kode = $request->input('kode');
        $stasiun->kota = $request->input('kota');
        $stasiun->name = $request->input('name');
        $stasiun->save();
        return [ 'status' => 'success', 'messages' => 'all done!' ];
    }

    public function updateStasiun (Request $request) {
        $stasiun = Stasiun::find($request->input('id'));
        $stasiun->kode = $request->input('kode');
        $stasiun->kota = $request->input('kota');
        $stasiun->name = $request->input('name');
        $stasiun->save();
        return [ 'status' => 'success', 'messages' => 'all done!' ];
    }

    public function deleteStasiun ($id) {
        $stasiun = Stasiun::find($id);
        $stasiun->delete();
        return [ 'status' => 'success', 'messages' => 'all done!' ];
    }

    public function getAllJurusan () {
        return JurusanKereta::with([
            'kereta:no_kereta,name,eco_seat_num,busines_seat_num,exec_seat_num',
            'rute.stasiunBerangkat:kode,kota,name',
            'rute.stasiunSampai:kode,kota,name'
        ])->get();
    }

    public function insertJurusan (Request $request) {
        $jurusan = JurusanKereta::create([
            'kereta_no' => $request->input('kereta')['no_kereta']
        ]);
        $rutes = [];
        foreach($request->input('rute') as $rute) {
            $rutes[] = new RuteKereta([
                'stasiun_berangkat' => $rute['stasiun_berangkat']['kode'],
                'stasiun_sampai' => $rute['stasiun_sampai']['kode'],
                'waktu_berangkat' => $rute['waktu_berangkat'],
                'waktu_sampai' => $rute['waktu_sampai'],
                'urutan' => $rute['urutan']
            ]); 
        }
        $jurusan->rute()->saveMany($rutes);
        return [ 'status' => 'success', 'messages' => 'all done!' ];
    }

    public function updateJurusan (Request $request) {
        $jurusan = JurusanKereta::find($request->id);
        $rutes = [];
        RuteKereta::where('jurusan_id', $jurusan->id)->delete();
        foreach($request->input('rute') as $rute) {
            $rutes[] = new RuteKereta([
                'stasiun_berangkat' => $rute['stasiun_berangkat']['kode'],
                'stasiun_sampai' => $rute['stasiun_sampai']['kode'],
                'waktu_berangkat' => $rute['waktu_berangkat'],
                'waktu_sampai' => $rute['waktu_sampai'],
                'urutan' => $rute['urutan']
            ]); 
        }
        $jurusan->rute()->saveMany($rutes);
        return [ 'status' => 'success', 'messages' => 'all done!' ];
    }

    public function deleteJurusan ($id) {
        JurusanKereta::find($id)->delete();
        RuteKereta::where('jurusan_id', $id)->delete();
        return [ 'status' => 'success', 'messages' => 'all done!' ];
    }
}
