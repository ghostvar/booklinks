<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kereta;
use App\Stasiun;
use App\JurusanKereta;

class KeretaController extends Controller
{
    public function getTrains () {
        return Kereta::get();
    }

    public function insertTrain (Request $request) {
        $kereta = new Kereta;
        $kereta->name = $request->input('name');
        $kereta->save();
        return [ 'status' => 'success', 'messages' => 'all done!' ];
    }

    public function updateTrain (Request $request) {
        $kereta = Kereta::find($request->input('id'));
        $kereta->name = $request->input('name');
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
        return JurusanKereta::getAll();
    }
}
