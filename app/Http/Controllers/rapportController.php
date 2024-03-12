<?php

namespace App\Http\Controllers;

use App\Models\rapport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

            class rapportController extends Controller
{
   



       public function create_rapport(Request $request){
        if(!$request->has(['date'])){
          toastr()->success('Le champs ne doivent pas etre vide !');
          return back();
        }
       
        $rapport=new rapport();
        $rapport->somme_total=$this->somme_total();
        $rapport->total_sorties=$this->total_sorties();
        $rapport->total_produit=$this->produits_day($request->date)?:0;
        $rapport->total_impression=$this->impression_day($request->date)?:0;
        $rapport->total_month=$this->total_month()  ;
        $rapport->user_action=Auth::user()->name;
        $rapport->date_creation=date("Y-m-d");
        $rapport->save();
         if(!$rapport){
            toastr()->warning("Verification de la requette");
            return back();
    
         }
        toastr()->success("Rapport crée avec success");
        return back();

       }


       public function impression_day($date) {
        $sumImpression = DB::select('
            SELECT SUM(qte_vendue * prix) AS sommes_impression
            FROM impressions
            JOIN ventes_impressions ON ventes_impressions.impression_id = impressions.id
            WHERE ventes_impressions.date_creation = ?', [$date])[0]->sommes_impression;
    
        return $sumImpression;
    }
    

    public function total_month() {
        $date = date('m');
    
        $sumImpression = DB::select('
            SELECT SUM(qte_vendue * prix) AS sommes_impression
            FROM impressions
            JOIN ventes_impressions ON ventes_impressions.impression_id = impressions.id
            WHERE MONTH(ventes_impressions.date_creation) = ?', [$date])[0]->sommes_impression;
    
        $sumProduit = DB::select('
            SELECT SUM(qte_vendue * prix_marchande) AS sommes_produits
            FROM ventes
            WHERE MONTH(ventes.date_creation) = ?', [$date])[0]->sommes_produits;
    
        return $sumProduit + $sumImpression;
    }
    public function produits_day($date) {
        $sumProduit = DB::select('
            SELECT SUM(qte_vendue * prix_marchande) AS sommes_produits
            FROM ventes
            JOIN produits ON produits.id = ventes.produit_id
            WHERE ventes.date_creation = ? AND ventes.factures_id IS NULL', [$date])[0]->sommes_produits;
    
        $sumFactures = DB::select('
            SELECT SUM(qte_vendue * prix_marchande) AS sommes_produits, COUNT(*) as quantity_product
            FROM ventes
            JOIN produits ON produits.id = ventes.produit_id
            JOIN factures ON factures.id = ventes.factures_id
            WHERE ventes.date_creation = ?', [$date])[0]->sommes_produits;
    
        return $sumProduit + $sumFactures;
    }
    

    public function somme_total() {
        $sumImpression = DB::select('
            SELECT SUM(qte_vendue * prix) AS sommes_impression
            FROM impressions
            JOIN ventes_impressions ON ventes_impressions.impression_id = impressions.id
        ')[0]->sommes_impression;
    
        $sumProduit = DB::select('
            SELECT SUM(qte_vendue * prix_marchande) AS sommes_produits
            FROM ventes
            JOIN produits ON produits.id = ventes.produit_id
            WHERE ventes.factures_id IS NULL')[0]->sommes_produits;
    
        $sumFactures = DB::select('
            SELECT SUM(qte_vendue * prix_marchande) AS sommes_produits, COUNT(*) as quantity_product
            FROM ventes
            JOIN produits ON produits.id = ventes.produit_id
            JOIN factures ON factures.id = ventes.factures_id')[0]->sommes_produits;
    
        return $sumProduit + $sumImpression + $sumFactures;
    }
    
    public function total_sorties() {
        $date = date('Y-m-d');
        
        $sumCommandes = DB::select('
            SELECT SUM(commandes.qte_entrant * produits.prix_achat) AS sommes_sorties
            FROM commandes
            JOIN produits ON produits.id = commandes.produit_id
            WHERE commandes.date_creation = ?', [$date])[0]->sommes_sorties;
    
        return $sumCommandes ?: 0;
    }
    
    public function delete_rapport($id){
        $rapport=rapport::find($id);
        if(!$rapport){
            toastr()->warning("Rapport inexistant");
            return back();
        }
        $rapport->delete();
        toastr()->info("Rapport supprimer avec succes !");
        return back();
    }
    
}
