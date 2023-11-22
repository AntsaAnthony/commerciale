<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Besoin;
use App\Models\Product;
use App\Models\Service;
use App\Models\DemandeProforma;
use App\Models\Proforma;
use App\Models\ProduitDispo;
use App\Models\BonDeCommande;
use Illuminate\Support\Facades\Auth;

class CommController extends Controller
{
    public function index()
    {
        dd(BonDeCommande::find(1)->proformat);
    }

    public function showProductGroup()
    {

        $allbesoin = Besoin::getBesoinParNature();
        return view('commercial.besoins', [
            'besoins' => $allbesoin
        ]);
    }
    public function insertBesoin(Request $request)
    {
        $besoin = Besoin::create([
            'service_id' => $request->input('service_id'),
            'product_id' => $request->input('product_id'),
            'quantity' => $request->input('quantity'),
            'etat' => 0
        ]);
    }
    public function AffichBesoin()
    {
        $service = Service::all();
        $product = Product::all();
        return view('commercial.formbesoin', [
            'service' => $service,
            'products' => $product
        ]);
    }

    public function test()
    {
        $lolo = ProduitDispo::where('fournisseur_id', '=', 1)->get();
        // dd($lolo);
        $prof = Proforma::envoyerProforma(1, 3, 'cheque');
        echo "Vita ahhhhhh";
    }

    public function insererDemandeProforma()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $demandeProforma = DemandeProforma::addDemandeProforma($user->id, 2);
        } else {
            throw new \Exception("Vous devez vous connécter pour faire cela");
        }
    }
}
