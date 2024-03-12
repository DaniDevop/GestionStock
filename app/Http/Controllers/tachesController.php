<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tachesController extends Controller
{
    //

    public function liste_taches(){
        $tachesAll=Tache::where('user_id',Auth::user()->id);
        return view('taches.taches_listes',compact($tachesAll));
    }
}
