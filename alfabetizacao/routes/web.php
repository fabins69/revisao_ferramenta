<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::get('/jogo/{aluno}', function (App\Models\Aluno $aluno) {
    return view('jogo-teste', ['aluno' => $aluno]);
})->middleware('auth');


Route::get('/alunos', App\Livewire\Alunos::class)->middleware('auth')->name('alunos');