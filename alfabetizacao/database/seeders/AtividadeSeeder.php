<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Atividade;
use App\Models\AtividadeItem;

class AtividadeSeeder extends Seeder
{
    public function run(): void
    {
        $atividade = Atividade::create([
            'nome' => 'Associação Imagem + Palavra - Nível 1',
            'tipo' => 'associacao_imagem',
            'nivel' => 1,
        ]);

        $itens = [
            [
                'imagem' => 'https://picsum.photos/id/1015/400/300', // cachorro
                'palavra_correta' => 'cachorro',
                'opcoes' => ['cachorro', 'gato', 'bola', 'casa']
            ],
            [
                'imagem' => 'https://picsum.photos/id/1005/400/300', // gato
                'palavra_correta' => 'gato',
                'opcoes' => ['gato', 'cachorro', 'pássaro', 'peixe']
            ],
            [
                'imagem' => 'https://picsum.photos/id/201/400/300', // bola
                'palavra_correta' => 'bola',
                'opcoes' => ['bola', 'casa', 'carro', 'árvore']
            ],
        ];

        foreach ($itens as $item) {
            $atividade->itens()->create($item);
        }
    }
}