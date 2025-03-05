<?php

namespace App\Http\Controllers;

use App\Models\commandes;
use App\Models\Entree;
use App\Models\fournisseur;
use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; // Assurez-vous d'importer la classe Str


class CommandesController extends Controller
{

    public function view_commandes(){
        $produits=produit::all();
        $numberCmd=commandes::count();
      
       
        return view('commandes.fournisseur_commandes',compact('produits','numberCmd'));
    }

    public function create_new_commandes(Request $request){
    

        $data=$request->validate([
            'date_commandes'=>'required',
            'produit_id' => 'required|exists:produits,id',
            'qte_entrant'=>'required',
        ]);
        $commandes=Commandes::count();
        $matricule = 'Ref-' . Str::random(5)."CMD";
        $commandes=new Commandes();
        $commandes->reference=$matricule.'-'.$commandes;
        $commandes->date_commandes=$data['date_commandes'];
        $commandes->qte_entrant=$data['qte_entrant'];
        $commandes->statut='Non-valider';
        $commandes->produit_id=$data['produit_id'];
        $commandes->user_action=Auth::user()->name;
        $commandes->date_creation=date('Y-m-d');
        $commandes->save();
        if(!$commandes){
            toastr()->error('Une erreur c est produite dans la demande !!!');
            return back();        }
        toastr()->success('Commandes effectué avec success !');
        return back();
    }
    //
    public function listeCommandes(){
        $commandes = commandes::orderBy("id","DESC")->where('statut','Non-valider')->get();
        
        $commandesNumber = commandes::count();
     
        $produits=produit::all();
       
        return view("commandes.commandes",compact('produits','commandes','commandesNumber'));
    }
    

    
    public function valider_commandes($id) {
        $commande = Commandes::find($id);
    
        if($commande && $commande->produit) {
            $produit = $commande->produit;
    
            if($commande->statut == "Non-valider") {
                // Si la commande n'est pas encore validée, mettez à jour le statut et le stock du produit
                $commande->statut = "Valider";
                $produit->qteStock += $commande->qte_entrant;
                $produit->date_creation =date('Y-m-d');
                $produit->save();
                $commande->save();
                return redirect()->back()->with('valider', $commande->statut == "Valider" ? 'Valider avec succès' : 'Non-valider avec succès');
            } else {
                // Si la commande est déjà validée, rétablissez le statut et ajustez le stock du produit
                $commande->statut = "Non-valider";
                $produit->qteStock -= $commande->qte_entrant;
                $produit->date_creation =date('Y-m-d');
                $produit->save();
                $commande->save();
                return redirect()->back()->with('valider2', $commande->statut == "Valider" ? 'Valider avec succès' : 'Non-valider avec succès');

            }
             
    
        }
        return redirect()->back()->with('error', 'Erreur lors de la validation de la commande');
    }

    public function details_commandes($id){
        $commandes=Commandes::find($id);
        if(!$commandes){
            return redirect()->back()->with('error', '');
        }
        $produits=produit::all();
        
        return view('commandes.details_commandes',compact('commandes','produits'));
    }

    public function update_commandes_forms(Request $request){
        $data=$request->validate([
            'date_commandes'=>'required',
            'produit_id'=>'required|exists:produits,id',
            'qte_entrant'=>'required',
            'id_commandes'=>'required',
        ]);
        $commandes=commandes::find($request->id_commandes);
        $commandes->date_commandes=$data['date_commandes'];
        $commandes->produit_id=$data['produit_id'];
        $commandes->qte_entrant=$data['qte_entrant'];
        $commandes->entree_id=$data['entree_id'];
        $commandes->user_action=Auth::user()->name;
        $commandes->updated_at=date('Y-m-d');
        $commandes->save();
        if(!$commandes){
            toastr()->success('La Commandes est effectué avec success!');
            return back(); 
        }
        toastr()->error('La Commandes n\'a pas été effectué!');
        return back(); 
    }

  

    public function delete_commandes($id){
        $commandes=Commandes::find($id);
        if(!$commandes){

        }
        $commandes->delete();

        return redirect()->back()->with('delete','Supprimer');
    }

    public function suivis_commandes(){
        $commandes=Commandes::where('statut','Valider')->get();
        $commandesNumber=Commandes::where('statut','Valider')->count();
        return view("commandes.suivis_commandes",compact('commandesNumber','commandes'));
    }
    
   
   
    
}
