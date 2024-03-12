<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class fournisseur extends Model
{
    use HasFactory;
    protected $charset = 'utf8mb4';

    protected $fillable=[
        'nom',
        'prenom',
        'email',
        'profile',
        'adresse',
        'tel',

       ];
       public function produit(): HasMany
    {
        return $this->hasMany(produit ::class);
    }
   
}
