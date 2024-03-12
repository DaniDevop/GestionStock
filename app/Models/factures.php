<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class factures extends Model
{
    use HasFactory;
    protected $fillable=[
        'somme_entrant',
        'matricule',
        'code_qr',
        'user_action',
        'date_vente'
       ];

       public function ventes ():HasMany{

       return $this->hasMany(Ventes::class);
       }
      
}
