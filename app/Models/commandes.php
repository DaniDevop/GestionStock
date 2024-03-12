<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class commandes extends Model
{
    use HasFactory;
        protected $fillable=[
            'produit_id',
            'fournisseur_id',
            'date_commandes',
            'qte_entrant',
            
        ];
       public function produit(): BelongsTo
       {
           return $this->belongsTo(\App\Models\produit::class);
       }
      
     
   
}
