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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación con la tabla Sala
    public function sala()
    {
        return $this->belongsTo(Sala::class, 'sala_id');
    }

    public function estados()
    {
        return $this->belongsTo(Estados::class, 'estado_id');
    }
}
