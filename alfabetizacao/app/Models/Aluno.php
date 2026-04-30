<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nome', 'idade', 'nivel'];

    public function professor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tentativas()
    {
        return $this->hasMany(Tentativa::class);
    }
}