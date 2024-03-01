<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    use HasFactory;

    protected $casts = ['fecha' => 'date'];

    protected $fillable = [
        'email',
        'sala_id',
        'fecha',
        'acomodo_id',
        'extras',
        'user_id',
    ];
}
