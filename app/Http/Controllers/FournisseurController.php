<?php

namespace App\Http\Controllers;

use App\Models\fournisseur;
use App\Models\role;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Stub\ReturnArgument;

class FournisseurController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth.custom');

    }   
    public function listeFournisseur(){
        $fournisseur = fournisseur::orderBy("id","DESC")->get();
        return view("fournisseur.fournisseur",compact('fournisseur'));
    }
    public function Fournisseur(){
        return view("fournisseur.ajouter");
    }
    public function impression_liste_fournisseur(){
        
        $fournisseurs = Fournisseur::orderBy("id", "DESC")->get();
        $data['fournisseurs'] = $fournisseurs;
    
        $pdf = PDF::loadView('fournisseur.listes_pdf_fournisseur', $data);
        $pdf->setPaper('A4', 'portrait');
        
        return $pdf->stream();
    }
    public function show_details_fournisseur($id){
        $fournisseur = fournisseur::find($id);

        
        
        
        return view("fournisseur.details_fournisseur", compact('fournisseur'));
    }
    public function createFournisseur(Request $request){
        
        $data=$request->validate([
             'nom'=>'required|unique:fournisseurs,nom',
             'prenom'=>'required',
             'email'=>'nullable|unique:fournisseurs,email',
             'tel'=>'required|unique:fournisseurs,tel',
             'profile' => 'nullable|image|mimes:jpg,png,jpeg',
             'adresse'=>'nullable',
        ]);
        $imagePath='images/fournisseur.jpg';
        $fournisseur=new fournisseur();
        $fournisseur->nom=$request->nom;
        $fournisseur->prenom=$request->prenom;
        $fournisseur->email=$request->email;
        $fournisseur->tel=$request->tel ;
        $fournisseur->adresse=$request->adresse;
        $fournisseur->user_action=Auth::user()->name;

        if($request->hasFile('profile')){
            $imagePath=$request->file('profile')->store('images','public');
           
        }
        $fournisseur->profile= $imagePath;
        $fournisseur->date_creation=date('Y-m-d');
        $fournisseur->save();
        toastr()->success('Fournisseur ajoutée avec success!');
        return back();

                    

    }
    public function fournisseur_updates($id){
        $fournisseur = fournisseur::find($id);
     return view("fournisseur.modifier",compact('fournisseur'));
    }
    public function modification_fournisseur(Request $request){

        $data=$request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>'nullable',
            'profile' => 'image|mimes:jpg,png,jpeg',
            'id'=>'required',
            'tel'=>'required'
        ]);
       
        $id= $request->id;
        $updateFournisseur=fournisseur::find($id);
        $updateFournisseur->nom=$request->nom;
            $updateFournisseur->prenom=$request->prenom;
            $updateFournisseur->email=$request->email;
            $updateFournisseur->adresse=$request->adresse;
            $updateFournisseur->tel=$request->tel;
            $updateFournisseur->date_update=date('Y-m-d');
        if($request->hasFile('profile')){
            $imagePath=$request->file('profile')->store('images','public');
            $updateFournisseur->profile=$imagePath;
            
                }
            $updateFournisseur->update();
            toastr()->success('Fournisseur Modifié avec success ✨!');
            return back();
        
       
    }
    public function delete_fournisseur($id){
        $fournisseur=fournisseur::find($id);
        if(!$fournisseur){
            toastr()->error('Information ou Fournisseur introuvale ✨!');
            return back();
                }
                $fournisseur->delete();
                toastr()->success('Fournisseur supprimer avec succès✨!');
                return back();
                }
}
