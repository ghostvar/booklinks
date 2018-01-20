<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kereta;
use App\Stasiun;

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
}
