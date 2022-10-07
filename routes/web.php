<?php

use App\Http\Controllers\BookController;
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

/** caminho '/' é tido como o caminho inicial,
* depois chamamos um controller, chamado de "BookController"
* e depois colocamos um @ para indicar qual método queremos que execute dentro desse controller
*/

/*
* o método novo de adicionar uma rota, segue o padrão de:
* Route + (::) + requisicao + 'diretório' + array (controller::class, método)
* e como boa prática podemos instanciar um helper chamado 'name' - para que caso haja uma alteracao no nome da rota, não haverá um impacto no código
*/
Route::resource('/books', BookController::class); 

