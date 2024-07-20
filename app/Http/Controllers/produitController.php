<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\back_product;
use App\Models\categorie;
use App\Models\fournisseur;
use App\Models\produit;
use App\Models\ranger;
use App\Models\Ventes;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class produitController extends Controller
{
    //

    public function listeProduit(){
        $produit = produit::orderBy("designation","ASC")->paginate(15);
        $nombreProduit = produit::count();
        $categorie=categorie::all();
        $fournisseurAll = fournisseur::all();
        $ranger=ranger::all();
        return view("produit.produit",compact('ranger','fournisseurAll','categorie','produit','nombreProduit'));
    }
    public function details_produit($id){
        $produit = produit::find($id);
        if(!$produit){
            toastr()->error('Veuillez Rafraichir la page ');
            return back();
        }
        $fournisseurAll=fournisseur::all();
        $categorie=categorie::all();
        $ranger =ranger::all();
        return view("produit.details_produit",compact('produit','fournisseurAll','ranger','categorie'));
    }
    public function UpdateProduit($id){
        $produit = produit::find($id);
        if(!$produit){
            toastr()->error('Veuillez Rafraichir la page ');
            return back();
        }
        $fournisseurAll=fournisseur::all();
        $categorie=categorie::all();
        return view("produit.update",compact('produit','categorie','fournisseurAll','rangerAll'));
    }
    public function  update_product(UpdateProductRequest $request){

        $product=produit::find($request->id);

        if(!$product){
            toastr()->error('Veuillez Rafraichir la page ');
            return back();
        }
        $product->designation=$request->designation;
        $product->prix_achat=$request->prix_achat;
        $product->prix_vente=$request->prix_vente;
        $product->qteStock=$request->qteStock;
        $product->seuil_alert=$request->seuil_alert;
        $product->fournisseur_id=$request->fournisseur_id !== null ? (int)$request->fournisseur_id : null;
        $number = mt_rand(1000000000,9999999999);
        $product->code_qr= $number;
        $product->categorie_id=$request->categorie_id !== null ? (int)$request->categorie_id : null;;
        $product->date_update=Carbon::now()->format('Y-m-d');
        if($request->hasFile('image')){
            $product->image=$request->file('image')->store('profil','public');
        }

              $product->update();
              toastr()->success('Produit Modifié avec success ✨!');
              return back();

    }
    public function addProduct(){
        $categorie=categorie::all();
        $fournisseurAll = fournisseur::all();
        $ranger=ranger::all();
        return view("produit.forms_produit",compact('categorie','fournisseurAll','ranger'));
    }

    public function creationProduit(AddProductRequest $request){

        


        $imagePath='images/product.jpg';
        $date=Carbon::now()->format('Y-m-d');
        $userAction=Auth::user()->name;
        $data['user_action']=$userAction;
        $data['date_creation']=$date;
        $produit=new produit();
        //
        $produit->user_action=$userAction;
        $produit->designation=$request->designation;
        $produit->prix_achat=$request->prix_achat;
        $produit->prix_vente=$request->prix_vente;
        $produit->qteStock=$request->qteStock;
        $produit->seuil_alert=$request->seuil_alert;

        $produit->fournisseur_id = $request->fournisseur_id !== null ? (int)$request->fournisseur_id : null;
        $produit->categorie_id=$request->categorie_id !== null ? (int)$request->categorie_id : null;
        $number = mt_rand(1000000000,9999999999);
        $produit->code_qr= $number;
        if($request->hasFile('image')){
            $imagePath= $request->file('image')->store('profil','public');
        }
        $produit->image=$imagePath;

        $produit->date_creation=date('Y-m-d');
            $produit->save();
            toastr()->success('Produit Ajouté avec success ✨!');
              return back();
    }
    public function ventes_simple(Request $request){
        $data=$request->validate([
            'produit_id'=>'required|exists:produits,id',
            'qte_vendue'=>'required'

        ]);
        $produit=produit::find($data['produit_id']);
        if($produit->qteStock<$data['qte_vendue']){
            toastr()->error('La quantité demandé est indisponible dans le stock!');
            return back();
        }
        $ventes=new Ventes();
        $ventes->qte_vendue=$data['qte_vendue'];
        $ventes->produit_id=$produit->id;
        if($request->prix_marchande!=0){
            $ventes->prix_marchande=$request->prix_marchande;
        }else{
            $ventes->prix_marchande=$produit->prix_vente;

        }
        $produit->qteStock -=$data['qte_vendue'];
        $ventes->date_creation=date('Y-m-d');
        $ventes->user_action=Auth::user()->name;
        $ventes->save();
        $produit->save();

        $message="Ventes de ".$produit->designation." effectuer avec succes";
        toastr()->success($message);
        return back();

    }

    public function delete_ventes(Request $request){
        $ventes=Ventes::findOrFail($request->id);

        $produit=produit::findOrFail($ventes->produit_id);
        if($ventes->qte_vendue<$request->qte_retourner){
            toastr()->error("Cette opération est impossible !");
            return back();
        }
        $produit->qteStock +=$request->qte_retourner;
        $back_produit=new back_product();
        $back_produit->produit_id=$produit->id;
        $back_produit->motif=$request->motif ? : "";
        $back_produit->qte_entrant=$request->qte_retourner;
        $back_produit->date_creation=date('Y-m-d');
        $back_produit->user_action=Auth::user()->name;
        $back_produit->save();

        $ventes->qte_vendue -=$request->qte_retourner;
        $produit->date_update=date('Y-m-d');
        $produit->update();
        $ventes->save();
        $message="Les ". $request->qte_retourner."on bien été retirer";
        if($ventes->qte_vendue==0){
            $ventes->delete();
            $message="La ventes à été supprimer avec succès";
        }
        toastr()->info($message);
        return back();

    }

    public function searchProduit(Request $request){

        $produit=produit::where('designation','like','%'.$request->search.'%')
        ->paginate(15);

        $nombreProduit = produit::count();
        $categorie=categorie::all();
        $fournisseurAll = fournisseur::all();
        $ranger=ranger::all();
        return view("produit.produit",compact('ranger','fournisseurAll','categorie','produit','nombreProduit'));
    }


    public function produitAll(){
        $produit = produit::orderBy("designation","ASC")->get();

        return response()->json(['produitAll'=>$produit]);

    }



    public function produitRuptureStock(Request $request){

        $produit=produit::where('qteStock', '<=', 1)->paginate(10);

        $nombreProduit = produit::count();
        $categorie=categorie::all();
        $fournisseurAll = fournisseur::all();
        $ranger=ranger::all();
        return view("produit.produit",compact('ranger','fournisseurAll','categorie','produit','nombreProduit'));
    }


    public function updateImpression($id){

        $impressionAll = DB::table('ventes_impressions')
        ->join('impressions', 'ventes_impressions.impression_id', '=', 'impressions.id')
        ->where('ventes_impressions.id',$id)
        ->select('ventes_impressions.*', 'impressions.type_impression', 'impressions.taille', 'impressions.couleur', 'impressions.prix')
        ->orderByDesc('id');
        return view("produit.updateImpression",compact('impressionAll'));

    }

    public function update_vente($id){

        $ventesUpdate=Ventes::find($id);
        if(!$ventesUpdate){
            toastr()->error("Cette vente n'existe pas!");
            return back();
        }

        $produitAll=Produit::all();
        return view("ventes.update_ventes",compact('ventesUpdate','produitAll'));

    }


    public function update_vente_informations(Request $request){

        $ventesUpdate=Ventes::find($request->id);
        if(!$ventesUpdate){
            toastr()->error("Cette vente n'existe pas!");
            return back();
        }

        $ventesUpdate->qte_vendue=$request->qte_vendue;
        $ventesUpdate->prix_marchande=$request->prix_marchande;
        $ventesUpdate->date_creation=date('Y-m-d');
        $ventesUpdate->user_action=Auth::user()->name;
        $ventesUpdate->save();
        toastr()->success("Cette vente n'existe pas!");
            return back();

    }
}
