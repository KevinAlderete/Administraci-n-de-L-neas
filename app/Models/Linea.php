<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Linea extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'linea',
        'tipo',
        'plan',
        'precio',
        'sim',
        'sede',
        'estado',
    ];

    public function toSearchableArray()
    {
        return [
            'linea' => $this->linea,
            'tipo' => $this->tipo,
            'plan' => $this->plan,
            'sim' => $this->sim,
            'sede' => $this->sede,
            'estado' => $this->estado,
        ];
    }
}
