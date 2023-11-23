<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\v_besoins_non_valide;
use App\Models\Besoin;
use Illuminate\Support\Facades\Auth;

class BesoinController extends Controller
{
    public function getBesoins(){
        $besoins = v_besoins_non_valide::all();

        return view('commercial.validation')->with('besoins', $besoins);
    }

    public function valider(Request $request){
        if (Auth::user()->auth_level >= env('ADMIN_LEVEL')) {
            $obj = Besoin::findOrFail($request->input('id'));
            $obj->etat = 1;
            $obj->save();
            return to_route('besoins.all');
        }
        return to_route('besoins.all')->withErrors([
            'error' => 'Vous n\'avez pas l\'autorisation pour effectuer cette tache'
        ]);
    }
}
