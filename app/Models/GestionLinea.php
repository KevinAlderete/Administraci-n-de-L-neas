<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;

class GestionLinea extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'observacion',
        'personal_id',
        'linea_id',
    ];

    public function personal(): HasOne
    {
        return $this->hasOne(Personal::class, 'id', 'personal_id');
    }

    public function linea(): HasOne
    {
        return $this->hasOne(Linea::class, 'id', 'linea_id');
    }

    public function toSearchableArray()
    {
        return [
            'personals.nombre' => '',
            'lineas.tipo' => '',
            'lineas.plan' => '',
            'lineas.linea' => '',
            'lineas.sede' => ''
        ];
    }
    
}
