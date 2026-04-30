<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $fillable = ['nome', 'tipo', 'nivel'];

    public function itens()
    {
        return $this->hasMany(AtividadeItem::class);
    }
}