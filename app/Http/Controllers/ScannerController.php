<?php

namespace App\Http\Controllers;

use App\Models\impression;
use App\Models\ventes_impression;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScannerController extends Controller
{
    // Simple impression
    const PRIX_A3_NOIR = 100;
    const PRIX_A3_COULEUR = 300;
    const PRIX_A4_NOIR = 25;
    const PRIX_A4_COULEUR = 100;
    // Photocopies
    const PRIX_A3_NOIR_PHOTO=100;
    const PRIX_A3_COULEUR_PHOTO=300;
    const PRIX_A4_NOIR_PHOTO=15;
    const PRIX_A4_COULEUR_PHOTO=100;
    // Reliure
    const PRIX_A3_RELIURE=700;
    const PRIX_A6_RELIURE=300;
    const PRIX_A4_RELIURE=400;

    // Impression
    const PRIX_A4_IMPRESSION_NOIR=25;
    const PRIX_A4_IMPRESSION_COULEUR=100;
    const PRIX_A3_IMPRESSION_NOIR=100;
    const PRIX_A3_IMPRESSION_COULEUR=300;
    const PRIX_A4_CARTONNE_COULEUR=300;
    const PRIX_A3_CARTONNE_COULEUR=500;
    const PRIX_A4_AUTO_COLLANT=250;
    const PRIX_A3_AUTO_COULEUR=500;
    //
    const PRIX_A3_SPIRALE=1000;
    const PRIX_A3_BAGUETTE=700;
    const PRIX_A4_SPRIRALE=500;
    const PRIX_A4_BAGUETTE=400;
    const PRIX_A3_SCANNER=500;
    const PRIX_A4_SCANNER=100;



public function photocopies(Request $request)
{
    $data = $request->validate([
        'page' => 'required',
        'couleur' => 'required',
        'qte_entrant' => 'required',
        'prix_marchande'=>'required'
    ]);

    $prixParDefaut = [
        'A3' => [
            'Noir' => self::PRIX_A3_NOIR,
            'Couleur' => self::PRIX_A3_COULEUR,
        ],
        'A4' => [
            'Noir' => self::PRIX_A4_NOIR,
            'Couleur' => self::PRIX_A4_COULEUR,
        ],
    ];

    $impression = new impression();

    if (($data['page'] == 'A3' || $data['page'] == 'A4') &&
        ($data['couleur'] == 'Noir' || $data['couleur'] == 'Couleur')) {
        $impression->type_impression = "Photocopie";
        $impression->taille = $data['page'];
        $impression->couleur = $data['couleur'];
        if( $impression->prix = $data['prix_marchande']!=0){
            $impression->prix = $data['prix_marchande'];
        }else{
            $impression->prix=$prixParDefaut[$data['page']][$data['couleur']];

        }
        $impression->save();
        $ventes_impression=new ventes_impression();
        $ventes_impression->qte_vendue=$data['qte_entrant'];
        $ventes_impression->impression_id=$impression->id;
        $ventes_impression->user_action=Auth::user()->name;
        $ventes_impression->date_creation=date('Y-m-d');
        $ventes_impression->save();
        toastr()->success('Photocopies e effectuée avec succès');
        return back();
    } else {
        // Gérer une erreur ou afficher un message approprié
        toastr()->error('Combinaison invalide de page et de couleur');
        return back();
    }

    
}
public function reliure(Request $request){
    $data = $request->validate([
        'page' => 'required',
        'couleur' => 'required',
        'qte_entrant' => 'required',
        'prix_marchande'=>'required',
    ]);

    $prixParDefaut = [
        'A3' => [
            'Spirale' => self::PRIX_A3_SPIRALE,
            'Baguette' => self::PRIX_A3_BAGUETTE,
        ],
        'A4' => [
            'Spirale' => self::PRIX_A4_SPRIRALE,
            'Baguette' => self::PRIX_A4_BAGUETTE,
        ],
    ];

    $impression = new impression();

    if (($data['page'] == 'A3' || $data['page'] == 'A4') &&
        ($data['couleur'] == 'Spirale' || $data['couleur'] == 'Baguette')) {
        $impression->type_impression = "Reliure";
        $impression->taille = $data['page'];
        $impression->couleur = $data['couleur'];
        
        if( $impression->prix = $data['prix_marchande']!=0){
            $impression->prix = $data['prix_marchande'];
        }else{
            $impression->prix=$prixParDefaut[$data['page']][$data['couleur']];

        }
       
        $impression->save();
        $ventes_impression=new ventes_impression();
        $ventes_impression->qte_vendue=$data['qte_entrant'];
        $ventes_impression->impression_id=$impression->id;
        $ventes_impression->user_action=Auth::user()->name;
        $ventes_impression->date_creation=date('Y-m-d');
        $ventes_impression->save();

        toastr()->success('Reliure effectue avec success');
        return back();
    } else {
        // Gérer une erreur ou afficher un message approprié
        toastr()->error('Combinaison invalide de page et de couleur');
        return back();
    }

        
}
public function plastification(Request $request)
{
    $data = $request->validate([
        'page' => 'required',
        'qte_entrant' => 'required',
        'prix_marchande'=>'required',
    ]);

    $prixParDefaut = [
        'A3' => self::PRIX_A3_RELIURE,
        'A4' => self::PRIX_A4_RELIURE,
        'A6' => self::PRIX_A6_RELIURE,
    ];

    $impression = new Impression();
    $impression->type_impression = "Plastification";
    $impression->couleur = "Noir";
    
    $impression->taille = $data['page'];
    if($data['prix_marchande'] != 0){
        $impression->prix = $data['prix_marchande'];
    }else{
        $impression->prix =$prixParDefaut[$data['page']];

    }
    
    $impression->save();
    $ventes_impression=new ventes_impression();
    $ventes_impression->qte_vendue=$data['qte_entrant'];
    $ventes_impression->impression_id=$impression->id;
    $ventes_impression->user_action=Auth::user()->name;
    $ventes_impression->date_creation=date('Y-m-d');
    $ventes_impression->save();

    toastr()->success('Plastification effectuée avec succès');
    return back();
}
public function impression(Request $request){
    $data = $request->validate([
        'page' => 'required',
        'couleur' => 'required',
        'qte_entrant' => 'required',
        'prix_marchande'=>'nullable'
    ]);

    $prixParDefaut = [
        'A3' => [
            'Noir' => self::PRIX_A3_IMPRESSION_NOIR,
            'Couleur' => self::PRIX_A3_IMPRESSION_COULEUR,
            'Cartonnee'=>self::PRIX_A3_CARTONNE_COULEUR,
            'Autant-collant'=>self::PRIX_A3_AUTO_COULEUR
        ],
        'A4' => [
            'Noir' => self::PRIX_A4_IMPRESSION_NOIR,
            'Couleur' => self::PRIX_A4_IMPRESSION_COULEUR,
            'Cartonnee'=>self::PRIX_A4_CARTONNE_COULEUR,
            'Autant-collant'=>self::PRIX_A4_AUTO_COLLANT
        ]
        ,
        
    ];

    $impression = new impression();

    if (($data['page'] == 'A3' || $data['page'] == 'A4') &&
        ($data['couleur'] == 'Noir' || $data['couleur'] == 'Couleur' || $data['couleur'] == 'Cartonnee' || $data['couleur'] == 'Autant-collant')) {
        $impression->type_impression = "Impression";
        $impression->taille = $data['page'];
        $impression->couleur = $data['couleur'];
        
        if($impression->prix = $data['prix_marchande']!=0){
            $impression->prix = $data['prix_marchande'];
        }else{
            $impression->prix=$prixParDefaut[$data['page']][$data['couleur']];

        }

        $impression->save();
        $ventes_impression=new ventes_impression();
        $ventes_impression->qte_vendue=$data['qte_entrant'];
        $ventes_impression->impression_id=$impression->id;
        $ventes_impression->user_action=Auth::user()->name;
        $ventes_impression->date_creation=date('Y-m-d');
        $ventes_impression->save();
        toastr()->success('Impression effectue avec success');
        return back();
    } else {
        // Gérer une erreur ou afficher un message approprié
        toastr()->error('Combinaison invalide de page et de couleur');
        return back();
    }

        
}
public function scanner(Request $request){
    $data = $request->validate([
        'page' => 'required',
        'couleur' => 'required',
        'qte_entrant' => 'required',
        'prix_marchande'=>'required'
    ]);

    $prixParDefaut = [
        'A3' => [
            'Noir' => self::PRIX_A3_SCANNER,
            'Couleur' => self::PRIX_A3_SCANNER,
        ],
        'A4' => [
            'Noir' => self::PRIX_A4_SCANNER,
            'Couleur' => self::PRIX_A4_SCANNER,
        
        ]
        ,
        
    ];

    $impression = new impression();

    if (($data['page'] == 'A3' || $data['page'] == 'A4') &&
        ($data['couleur'] == 'Noir' || $data['couleur'] == 'Couleur' || $data['couleur'] == 'Cartonnee' || $data['couleur'] == 'Autant-collant')) {
        $impression->type_impression = "Scanner";
        $impression->taille = $data['page'];
        $impression->couleur = $data['couleur'];
        
      ;
        if($impression->prix = $data['prix_marchande']!=0 ){
            $impression->prix = $data['prix_marchande'];
        }else{
            $impression->prix=$prixParDefaut[$data['page']][$data['couleur']];

        }

        $impression->save();
        $ventes_impression=new ventes_impression();
        $ventes_impression->qte_vendue=$data['qte_entrant'];
        $ventes_impression->impression_id=$impression->id;
        $ventes_impression->user_action=Auth::user()->name;
        $ventes_impression->date_creation=date('Y-m-d');
        $ventes_impression->save();
        toastr()->success('Scanner effectue avec success');
        return back();
    } else {
        // Gérer une erreur ou afficher un message approprié
        toastr()->error('Combinaison invalide de page et de couleur');
        return back();
    }

        
}
public function rapport(){
    
}

}
/*  

 Demain 30/12/2023 continuer avec la nouvelle logique , regarder le rapport généré ! Et aussi faire le tour de 
 l'application pour voir d'éventuelle faille du système !
*/

