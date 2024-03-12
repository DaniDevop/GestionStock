<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class role extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_name',
        
        
    ];
    public function role_user():HasMany{
        return $this->hasMany(role_user::class);
       }
}
