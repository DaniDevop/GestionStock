<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class produit extends Model
{
    use HasFactory;
        protected $fillable=[
            'designation',
            'prix_achat',
            'prix_vente',
            'image',
            'seuil_alert',
            'qteStock',
            'fournisseur_id',
            'categorie_id',
        ];
       public function fournisseur(): BelongsTo
    {
        return $this->belongsTo(fournisseur::class);
    }
    public function categorie(): BelongsTo
    {
        return $this->belongsTo(categorie::class);
    }
    public function commandes(): HasMany
    {
        return $this->hasMany(commandes::class);
    }
   
    public function ventes():HasMany{
        return $this->hasMany(Ventes::class);
       }
       public function back_product():HasMany{
         return $this->hasMany(back_product::class);
       }
      
}
