<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tentativa extends Model
{
    protected $fillable = ['aluno_id', 'atividade_item_id', 'resposta_dada', 'acertou'];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function item()
    {
        return $this->belongsTo(AtividadeItem::class, 'atividade_item_id');
    }
}