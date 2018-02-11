<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bandara;
use App\Pesawat;
use App\Penerbangan;

class PenerbanganController extends Controller
{
    public function getAllBandara () {
        return Bandara::get();
    }

    public function insertBandara (Request $request) {
        $bandara = new Bandara;
        $bandara->kode = $request->input('kode');
        $bandara->kota = $request->input('kota');
        $bandara->name = $request->input('name');
        $bandara->save();
        return [ 'status' => 'success', 'messages' => 'all done!' ];
    }

    public function updateBandara (Request $request) {
        $bandara = Bandara::find($request->input('id'));
        $bandara->kode = $request->input('kode');
        $bandara->kota = $request->input('kota');
        $bandara->name = $request->input('name');
        $bandara->save();
        return [ 'status' => 'success', 'messages' => 'all done!' ];
    }

    public function deleteBandara ($id) {
        Bandara::find($id)->delete();
        return [ 'status' => 'success', 'messages' => 'all done!' ];
    }

    public function getAllPesawat () {
        return Pesawat::get();
    }

    public function insertPesawat (Request $request) {
        $pesawat = new Pesawat;
        $pesawat->name = $request->input('name');
        $pesawat->kode = $request->input('kode');
        $pesawat->type_pesawat = $request->input('type_pesawat');
        $pesawat->exec_seat_num = $request->input('exec_seat_num');
        $pesawat->eco_seat_num = $request->input('eco_seat_num');
        $pesawat->save();
        return [ 'status' => 'success', 'messages' => 'all done!' ];
    }

    public function updatePesawat (Request $request) {
        $pesawat = Pesawat::find($request->input('id'));
        $pesawat->name = $request->input('name');
        $pesawat->kode = $request->input('kode');
        $pesawat->type_pesawat = $request->input('type_pesawat');
        $pesawat->exec_seat_num = $request->input('exec_seat_num');
        $pesawat->eco_seat_num = $request->input('eco_seat_num');
        $pesawat->save();
        return [ 'status' => 'success', 'messages' => 'all done!' ];
    }

    public function deletePesawat ($id) {
        Pesawat::find($id)->delete();
        return [ 'status' => 'success', 'messages' => 'all done!' ];
    }

    public function getAllPenerbangan () {
        return Penerbangan::with([
            'pesawat',
            'asal',
            'tujuan'
        ])->get();
    }
}
