<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);


Route::prefix('/tarefas')->group(function () {

    // Listagem de tarefas
    Route::get('/', [\App\Http\Controllers\TarefasController::class, 'list'])->name('tarefas.list');

    // Tela de criação de tarefas
    Route::get('add', [\App\Http\Controllers\TarefasController::class, 'add'])->name('tarefas.add');
    // Ação de criação de tarefas
    Route::post('add', [\App\Http\Controllers\TarefasController::class, 'addAction']);

    // Tela de edição de tarefas
    Route::get('edit/{id}', [\App\Http\Controllers\TarefasController::class, 'edit'])->name('tarefas.edit');
    // Ação de edição(update) de tarefas
    Route::put('edit/{id}', [\App\Http\Controllers\TarefasController::class, 'editAction']);

    // Ação de deletar tarefas
    Route::get('delete/{id}', [\App\Http\Controllers\TarefasController::class, 'del'])->name('tarefas.del');

    // Marca tarefa como concluída
    Route::get('marcar/{id}', [\App\Http\Controllers\TarefasController::class, 'done'])->name('tarefas.done');

    // Pesquisa de tarefas
    Route::get('pesquisar', [\App\Http\Controllers\TarefasController::class, 'pesquisar'])->name('tarefas.pesquisar');
});

Route::fallback(function () {
    echo "ERRO 404";
});
