<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ventes extends Model
{
    use HasFactory;
    protected $fillable=[
        'produit_id',
        'factures_id',
    ];

    public function produit():BelongsTo{
        return $this->belongsTo(produit::class);
    }
    public function factures():BelongsTo{
        return $this->belongsTo(factures::class);

    }
}
