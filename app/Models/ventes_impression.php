<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventes_impression extends Model
{
    use HasFactory;

    protected  $fillable=[
        'qte_vendue',
        'date_update'
      ];
}
