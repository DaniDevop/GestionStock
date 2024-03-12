<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class categorie extends Model
{
    use HasFactory;
    protected $fillable=[
        'categorie',
        'ranger_id'
       ];
   
    public function produit(): HasMany
    {
        return $this->hasMany(produit::class);
    }
    public function commandes(): HasMany
    {
        return $this->hasMany(commandes::class);
    }
    public function ranger(): BelongsTo
    {
        return $this->belongsTo(ranger::class);
    }
}
