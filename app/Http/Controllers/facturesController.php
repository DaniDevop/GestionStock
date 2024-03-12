<?php

namespace App\Http\Controllers;

use App\Models\commandes;
use App\Models\Ventes;
use Illuminate\Support\Str;

use App\Models\factures;
use App\Models\produit;
use Barryvdh\DomPDF\Facade\Pdf AS PDF;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Codedge\Fpdf\Fpdf\Fpdf ;


class facturesController extends Controller
{
    //

    public function liste_facture_view(){

        $factures=factures::orderBy('id','DESC')->get();
        $numberFactures=factures::count();
        return view('ventes.liste_facture_view',compact('factures','numberFactures'));
    }
    public function show_details_vente($id){
        $factures_id=$id;
        $ventesAll=Ventes::where('factures_id',$id)
        ->orderByDesc('id')
        ->
        get();
        return view('ventes.details_ventes',compact('factures_id','ventesAll'));

    }










    public function imprime_factures($id)
    {
            $total_somme = 0;
            $date = date('Y-m-d');
            $ventesAll = Ventes::where('factures_id', $id)->get();
            //$logo = "/img/logo.png";
            $factures = factures::find($id);

            foreach ($ventesAll as $row) {
                $total_somme += $row->prix_marchande * $row->qte_vendue;
            }

            $user = Auth::user();

            return view('ventes.impression_factures', compact('date', 'user', 'total_somme', 'factures', 'ventesAll'));

    }



    public function imprimer_factures_listes()
    {
        $somme_total = 0;
        $current = Carbon::now()->format('Y/m/d');

        $facturesAll = factures::all();

        foreach ($facturesAll as $facture) {
            $somme_total += $facture->produit->prix_vente * ($facture->qte_vendue);
        }

        $productSales = factures::select('produit_id', DB::raw('SUM(qte_vendue) as totalSales'))
            ->groupBy('produit_id')
            ->with('produit')
            ->get();

        $pdf = PDF::loadView('ventes.listes_factures_impression', compact('facturesAll', 'current', 'somme_total', 'productSales'));

        return $pdf->stream();
    }


    public function facturesExiste($number){
        return factures::whereCodeQr($number)->exists();
    }

    public function vente_product(Request $request){
        $produit=produit::all();
        $facturesNumber=factures::count();
        $matricule = 'FACT°-' . str_pad($facturesNumber, 5, '0', STR_PAD_LEFT);
        $panier = $request->session()->get('panier_ventes', []);


        return view('ventes.factures',compact('panier','matricule','facturesNumber','produit'));
    }

    public function addProductToFactures(Request $request){
        $produit = produit::findOrFail($request->produit_id);
        if($produit && $produit->qteStock < $request->qte_vendue){
            toastr()->error('La Quantité demandé est indisponible!');
            return back();
             }



        $panier = $request->session()->get('panier_ventes', []);
        foreach($panier as $pan){
            if($produit->id ==$pan['produit_id']){
                toastr()->error('Le produit existe déjà dans la base!');
                return back();
            }

        }
        $prix_vendu = $request->prix_vendue != 0 ? $request->prix_vendue : $produit->prix_vente;


        $panier[] = [
            'produit_id' => $produit->id,
            'designation' => $produit->designation,
            'prix_vente' => $prix_vendu,
            'qte_vendue' => $request->qte_vendue,
        ];
        $request->session()->put('panier_ventes', $panier);

        toastr()->success('Produit ajouté dans la vente ✨!');
        return back();
    }


    public function create_facture_ventes(Request $request){
        $panier = $request->session()->get('panier_ventes', []);
        $number = mt_rand(1000000000,9999999999);
        if($this->facturesExiste($number)){
            $number = mt_rand(1000000000,9999999999);

        }
        $matricule=factures::count();
        $somme_entrant=0;

        $facture = factures::create([
            'matricule' =>'FACT°00'. $matricule,
            'date_creation' => $request->date,
            'code_qr'=>$number,
            'somme_entrant'=>0

        ]);

        // Enregistrez chaque vente associée à la facture

        foreach ($panier as $vente) {
            $produit = Produit::findOrFail($vente['produit_id']);
            $somme_entrant +=($vente['prix_vente']*$vente['qte_vendue']) ;
            $newVentes=new Ventes();
            $newVentes->user_action=Auth::user()->name;
            $newVentes->qte_vendue=$vente['qte_vendue'];
            $newVentes->produit_id=$produit->id;
            $newVentes->factures_id=$facture->id;
            $newVentes->prix_marchande=$vente['prix_vente'];
            $newVentes->date_creation=date('Y-m-d');
            $newVentes->save();
             $produit->update(['qteStock' => $produit->qteStock - $vente['qte_vendue']]);
        }
        $facture->somme_entrant=$somme_entrant;
        $facture->date_creation=date('Y-m-d');;
        $facture->save();
        $request->session()->forget('panier_ventes');
        toastr()->success('Factures crée avec success ✨!');
        return redirect()->route("factures_vue");

    }

    public function retire_product($id)
    {
        // Récupérez le panier actuel depuis la session
        $panier = session()->get('panier_ventes', []);

        // Recherchez l'index du produit dans le panier
        $index = array_search($id, array_column($panier, 'produit_id'));

        // Si l'index est trouvé, retirez le produit du panier
        if ($index !== false) {
            unset($panier[$index]);

            // Réindexez le tableau après la suppression
            $panier = array_values($panier);

            // Mettez à jour le panier dans la session
            session()->put('panier_ventes', $panier);

            toastr()->success('Produit retiré du panier avec succès ✨!');
        } else {
            toastr()->error('Le produit n\'existe pas dans le panier!');
        }

        return back();
    }


    // Methode pour imprimer une factures



        public function delete_ventes($id){

        $vente=Ventes::find($id);
        if(!$vente){
            toastr()->error("Opération non éffectué !");
            return back();
        }
        $vente->delete();
        toastr()->info("Ventes supprimer avec succès !");
        return back();
     }
     public function delete_factures($id){

        $vente=factures::find($id);
        if(!$vente){
            toastr()->error("Opération non éffectué !");
            return back();
        }
        $vente->delete();
        toastr()->info("Factures N° :".$vente->matricule. "supprimer avec succès !");
        return back();
     }






}
