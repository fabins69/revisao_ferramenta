<div>
    <div class="max-w-4xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">👨‍🎓 Meus Alunos</h1>

    <!-- Formulário de cadastro / edição -->
    <div class="bg-white p-6 rounded-3xl shadow mb-8">
        <h2 class="text-xl font-semibold mb-4">
            {{ $alunoId ? 'Editar Aluno' : 'Cadastrar Novo Aluno' }}
        </h2>
        <form wire:submit="salvar">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium">Nome completo</label>
                    <input type="text" wire:model="nome" 
                           class="w-full px-4 py-3 rounded-2xl border focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium">Idade</label>
                    <input type="number" wire:model="idade" 
                           class="w-full px-4 py-3 rounded-2xl border focus:outline-none">
                </div>
            </div>
            <button type="submit" 
                    class="mt-6 px-8 py-4 bg-blue-600 text-white rounded-2xl font-semibold hover:bg-blue-700">
                {{ $alunoId ? 'Salvar Alterações' : 'Cadastrar Aluno' }}
            </button>
        </form>
    </div>

    <!-- Lista de alunos -->
    <div class="bg-white rounded-3xl shadow overflow-hidden">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="text-left p-6">Nome</th>
                    <th class="text-left p-6">Idade</th>
                    <th class="text-left p-6">Nível Atual</th>
                    <th class="p-6 text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alunos as $aluno)
                <tr class="border-t">
                    <td class="p-6">{{ $aluno->nome }}</td>
                    <td class="p-6">{{ $aluno->idade }} anos</td>
                    <td class="p-6">{{ $aluno->nivel }}</td>
                    <td class="p-6 text-center space-x-3">
                        <button wire:click="editar({{ $aluno->id }})" 
                                class="px-4 py-2 text-blue-600 hover:bg-blue-100 rounded-2xl">Editar</button>
                        <button wire:click="excluir({{ $aluno->id }})" 
                                class="px-4 py-2 text-red-600 hover:bg-red-100 rounded-2xl"
                                onclick="return confirm('Excluir este aluno?')">Excluir</button>
                        <a href="/jogo/{{ $aluno->id }}" 
                           class="px-6 py-2 bg-green-600 text-white rounded-2xl hover:bg-green-700 inline-block">
                            ▶️ Jogar
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
