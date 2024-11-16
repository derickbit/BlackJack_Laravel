<?php
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PartidaController;
use App\Http\Controllers\DenunciaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/ola', function () {
//     echo "<h2>ola mundo</h2>";
// });

Route::get('/ola', [HomeController::class, 'index']);

//READ
Route::get('/produtos', [ProdutoController::class, 'index'])->name('index');
Route::get('/produto/{id}', [ProdutoController::class,'show'])->name('show');

//create
Route::get('/produto',[ProdutoController::class,'create'])->name('criar');
Route::post('/produto',[ProdutoController::class,'store']);

//update
Route::get('/produto/{id}/edit',[ProdutoController::class,'edit'])->name('edit');
Route::post('/produto/{id}/edit',[ProdutoController::class,'update'])->name('update');

//delete
Route::get('/produto/{id}/delete',[ProdutoController::class,'delete'])->name('delete');
Route::post('/produto/{id}/remove',[ProdutoController::class,'remove'])->name('remove');


//PARTIDAS
//READ
Route::get('/partidas', [PartidaController::class, 'index'])->name('indexpartidas');
Route::get('/partida/{codpartida}', [PartidaController::class,'show'])->name('showpartidas');

//create
Route::get('/partida',[PartidaController::class,'create'])->name('criarpartidas');
Route::post('/partida',[PartidaController::class,'store']);

//update
Route::get('/partida/{codpartida}/edit',[PartidaController::class,'edit'])->name('editpartidas');
Route::post('/partida/{codpartida}/edit',[PartidaController::class,'update'])->name('updatepartidas');

//delete
Route::get('/partida/{codpartida}/delete',[PartidaController::class,'delete'])->name('deletepartidas');
Route::post('/partida/{codpartida}/remove',[PartidaController::class,'remove'])->name('removepartidas');


//DENUNCIAS
//READ
Route::get('/denuncias', [DenunciaController::class, 'index'])->name('denuncia.index');
Route::get('/denuncia/{id}', [DenunciaController::class, 'show'])->name('denuncia.show');

//CREATE
Route::get('/denuncia', [DenunciaController::class, 'create'])->name('denuncia.create');
Route::post('/denuncia', [DenunciaController::class, 'store'])->name('denuncia.store');

//UPDATE
Route::get('/denuncia/{id}/edit', [DenunciaController::class, 'edit'])->name('denuncia.edit');
Route::post('/denuncia/{id}/edit', [DenunciaController::class, 'update'])->name('denuncia.update');

//DELETE
Route::get('/denuncia/{id}/delete', [DenunciaController::class, 'delete'])->name('denuncia.delete');
Route::post('/denuncia/{id}/remove', [DenunciaController::class, 'remove'])->name('denuncia.remove');
