<?php

namespace App\Http\Livewire;

use App\Models\produit;
use Livewire\Component;

class ChartFactures extends Component
{

    protected $chart=[];
    public $id = 0;

    public function impression(){
        
    }

    public function addProduit($idProduit){
        $produit=produit::findOrFail($idProduit)->get();
        $this->chart($produit);
    }
    
    public function render()
    {
        return view('livewire.chart-factures',$this->chart);
    }
}
