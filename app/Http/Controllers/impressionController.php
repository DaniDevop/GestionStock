<?php

namespace App\Http\Controllers;

use App\Models\commandes;
use App\Models\Entree;
use App\Models\fournisseur;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class impressionController extends Controller
{
    //

    public function impression_liste_fournisseur(){
        
        $fournisseurs = fournisseur::orderBy("id", "DESC")->get();
        $data['fournisseurs'] = $fournisseurs;
    
        $pdf = PDF::loadView('fournisseur.listes_pdf_fournisseur', $data);
        $pdf->setPaper('A4', 'portrait');
        
        return $pdf->stream();
    }

    public function rapport(Request $request){
        $data=$request->validate([
            'date_rapport'=>'required',
            'user_action'=>'required',
        ]);
        $dateRapport = Carbon::parse($data['date_rapport'])->toDateString();


        //
    $commandesValiderNumber = commandes::whereDate('date_commandes', $dateRapport)->where('statut', 'Valider')->count();
$commandesCreateNumber = commandes::whereDate('created_at', $dateRapport)->count();
$commandesNonValiderNumber = commandes::whereDate('date_commandes', $dateRapport)->where('statut', 'Non-valider')->count();

        $date_now=now();
        $pdf_data['date_now']=$date_now;
        $pdf_data['dateRapport']=$dateRapport;
        $pdf_data['commandesValiderNumber']=($commandesValiderNumber)??null;
        $pdf_data['commandesCreateNumber']=($commandesCreateNumber)??null;
        $pdf_data['commandesNonValiderNumber']=($commandesNonValiderNumber)??null;

        $pdf = PDF::loadView('rapport.rapport',$pdf_data);
        $pdf->setPaper('A4', 'portrait');
        
        return $pdf->stream();
    }
    
    public function search_fournisseur(Request $request){
        $data = $request->validate([
            'name' => 'required',
        ]);
    
        $fournisseur = Fournisseur::where('nom', 'LIKE', '%' . $data['name'] . '%')
            ->orWhere('prenom', 'LIKE', '%' . $data['name'] . '%')
            ->orWhere('tel', 'LIKE', '%' . $data['name'] . '%')
            ->first();
    
        if (!$fournisseur) {
            return redirect()->back()->with('failed', 'Aucun fournisseur trouvé.');
        }
         //dd($fournisseur);
        return redirect()->back()->with(compact('fournisseur'));
    }
    
}
