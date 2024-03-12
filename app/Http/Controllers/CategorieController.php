<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\ranger;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{
    //
    public function listeCategorie(){
        $categorie = categorie::orderBy("id","DESC")->get();
        $categorieNumber = categorie::count();
        $rangerAll=ranger::all();
        return view("categorie.categorie",compact('rangerAll','categorie','categorieNumber'));
    }
    public function create_categories(Request $request){
        $data=$request->validate([
            'categorie'=>'required',
            'ranger_id'=>'nullable'
        ]);
        
        $cat=new categorie();
        $cat->categorie=$request->categorie;
        $cat->ranger_id=$request->ranger_id !=null ?(int)$request->ranger_id : null;
        $cat->user_action=Auth::user()->name;
        $cat->date_creation=date('Y-m-d');
        $cat->save();
        if(!$cat){
            toastr()->error('Une Erreur est survenue appelé votre fournisseur !');
            return back();

        }
        toastr()->success('Catégorie ajoutée avec success!');
        return back();
    }
    public function create_new_ranger(Request $request){
        $data=$request->validate([
            'ranger_name'=>'required'
        ]);
         
        $rangerData=new ranger();
        $rangerData->ranger_name=$request->ranger_name;
        $rangerData->user_action=Auth::user()->name;
        $rangerData->date_creation=date('Y-m-d');
        $rangerData->save();
        toastr()->success('Ranger ajouté avec success!');
        return back();
    }
    public function view_ranger_listes(){
        $ranger=ranger::orderBy('id','DESC')->get();
        $rangerNumber=ranger::count();
        return view('ranger.ranger_view',compact('ranger','rangerNumber'));
    }

    public function details_categorie($id){
        $categorie=categorie::find($id);
        if(!$categorie){
           toastr()->error('La catégorie introuvable ou un problème dans l\'application');
        }
       
        $rangerAll=ranger::all();
        return view("categorie.categorie_update",compact('rangerAll','categorie'));
    }
    public function details_ranger($id){
        $ranger=ranger::find($id);
        if(!$ranger){
           toastr()->error('La Ranger est introuvable ou un problème dans l\'application');
        }
       
        return view("categorie.ranger_update",compact('ranger'));
    }

    public function update_categorie(Request $request){
        $data=$request->validate([
            'categorie'=>'required',
            'ranger_id'=>'nullable',
            'id'=>'required'
        ]);
        //$categorieTest=categorie::where('')
        $categorie=categorie::find($data['id']);
        
        $categorie->categorie=$data['categorie'];
        $categorie->ranger_id=$request->ranger_id !=null ?(int)$request->ranger_id : null;
        $categorie->date_update=date('Y-m-d');
        $categorie->user_action=Auth::user()->name;
        $categorie->update();
        toastr()->success('Categorie Modifier  avec success!');
        return back();
    }
    public function delete_categorie($id){
        $categorie=categorie::findOrFail($id);
        $categorie->delete();
        toastr()->info('Categorie Supprimer  avec success!');
        return back();
    }

    public function update_ranger(Request $request){
        $data=$request->validate([
              'ranger_name'=>'required',
              'id'=>'required',
        ]);
        $ranger=ranger::find($data['id']);
        if(!$ranger){
            toastr()->error('Ranger introuvable!');
            return back();
        }
        $ranger->ranger_name=$data['ranger_name'];
        $ranger->date_update=date('Y-m-d');
        $ranger->update();
        toastr()->info('Ranger Modifié avec succès !!');
        return back();
    }
    public function delete_ranger($id){
        $ranger=ranger::findOrFail($id);
        $ranger->delete();
        toastr()->info('Ranger Supprimer  avec success!');
        return back();
    }


}
