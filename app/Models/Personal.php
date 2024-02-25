<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Personal extends Model
{
    use HasFactory, Searchable;
    protected $fillable = [
        'nombre',
        'dni',
        'jerarquia',
    ];

    public function toSearchableArray()
    {
        return [
            'nombre' => $this->nombre,
            'dni' => $this->dni,
            'jerarquia' => $this->jerarquia,
        ];
    }
}
