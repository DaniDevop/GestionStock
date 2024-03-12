<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class back_product extends Model
{
    use HasFactory;

    public function produit():BelongsTo{
        return $this->belongsTo(produit::class);
    }
}
