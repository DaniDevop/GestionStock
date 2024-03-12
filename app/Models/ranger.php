<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ranger extends Model
{
    use HasFactory;
    protected $fillable=[
        'ranger_name',
        
    ];
  
    public function categorie(): HasMany
    {
        return $this->hasMany(categorie::class);
    }
}
