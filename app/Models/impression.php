<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class impression extends Model
{
    use HasFactory;
  protected  $fillable=[
    'type_impression',
    'prix',
    'couleur',
    'taille',
    'qte_entrant',
    'user_action'
  ];
}
