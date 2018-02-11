<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Pelanggan;

class CostumerController extends Controller
{
    public function getAllCostumers () {
        return Pelanggan::get();
    }

    public function insertCostumer (Request $request) {
        $pelanggan = new Pelanggan;
        $pelanggan->name = $request->input('name');
        $pelanggan->email = $request->input('email');
        $pelanggan->kota = $request->input('kota');
        $pelanggan->negara = $request->input('negara');
        $pelanggan->save();
        return [ 'status' => 'success', 'messages' => 'all done!' ];
    }

    public function updateCostumer (Request $request) {
        $pelanggan = Pelanggan::find($request->input('id'));
        $pelanggan->name = $request->input('name');
        $pelanggan->email = $request->input('email');
        $pelanggan->kota = $request->input('kota');
        $pelanggan->negara = $request->input('negara');
        $pelanggan->save();
        return [ 'status' => 'success', 'messages' => 'all done!' ];
    }

    public function deleteCostumer ($id) {
        Pelanggan::find($id)->delete();
        return [ 'status' => 'success', 'messages' => 'all done!' ];
    }
}
