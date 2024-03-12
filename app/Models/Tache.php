<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tache extends Model
{
    use HasFactory;
    protected $fillable = [
        'taches_name',
        'date_echeances',
        'status',
        'user_id',
    ];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
       }
}
