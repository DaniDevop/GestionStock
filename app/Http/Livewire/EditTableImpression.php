<?php

namespace App\Http\Livewire;

use App\Models\impression;
use App\Models\ventes_impression;
use Livewire\Component;

class EditTableImpression extends Component
{
    public $impressionAll;
    public $editedRowId = false;
    public $editedRowData = [];
    public $message = "";

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->impressionAll = ventes_impression::join('impressions', 'ventes_impressions.impression_id', '=', 'impressions.id')
            ->where('ventes_impressions.date_creation', date('Y-m-d'))
            ->select('ventes_impressions.*', 'impressions.type_impression', 'impressions.taille', 'impressions.couleur', 'impressions.prix', 'impressions.id as idImpression')
            ->orderByDesc('id')
            ->get();
    }

    public function editRow($id,$idImpressions)
    {
        $this->editedRowId = true;
        $impression = Impression::find($idImpressions);
        $venteImpression = ventes_impression::find($id);

        $this->editedRowData = [
            'type_impression' => $impression->type_impression,
            'taille' => $impression->taille,
            'couleur' => $impression->couleur,
            'prix' => $impression->prix,
            'qte_vendue' => $venteImpression->qte_vendue,
            'idImpression'=>$impression->id,
            'idventes_Impressions'=>$venteImpression->id,
        ];
    }

    public function updateImpression()
    {
        $impression = Impression::find($this->editedRowData['idImpression']);
        $venteImpression = ventes_impression::find($this->editedRowData['idventes_Impressions']);

        $impression->update([
            'type_impression' => $this->editedRowData['type_impression'],
            'taille' => $this->editedRowData['taille'],
            'couleur' => $this->editedRowData['couleur'],
            'prix' => $this->editedRowData['prix'],
        ]);

        $venteImpression->update([
            'qte_vendue' => $this->editedRowData['qte_vendue'],
            'date_update'=>date('Y-m-d')
        ]);

        $this->editedRowId = false;
        $this->message = "Opérations réussies avec succès, Ligne modifié";
        $this->loadData();
    }

    public function render()
    {
        return view('livewire.edit-table-impression');
    }


}
