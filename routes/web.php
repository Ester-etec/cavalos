<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CavaloController;
use App\Http\Controllers\FuncionarioController;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/',[CavaloController::class,'showHome'])->name('home');

//Grupo de Cavalo
Route::get('/cadastro-cavalo',[CavaloController::class,'showFormularioCadastro'])->name('show-formulario-cadastro-cavalo');
Route::post('/cadastro-cavalo',[CavaloController::class,'cadCavalo'])->name('envia-banco-cavalo');
Route::get('/gerenciar-cavalo',[CavaloController::class,'gerenciarCavalo'])->name('gerenciar-cavalo');
Route::get('/alterar-cavalo/{id}',[CavaloController::class,'mostrarGerenciarCavaloId'])->name('mostrar-cavalo');
Route::put('/alterar-cavalo/{id}',[CavaloController::class,'alterarCavaloBanco'])->name('alterar-cavalo');
Route::delete('/apaga-cavalo/{id}',[CavaloController::class,'destroy'])->name('apaga-cavalo');


// //Grupo de Ponei
// Route::get('/cadastro-ponei',[PoneiController::class,'showFormularioCadastro'])->name('show-formulario-cadastro-ponei');
// Route::post('/cadastro-ponei',[PoneiController::class,'cadPonei'])->name('envia-banco-ponei');
// Route::get('/gerenciar-ponei',[PoneiController::class,'gerenciarPonei'])->name('gerenciar-ponei');
// Route::get('/alterar-ponei/{id}',[PoneiController::class,'mostrarGerenciarPoneiId'])->name('mostrar-ponei');
// Route::put('/alterar-ponei/{id}',[PoneiController::class,'alterarPoneiBanco'])->name('alterar-ponei');
// Route::delete('/apaga-ponei/{id}',[PoneiController::class,'destroy'])->name('apaga-ponei');


//Grupo de Funcionário
Route::get('/cadastro-funcionario',[FuncionarioController::class,'showFormularioCadastro'])->name('show-formulario-cadastro-funcionario');
Route::post('/cadastro-funcionario',[FuncionarioController::class,'cadFuncionario'])->name('envia-banco-funcionario');
Route::get('/gerenciar-funcionario',[FuncionarioController::class,'gerenciarFuncionario'])->name('gerenciar-funcionario');

});


require __DIR__.'/auth.php';
