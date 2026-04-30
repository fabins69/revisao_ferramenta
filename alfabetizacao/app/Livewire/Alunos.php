<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Aluno;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class Alunos extends Component
{
    public $alunos;
    public $nome = '';
    public $idade = '';
    public $alunoId = null; // para edição

    public function mount()
    {
        $this->carregarAlunos();
    }

    public function carregarAlunos()
    {
        $this->alunos = Aluno::where('user_id', auth()->id())->get();
    }

    public function salvar()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'idade' => 'required|integer|min:3|max:12',
        ]);

        if ($this->alunoId) {
            // editar
            $aluno = Aluno::find($this->alunoId);
            $aluno->update([
                'nome' => $this->nome,
                'idade' => $this->idade,
            ]);
        } else {
            // criar novo
            Aluno::create([
                'user_id' => auth()->id(),
                'nome' => $this->nome,
                'idade' => $this->idade,
            ]);
        }

        $this->reset(['nome', 'idade', 'alunoId']);
        $this->carregarAlunos();
    }

    public function editar($id)
    {
        $aluno = Aluno::find($id);
        $this->nome = $aluno->nome;
        $this->idade = $aluno->idade;
        $this->alunoId = $id;
    }

    public function excluir($id)
    {
        Aluno::destroy($id);
        $this->carregarAlunos();
    }

    public function render()
    {
        return view('livewire.alunos');
    }
}