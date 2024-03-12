<?php 

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class rapport_days extends Command{


    protected $signature = 'rapport:day';


    public function hundle(){
        return Command::SUCCESS;
    }

    public function rapport_days(){
        $sommeProduit=DB::select('SELECT SUM((prix_vente-prix_achat)*qteStock) FROM produits');
    }
}

?>