<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\commandes;
use App\Models\rapport;
use App\Models\fournisseur;
use App\Models\produit;
use App\Models\back_product;
use App\Models\User;
use App\Models\Ventes;
use App\Models\ventes_impression;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    //



    // Fonctions de vue  d'enrégistrement d'utilisateur
    public function create_user(){

        return view("user.register");
    }

    /*
        Fonction de creation d'utilisateur
      */
    public function register_user(Request $request){
        $data=$request->validate([
            'name' => 'required|unique:Users,name',
            'prenom' => 'required',
            'email' => 'nullable|email|unique:users,email',
            'profile' => 'image|mimes:jpg,png,jpeg',
            'password' => 'required',
            'password_verification' => 'required',

        ]);
        if($request->password != $request->password_verification){
            return redirect()->back()->with('error','LES MOTS DE PASSE NE SONT PAS IDENTIQUES');

        }
        $newUser=new User();
        $file ="";
        $newUser->name=$data['name'];
        $newUser->prenom=$data['prenom'];
        $newUser->email=$data['email'] ?:'';
        $newUser->user_action=Auth::user()->name;
        $newUser->password= Hash::make($data['password']);
        $newUser->profile=$file;

        if($request->hasFile('profile')){
            $file = $request->file('profile')->store('users','public');
            $newUser->profile=$file;

        }

        $newUser->save();

        toastr()->success('Utilisateur ajouté avec succès !');
        return back();
    }
    /*
        Fonction de page de connexion
      */
    public function LoginApplication(){
       /* User::create([
            'name' => 'ADMIN',
            'prenom' => 'Daniel',
            'email' => 'daniel@gmail.com',
            'password' => Hash::make('Daniel'),
            'profile'=>''
        ]);*/
      return view('login');
    }
    /*
        Fonction de traitement de page de connexion
      */
    public function doLogin(LoginRequest $loginRequest){
        $credeantials=$loginRequest->validate([
            'name'=>'required',
            'password'=>'required',
        ]);
        if(Auth::attempt($credeantials)){
            $loginRequest->session()->regenerate();
            return redirect()->intended('/dashboard'); // Vous pouvez personnaliser l'URL de redirection par défaut ici
        }
        return back()->withErrors([
            'email'=>"Identifiant introuvable"
        ])->onlyInput('name');
      }

      /*
        Fonction pour retourner la vue de mise à jour de profile
      */
      public function updateProfile($id){
        $userUpdate=User::find($id);

        return view('user.profil',compact('userUpdate'));
      }

      /*
        Fonction de mise à jour de profile
      */
      public function update_user_profile_info(Request $request){
        $data=$request->validate([
            'name'=>'required',
            'prenom'=>'required',
            'email'=>'nullable',
            'profile' => 'image|mimes:jpg,png,jpeg',
            'id'=>'required',
        ]);

        $userUpdate=User::find($request->id);
        if(!$userUpdate){
            return redirect()->back()->with('error1','Erreur dans la requette');

        }


        $userUpdate->name=$data['name'];
        $userUpdate->prenom=$data['prenom'];
        $userUpdate->user_action=Auth::user()->name;

        $userUpdate->date_creation=date('Y-m-d');
        $userUpdate->email=$data['email']?:'';

        if($request->hasFile('profile')){
            $file = $request->file('profile')->store('users','public');
            $userUpdate->profile=$file;
        }

        $userUpdate->save();
        toastr()->info("Informations modifié avec succés");
        return back();


      }

      public function update_password(Request $request){
        $data=$request->validate([
            'ancien_password'=>'required',
            'newpassword' =>'required',
            'renewpassword'=>'required',
            'id'=>'required',
        ]);
        $userUpdate=User::find($request->id);
        if(!$userUpdate){
            toastr()->info('Aucune informations n\'est trouvé !');
            return back();
        }
         if(!Hash::check($request->ancien_password,$userUpdate->password)){
            toastr()->info('Votre ancien mots de passe est incorrect');
            return back();
         }
        if($request->newpassword !=$request->renewpassword){
            toastr()->warning('Mot de passe incorrect');
            return back();        }
        $userUpdate->password= Hash::make($data['newpassword']);
        $userUpdate->save();
        toastr()->info('Mots de passe mise à jour avec succès');
        return back();
    }
    public function email_verification(){

        return view('user.reset_password');
    }
    public function verify_email_users(Request $request){
        $data=$request->validate([
            'email' =>'required',
            'password' =>'required',
            'password2'=>'required',
        ]);
        $user = User::where('email', $data['email'])->first();
        if(!$user){
            return redirect()->back()->with('error','erroor');
        }
        if($data['password']==$data['password2']){
            $user->password=Hash::make($data['password']);
            $user->save();
            return redirect()->back()->with('password_reset','erroor');
        }
        return redirect()->back()->with('different','Mot de passe incoherent');


    }
    public function logout(){
        Auth::logout();

        return redirect()->route('auth.logout');
    }

    // Page d'acceuil
    public function home(){
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();
        $dateConnexion=Carbon::now();
            $numberCommande=commandes::count();
            $fournisseurNumber=fournisseur::count();
            $produitNumber=produit::count();
            $produitNumber=produit::count();

            $impressionSales = DB::table('impressions')
            ->select('type_impression', DB::raw('COUNT(type_impression) as sales_count'), 'prix', 'taille','couleur' )
            ->groupBy('type_impression', 'prix', 'taille','couleur')
            ->get();
        ;
        $produitAll=produit::all();
        $backProduitAll=back_product::OrderBy('id','DESC')->get();
        $backProduitCount=back_product::count();

        $ventes=Ventes::where('factures_id',null)->orderByDesc('id')->get();
        $impressionAll = DB::table('ventes_impressions')
        ->join('impressions', 'ventes_impressions.impression_id', '=', 'impressions.id')
        ->where('ventes_impressions.date_creation',date('Y-m-d'))
        ->select('ventes_impressions.*', 'impressions.type_impression', 'impressions.taille', 'impressions.couleur', 'impressions.prix')
        ->orderByDesc('id') // Add this line for descending order
    ->get();
        $impressionCount=ventes_impression::count();

            $commandesMonth = Commandes::whereBetween('date_creation', [$startDate, $endDate])->where('statut','Non-valider')
            ->get();
            $produitStock = produit::where('qteStock', '<=', DB::raw('seuil_alert'))->get();
            $produitStockNumber = produit::where('qteStock', '<=', DB::raw('seuil_alert'))->count();
            //$sommeProduit=DB::select('SELECT SUM((prix_vente-prix_achat)*qteStock) FROM produits');
            $dates=date('Y-m-d');
             $productDate=$this->getSumProduit($dates);
             $impressionDate=$this->getSumImpression($dates);
            return view('index',compact('impressionDate','productDate','backProduitCount','backProduitAll','impressionCount','impressionAll','ventes','produitAll','impressionSales','produitStockNumber','produitStock','dateConnexion','numberCommande','fournisseurNumber','produitNumber','commandesMonth'));;
    }



  // Renvoie le Rapport simple dans la date actuel
  public function rapport_application()
  {
      $date = now()->format('Y-m-d');

      $produit = produit::whereDate('date_creation', $date)->get();
      $produitCount = produit::whereDate('date_creation', $date)->count();

      $fournisseur = fournisseur::whereDate('date_creation', $date)->get();
      $fournisseurCount = fournisseur::whereDate('date_creation', $date)->count();

      $commandes = commandes::whereDate('date_creation', $date)->get();
      $commandesCount = commandes::whereDate('date_creation', $date)->count();

      $ventesAll = Ventes::select('produit_id','prix_marchande','date_creation', DB::raw('SUM(qte_vendue) as totalSales'))
          ->groupBy('produit_id','prix_marchande','date_creation')
          ->with('produit')
          ->whereDate('date_creation', $date)
          ->get();

      $stockAll = produit::where('qteStock', '>', 0)->sum('qteStock');
      $user = Auth::user();

      $sumImpression = $this->getSumImpression($date);
      $sumProduit = $this->getSumProduit($date);
      $product_backAll = back_product::count();

      $sumFactures = $this->getSumFactures($date);

      $sommeSortie = $this->sommes_sortie($date);
      $sommeEntrant = $this->somme_application($date);
      $commandeEntree = commandes::where('statut', 'Valider')->where('date_creation', $date)->count();
      $commandeAttente = commandes::where('statut', 'Non-valider')->where('date_creation', $date)->count();

      $sommeBenefice = DB::select('SELECT SUM((prix_vente-prix_achat)*qteStock) as somme_benefice FROM produits');


      $sommeBeneficeDayVentes = DB::select('
      SELECT SUM(ventes.prix_marchande * ventes.qte_vendue) AS somme_benefice

      FROM produits,ventes
       WHERE produits.id = ventes.produit_id AND
       DATE(ventes.created_at) = CURDATE()
      ');

      $sommeBeneficeDayImpressions = DB::select('
      SELECT SUM(impressions.prix * ventes_impressions.qte_vendue) AS somme_benefice
      FROM impressions,ventes_impressions
       WHERE impressions.id = ventes_impressions.impression_id AND
       DATE(ventes_impressions.created_at) = CURDATE()
    ');

      return view("user.rapport", compact(
          'sommeSortie', 'product_backAll', 'sommeBenefice', 'sommeEntrant',
          'commandeEntree', 'commandeAttente', 'sumFactures', 'sumProduit', 'sumImpression',
          'stockAll', 'ventesAll', 'commandes', 'commandesCount', 'fournisseur',
          'fournisseurCount', 'produit', 'produitCount', 'user', 'date','sommeBeneficeDayVentes','sommeBeneficeDayImpressions'
      ));
  }

  public function rapport_application_details(Request $request)
  {
      $data = $request->validate([
          'date' => 'required',
      ]);

      $date = $data['date'];
      $sommeSortie = $this->sommes_sortie($date);

      $produit = produit::whereDate('date_creation', $date)->get();
      $produitCount = produit::whereDate('date_creation', $date)->count();

      $fournisseur = fournisseur::whereDate('date_creation', $date)->get();
      $fournisseurCount = fournisseur::whereDate('date_creation', $date)->count();

      $commandes = commandes::whereDate('date_creation', $date)->get();
      $commandesCount = commandes::whereDate('date_creation', $date)->count();

      $ventesAll = Ventes::select('produit_id','prix_marchande', DB::raw('SUM(qte_vendue) as totalSales'))
          ->groupBy('produit_id','prix_marchande')
          ->with('produit')

          ->whereDate('date_creation', $date)
          ->get();

      $stockAll = produit::where('qteStock', '>', 0)->sum('qteStock');
      $user = Auth::user();
      $sommeBenefice=DB::select('SELECT SUM((prix_vente-prix_achat)*qteStock) as somme_benefice FROM produits');

      $sumImpression = $this->getSumImpression($date);
      $sumProduit = $this->getSumProduit($date);
      $product_backCount = back_product::count();
      $sommeEntrant = $this->somme_application($date);

      $sumFactures = $this->getSumFactures($date);
      $product_backAll = back_product::where('date_creation',$date)->get();
      $sumImpressionTotal = $this->getSumImpressionAll();
      $sumProduitTotal = $this->getSumProduitAll();
      $sumFacturesTotal = $this->getSumFacturesAll();
      $sommeSortie = $this->sommes_sortie($date);
      $sommeEntrant = $this->somme_application($date);

      $sommeBeneficeDayVentes = DB::select('
      SELECT SUM(ventes.prix_marchande * ventes.qte_vendue) AS somme_benefice
      FROM produits,ventes
       WHERE produits.id = ventes.produit_id AND
       DATE(ventes.created_at) =?
  ',[$date]);

  $sommeBeneficeDayImpressions = DB::select('
  SELECT SUM(impressions.prix * ventes_impressions.qte_vendue) AS somme_benefice
  FROM impressions,ventes_impressions
   WHERE impressions.id = ventes_impressions.impression_id AND
   DATE(ventes_impressions.created_at) = ?
',[$date]);
      return view("user.rapport_date", compact(
          'sumFacturesTotal','product_backAll', 'sumProduitTotal', 'sumImpressionTotal', 'sommeSortie',
          'sommeBenefice', 'sommeEntrant', 'product_backCount', 'date',
           'sumFactures', 'sumProduit', 'sumImpression', 'stockAll',
          'ventesAll',   'fournisseur', 'fournisseurCount',
          'produit', 'produitCount', 'user', 'date','sommeBeneficeDayVentes','sommeBeneficeDayImpressions'
      ));
  }

  private function getSumImpression($date=null)
  {
      return DB::select('SELECT SUM(qte_vendue * prix) AS sommes_impression
          FROM impressions
          JOIN ventes_impressions ON ventes_impressions.impression_id = impressions.id
          WHERE ventes_impressions.date_creation =?', [$date]);
  }

  private function getSumImpressionAll()
  {
      return DB::select('SELECT SUM(qte_vendue * prix) AS sommes_impression
          FROM impressions
          JOIN ventes_impressions ON ventes_impressions.impression_id = impressions.id
          ', );
  }

  private function getSumProduit($date=null)
  {
      return DB::select('SELECT SUM(qte_vendue * prix_marchande) AS sommes_produits
          FROM ventes
          JOIN produits ON produits.id = ventes.produit_id

          WHERE ventes.date_creation =? AND ventes.factures_id IS NULL', [$date]);
  }
  private function getSumProduitAll($date=null)
  {
      return DB::select('SELECT SUM(qte_vendue * prix_marchande) AS sommes_produits
          FROM ventes
          JOIN produits ON produits.id = ventes.produit_id

          WHERE   ventes.factures_id IS NULL');
  }

  private function getSumFactures($date=null)
  {
      return DB::select('SELECT SUM(qte_vendue * prix_marchande) AS sommes_factures, COUNT(*) as quantity_product
          FROM ventes, produits, factures
          WHERE (produits.id = ventes.produit_id)
          AND (factures.id = ventes.factures_id)
          AND ventes.date_creation =?',[$date]);
  }

  private function getSumFacturesAll()
  {
      return DB::select('SELECT SUM(qte_vendue * prix_marchande) AS sommes_factures, COUNT(*) as quantity_product
          FROM ventes, produits, factures
          WHERE (produits.id = ventes.produit_id)
          AND (factures.id = ventes.factures_id)
          ');
  }


    public function somme_application($date){
        $sumImpression=DB::select('SELECT SUM(qte_vendue *prix) AS sommes_impression
        FROM impressions
        Join ventes_impressions ON ventes_impressions.impression_id = impressions.id
        WHERE ventes_impressions.date_creation=?',[$date]);

    $sumProduit=DB::select('SELECT SUM(qte_vendue *prix_marchande) AS sommes_produits
    FROM ventes
    WHERE ventes.date_creation=?',[$date]);

    $sommeProduct=0;
    $sommeImpression=0;
    $sommeFactures=0;
    foreach($sumProduit as $sum){
        $sommeProduct=$sum->sommes_produits;
    }
    foreach($sumImpression as $sum){
        $sommeImpression=$sum->sommes_impression;
    }

    return $sommeProduct+$sommeImpression+$sommeFactures;

    }
    /*
        Fonction permettant de retourner la sommes sorties
             */
            public function sommes_sortie($date){
                $date=date('Y-m-d');
                    $sumCommandes=DB::select('SELECT SUM(commandes.qte_entrant*produits.prix_achat) AS sommes_sorties
                    FROM commandes
                    Join produits ON produits.id = commandes.produit_id
                    WHERE commandes.date_creation=?',[$date]);
                $sommesCommandes=0;
                foreach($sumCommandes as $somCmd){
                    $sommesCommandes= $somCmd->sommes_sorties;
                }
                return $sommesCommandes;

            }

    // Listes des rapports
    public function listes_rapport(){

        $rapportAll=rapport::orderByDesc('id')->get();

        return view('user.listes_rapport',compact('rapportAll'));
    }



    public function create_rapport_day(Request $request){
        $request->validate([
            'date' =>'required'
        ]);
        $rappor_find=rapport::whereDate("date_creation",$request->date)->first();
        if($rappor_find){
            toastr()->warning('Le Rapport de cette  date : $date à déjà été généré');
            return back();
        }
        $date=$request->date;
        $rapport=new rapport();
        $rapport->somme_entrant=$this->listes_rapports($date);
        $rapport->somme_sorties=$this->sommes_sortie($date) ?:0;
        $rapport->total_day=$this->listes_rapports($date);
        $rapport->details='';
        $rapport->user_action="";
        $rapport->date_creation=date('Y-m-d');
        $rapport->save();
        toastr()->info('Rapport crée avec success');
        return back();
    }
    public function listes_rapports($date){



        $sumImpression=DB::select('SELECT SUM(qte_vendue *prix) AS sommes_impression
        FROM impressions
        Join ventes_impressions ON ventes_impressions.impression_id = impressions.id
        WHERE ventes_impressions.date_creation=?',[$date]);

    $sumProduit=DB::select('SELECT SUM(qte_vendue *prix_marchande) AS sommes_produits
    FROM ventes
    Join produits ON produits.id = ventes.produit_id
    WHERE ventes.date_creation=? AND ventes.factures_id IS NULL',[$date]);

    $sumFactures=DB::select('SELECT SUM(qte_vendue *prix_marchande) AS sommes_produits,COUNT(*) as quantity_product
    FROM ventes,produits,factures
    WHERE
     (produits.id = ventes.produit_id)
    AND (factures.id = ventes.factures_id)
    AND ventes.date_creation=?',[$date]);
    $sommeProduct=0;
    $sommeImpression=0;
    $sommeFactures=0;
    foreach($sumProduit as $sum){
        $sommeProduct=$sum->sommes_produits;
    }
    foreach($sumImpression as $sum){
        $sommeImpression=$sum->sommes_impression;
    }
    foreach($sumFactures as $sum){
        $sommeFactures=$sum->sommes_produits;
    }
    return $sommeProduct+$sommeImpression+$sommeFactures;
    }

}
