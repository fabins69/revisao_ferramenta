<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Aluno;
use App\Models\AtividadeItem;
use App\Models\Tentativa;

class JogoAssociacao extends Component
{
    public $aluno;
    public $atividade;
    public $itemAtual;
    public $opcoesEmbaralhadas = [];
    public $respostaSelecionada = null;
    public $feedback = null;
    public $acertou = false;
    public $indiceItem = 0;

    public function mount($alunoId)
    {
        $this->aluno = Aluno::findOrFail($alunoId);
        $this->carregarProximoItem();
    }

    public function carregarProximoItem()
    {
        $itens = AtividadeItem::whereHas('atividade', fn($q) => $q->where('nivel', $this->aluno->nivel))
            ->get();

        if ($this->indiceItem >= $itens->count()) {
            $this->feedback = "Parabéns! Você completou todas as atividades deste nível 🎉";
            return;
        }

        $this->itemAtual = $itens[$this->indiceItem];
        $this->opcoesEmbaralhadas = collect($this->itemAtual->opcoes)
            ->shuffle()
            ->values()
            ->all();
        $this->respostaSelecionada = null;
        $this->feedback = null;
    }

    public function selecionar($resposta)
    {
        $this->respostaSelecionada = $resposta;
        $acertou = $resposta === $this->itemAtual->palavra_correta;

        Tentativa::create([
            'aluno_id' => $this->aluno->id,
            'atividade_item_id' => $this->itemAtual->id,
            'resposta_dada' => $resposta,
            'acertou' => $acertou,
        ]);

        $this->feedback = $acertou ? '🎉 Acertou!' : '😕 Errou! A resposta certa era: ' . $this->itemAtual->palavra_correta;
        $this->acertou = $acertou;

        $this->js('setTimeout(() => { $wire.nextItem() }, 1800)');
    }

    public function nextItem()
    {
        $this->indiceItem++;
        $this->carregarProximoItem();
    }

    public function render()
    {
        return view('livewire.jogo-associacao');
    }
}