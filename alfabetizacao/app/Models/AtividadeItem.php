<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AtividadeItem extends Model
{
        protected $table = 'atividade_itens';
    protected $fillable = ['atividade_id', 'imagem', 'palavra_correta', 'opcoes'];

    protected $casts = [
        'opcoes' => 'array',
    ];

    public function atividade()
    {
        return $this->belongsTo(Atividade::class);
    }
}