<?php

namespace App\Console\Commands;

use App\Models\rapport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class rappotApplication extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rapport:month';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    { 

        $rapport=new rapport();
        $rapport->somme_entrant=$this->sommes_entrant();
        $rapport->somme_entrant=$this->sommes_entrant();
        $rapport->somme_sorties=$this->sommes_sortie();
        $rapport->total_day=$this->sommes_sortie();
        $rapport->details='';
        $rapport->user_action="";
        $rapport->date_creation=date('Y-m-d');

        $rapport->save();
        return Command::SUCCESS;
    }

    public function sommes_entrant(){
        $month = date('m'); // Obtenez le mois actuel
        $year = date('Y');        
        $sumImpression=DB::select('SELECT SUM(qte_vendue *prix) AS sommes_impression
        FROM impressions
        Join ventes_impressions ON ventes_impressions.impression_id = impressions.id
        WHERE MONTH(ventes_impressions.date_creation)=? AND YEAR(ventes_impressions.date_creation)=?',[$month,$year]);
    
    $sumProduit=DB::select('SELECT SUM(qte_vendue *prix_marchande) AS sommes_produits
    FROM ventes
    Join produits ON produits.id = ventes.produit_id
    WHERE MONTH(ventes.date_creation)=? AND YEAR(ventes.date_creation)=? AND ventes.factures_id IS NULL',[$month,$year]);

    $sumFactures=DB::select('SELECT SUM(qte_vendue *prix_marchande) AS sommes_produits,COUNT(*) as quantity_product
    FROM ventes,produits,factures
    WHERE
     (produits.id = ventes.produit_id)
    AND (factures.id = ventes.factures_id)
    AND MONTH(ventes.date_creation)=? AND YEAR(ventes.date_creation)=?',[$month,$year]);
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

    public function sommes_sortie(){
        $month=date('m');
        $year=date('Y');

            $sumCommandes=DB::select('SELECT SUM(commandes.qte_entrant*produits.prix_achat) AS sommes_sorties
            FROM commandes
            Join produits ON produits.id = commandes.produit_id
            WHERE MONTH(commandes.date_creation)=? AND YEAR(commandes.date_creation)=?',[$month,$year]);
        $sommesCommandes=0;
        foreach($sumCommandes as $somCmd){
        $sommesCommandes= $somCmd->sommes_sorties;
        }
        return $sommesCommandes;

    }
}



