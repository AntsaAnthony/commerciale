<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\v_besoins_non_valide;
use App\Models\Besoin;


class BesoinController extends Controller
{
    public function getBesoins(){
        $besoins = v_besoins_non_valide::all();

        return view('commercial.validation')->with('besoins', $besoins);
    }

    public function valider(Request $request){
        $obj = Besoin::findOrFail($request->input('id'));
        $obj->etat = 1;
        $obj->save();
        return to_route('besoins.all');
    }
}
