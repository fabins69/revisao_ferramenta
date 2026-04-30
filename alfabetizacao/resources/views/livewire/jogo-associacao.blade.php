<div>
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-3xl shadow-xl">
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-blue-600">🧠 Jogo de Associação</h1>
        <p class="text-lg mt-2">Aluno: <span class="font-semibold">{{ $aluno->nome }}</span></p>
    </div>

    @if($feedback && str_contains($feedback, 'Parabéns'))
        <div class="text-center py-12">
            <div class="text-7xl mb-4">🎉</div>
            <h2 class="text-3xl font-bold">{{ $feedback }}</h2>
        </div>
    @else
        <div class="flex justify-center mb-8">
            <img src="{{ $itemAtual->imagem }}" alt="Imagem" 
                 class="w-96 h-64 object-cover rounded-2xl shadow-md">
        </div>

        <div class="text-center mb-6">
            <p class="text-xl font-medium">Qual palavra representa esta imagem?</p>
        </div>

        <div class="grid grid-cols-2 gap-4">
            @foreach($opcoesEmbaralhadas as $opcao)
                <button wire:click="selecionar('{{ $opcao }}')"
                        class="py-6 text-2xl font-semibold rounded-2xl transition-all
                               {{ $respostaSelecionada === $opcao 
                                   ? ($acertou ? 'bg-green-500 text-white' : 'bg-red-500 text-white') 
                                   : 'bg-blue-100 hover:bg-blue-200 text-blue-700' }}">
                    {{ $opcao }}
                </button>
            @endforeach
        </div>

        @if($feedback)
            <div class="mt-8 text-center text-2xl font-bold {{ $acertou ? 'text-green-500' : 'text-red-500' }}">
                {{ $feedback }}
            </div>
        @endif
    @endif
</div>
</div>
