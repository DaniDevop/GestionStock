<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandesController;
use App\Http\Controllers\facturesController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\impressionController;
use App\Http\Controllers\produitController;
use App\Http\Controllers\rapportController;
use App\Http\Controllers\userController;
use App\Http\Controllers\ScannerController;

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[userController::class,'LoginApplication'])->name('login_users');
Route::post('/login/users-authenticate',[userController::class,'doLogin'])->name('auth.login');
Route::get('reset_password/',[userController::class,'email_verification'])->name('email.verification');
Route::post('reset_password_users/',[userController::class,'verify_email_users'])->name('verify_email.changes');


Route::middleware(['auth.custom'])->group(function(){

    Route::get('/dashboard',[userController::class,'home'])->name('index');
    Route::get('deconnexion/',[userController::class,'logout'])->name('auth.logout');

    Route::get('/produit/Listes_produit',[produitController::class,'listeProduit'])->name('listes_produit');
    Route::get('/produit/ajouter_produit',[produitController::class,'addProduct'])->name('ajouter.product');
    Route::post('/produit/new_product_ajout',[produitController::class,'creationProduit'])->name('new_product');
    Route::get('/produit/upate_produit/{id}',[produitController::class,'UpdateProduit'])->name('update_product');
    Route::post('/produit/create_product',[produitController::class,'update_product'])->name('update.produit');
    Route::get('/produit/show_details_produit/{id}',[produitController::class,'details_produit'])->name('details_produit_vue');
    Route::post('/produit/effectif_stock',[produitController::class,'ajouter_product_stock'])->name('effectif_stock_ajouter');
    Route::post('/produit/ventes-simple-produit',[produitController::class,'ventes_simple'])->name('ventes_simple.stock');
    Route::post('/produit/return-ventes-produit',[produitController::class,'delete_ventes'])->name('return_ventes_simple.stock');

    // Fournisseur
    Route::get('/fournisseur/Listes_fournisseur',[FournisseurController::class,'listeFournisseur'])->name('listes_fournisseur');
    Route::get('/fournisseur/ajouter_fournisseurs',[FournisseurController::class,'Fournisseur'])->name('ajouter_fournisseur');
    Route::get('/fournisseur/fournisseurs/{id}',[FournisseurController::class,'fournisseur_updates'])->name('modifier_fournisseur');
    Route::get('/fournisseur/details_fournisseur/{id}',[FournisseurController::class,'show_details_fournisseur'])->name('show_details_fournisseur');
    Route::post('/fournisseur/create_fournisseur',[FournisseurController::class,'createFournisseur'])->name('fournisseur_create');
    Route::post('/fournisseur/update_fournisseur',[FournisseurController::class,'modification_fournisseur'])->name('modification_fournisseur');
    Route::get('/fournisseur/impression-fournisseur',[FournisseurController::class,'impression_liste_fournisseur'])->name('imprimer.fournisseur');
    Route::get('/fournisseur/delete_fournisseur/{id}',[FournisseurController::class,'delete_fournisseur'])->name('delete.fournisseur');

    // CATEGORIE
    Route::get('/categorie/Listes_categorie',[CategorieController::class,'listeCategorie'])->name('listes_categorie');
    Route::post('/categorie/create_categorie',[CategorieController::class,'create_categories'])->name('ajouter_categorie');
    Route::post('/categorie/create_ranger',[CategorieController::class,'create_new_ranger'])->name('ajouter_ranger');
    Route::get('/categorie/Listes_ranger_view',[CategorieController::class,'view_ranger_listes'])->name('listes.view_ranger_listes');
    Route::get('/rapport_application/view',[userController::class,'rapport_application'])->name("rapport.application");
    Route::post('/categorie/update_categorie',[CategorieController::class,'update_categorie'])->name('update.categorie');
    Route::get('/categorie/delete_categorie/{id}',[CategorieController::class,'delete_categorie'])->name("delete.categorie");
    Route::get('/categorie/details_categorie/{id}',[CategorieController::class,'details_categorie'])->name('details.categorie');
    Route::get('/categorie/details_ranger/{id}',[CategorieController::class,'details_ranger'])->name('details.ranger');
    Route::post('/categorie/update_ranger',[CategorieController::class,'update_ranger'])->name('update.ranger');
    Route::get('/categorie/delete_ranger/{id}',[CategorieController::class,'delete_ranger'])->name("delete.ranger");


    //VENTES
    Route::get('/factures/ventes_produits',[facturesController::class,'vente_product'])->name('produit_vente');
    Route::get('/factures/details_ventes/{id}',[facturesController::class,'show_details_vente'])->name('details.vente');
    Route::get('/factures/impression_details_ventes/{id}',[facturesController::class,'imprime_factures'])->name('impression.vente');
    Route::get('/factures/listes_factures_impression/',[facturesController::class,'imprimer_factures_listes'])->name('impression.listes_vue');
    Route::get('/factures/listes_factures/',[facturesController::class,'liste_facture_view'])->name('factures_vue');
    // Factures
    Route::post('/factures/add-product', [facturesController::class, 'addProductToFactures'])->name('addProduct.to.Factures');
Route::post('/factures/ventes_create', [facturesController::class, 'create_facture_ventes'])->name('createFactureVentes');
Route::get('/factures/delete-product/{id}', [facturesController::class, 'retire_product'])->name('delete.product.panier');
Route::get('/factures/delete-ventes/{id}', [facturesController::class, 'delete_ventes'])->name('delete.ventes.factures');
Route::get('/factures/delete-factures/{id}', [facturesController::class, 'delete_factures'])->name('delete.factures');

    // COMMANDES
    Route::get('/commandes/suivis_commandes',[CommandesController::class,'suivis_commandes'])->name('suivis_commandes.listes');
    Route::get('/commandes/Listes_commandes',[CommandesController::class,'listeCommandes'])->name('listes_commandes');
    Route::get('/commandes/valider_commandes/{id}',[CommandesController::class,'valider_commandes'])->name('commandes_valide');
    Route::get('/commandes/view-commandes/',[CommandesController::class,'view_commandes'])->name('commandes_produits_view');
    Route::post('/commandes/new_commandes_produits/',[CommandesController::class,'create_new_commandes'])->name('commandes_new_commandes_produits');
    Route::get('/commandes/view-commandes_update/{id}',[CommandesController::class,'details_commandes'])->name('details_commandes.view');
    Route::post('/commandes/update_commandes',[CommandesController::class,'update_commandes_forms'])->name('update_commandes');
    Route::get('/commandes/view-commandes_delete/{id}',[CommandesController::class,'delete_commandes'])->name('delete_commandes');



    //USER
    Route::get('/users/create-users',[userController::class,'create_user'])->name('register_users');
    Route::post('/users/users-connexion/',[userController::class,'register_user'])->name('create.register.users');
    Route::get('/users/create-update/{id}',[userController::class,'updateProfile'])->name('user.update.profile');
    Route::post('/users/users-update-profile/',[userController::class,'update_user_profile_info'])->name('update.information.client');
    Route::post('/users/users-update-password/',[userController::class,'update_password'])->name('update.information.password');
    Route::get('/users/rapport_date/',[userController::class,'rapport_application_details'])->name('rapport.date.application');
    Route::get('/users/listes_rapport/',[userController::class,'listes_rapport'])->name('listes_rapport.application');
    Route::get('/users/listes_rapport_creation/',[rapportController::class,'create_rapport'])->name('creation.rapport');
    Route::get('/users/delete_rapport/{id}',[rapportController::class,'delete_rapport'])->name('delete.rapport');


        // Impression_data
Route::post('/rapport-data',[impressionController::class,'rapport'])->name('rapport.date');
Route::post('/search-commandes',[impressionController::class,'bon_entree'])->name('entree.search');
Route::post('/search-fournisseur',[impressionController::class,'search_fournisseur'])->name('fournisseur.search');
Route::post('/impression/impression-data/',[ScannerController::class,'photocopies'])->name('simple_photocopies');
//Route::post('/impression/photocopie-data/',[ScannerController::class,'photocopie'])->name('simple_photocopie');
Route::post('/impression/plastification-data/',[ScannerController::class,'plastification'])->name('simple_plastification');
Route::post('/impression/impression_data_client/',[ScannerController::class,'impression'])->name('simple_ impression.data');
Route::post('/impression/impression_reliure_data_client/',[ScannerController::class,'reliure'])->name('simple_impression.reliure');
Route::post('/impression/scanner/',[ScannerController::class,'scanner'])->name('simple.scanner');

});
