<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DemandeProformaRequest;
use Illuminate\Validation\ValidationException;
use App\Models\Besoin;
use App\Models\v_besoins_non_valide;
use App\Models\Product;
use App\Models\Service;
use App\Models\Fournisseur;
use App\Models\DemandeProforma;
use App\Models\Proforma;
use App\Models\ProduitDispo;
use App\Models\BonDeCommande;
use Illuminate\Support\Facades\Auth;
use PDF;

class CommController extends Controller
{
    public function index(){
        // User::create([
        //     'name' => 'Naivo',
        //     'email' => 'commerciale@admin.com',
        //     'password' => '1234',
        //     'profil' => '2',
        //     'auth_level' => '10'
        // ]);
        return view('commercial.index');
    }

    public function showProductGroup()
    {

        $allbesoin = Besoin::getBesoinParNature();
        $fournisseur = Fournisseur::all();
        return view('commercial.besoins', [
            'besoins' => $allbesoin,
            'fournisseurs' =>$fournisseur
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
        return redirect()->route('comm.besoins.all');
    }
    public function AffichBesoin()
    {
        $service = Service::all();
        $product = Product::all();
        return view('commercial.formbesoin', [
            'services' => $service,
            'products' => $product
        ]);
    }

    public function getBesoins(){
        $besoins = v_besoins_non_valide::all();

        return view('commercial.validation')->with('besoins', $besoins);
    }

    public function valider(Request $request){
        if (Auth::user()->auth_level >= env('ADMIN_LEVEL')) {
            $obj = Besoin::findOrFail($request->input('id'));
            $obj->etat = 1;
            $obj->save();
            return to_route('comm.besoins.all');
        }
        return to_route('comm.besoins.all')->withErrors([
            'error' => 'Vous n\'avez pas l\'autorisation d\'effectuer cette tache'
        ]);
    }

    public function insererDemandeProforma(DemandeProformaRequest $request)
    {
            $fournisseur = $request->input('fournisseur');
            if (Auth::check()) {
                $user = Auth::user();
                $demandeProforma = DemandeProforma::addAllDemandeProforma($user->id,$fournisseur);
                return to_route('comm.besoins.all');
            } else {
                throw new \Exception("Vous devez vous connecter pour faire cela");
            }
    }
        public function PDFProforma()
    {
        // $donnees = VotreModele::all(); // Récupérez vos données depuis le modèle

        // $pdf = PDF::loadView('nom_de_la_vue_pdf', compact('donnees'));

        $pdf = PDF::loadView('pdf.proforma');

        return $pdf->download('proforma.pdf'); // Téléchargez le PDF généré
    }
}
