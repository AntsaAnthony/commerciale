<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Besoin;
use App\Models\Product;
use App\Models\Service;
use App\Models\Category;
use App\Models\DemandeProforma;


class CommController extends Controller
{
    public function index() {
        dd("It's commercial section");
    }

    public function showProductGroup() {
                
        $allbesoin = Besoin::getBesoinParNature();
        return view('commercial.besoins', [
            'besoins' => $allbesoin
        ]);
    }
    public function insertBesoin(Request $request) {
        $besoin= Besoin::create([
            'service_id' => $request->input('service_id'),
            'product_id' => $request->input('product_id'),
            'quantity' => $request->input('quantity'),
            'etat' => 0
        ]);
    }
    public function AffichBesoin() {
        $service = Service::all();
        $product= Product::all();
        return view('commercial.formbesoin', [
            'service' => $service,
            'products'=> $product
        ]);
    }

    public function insererDemandeProforma(){
        $demandeProforma = DemandeProforma::addDemandeProforma(1,2);
    }
}
