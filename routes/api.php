<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Original route for reference:
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Rotas públicas para criar conta ou fazer login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

    Route::get('/books', [BookController::class, 'index']);
    Route::get('/books/{id}', [BookController::class, 'show']);
    Route::delete('/books/{id}', [BookController::class, 'destroy']);
    Route::post('/books', [BookController::class, 'store']);
    Route::patch('/books/{id}', [BookController::class, 'update']);

    Route::get('/publisher', [PublisherController::class, 'index']);
    Route::get('/authors', [AuthorController::class, 'index']);
    Route::get('/books/search/{name_product}', [BookController::class, 'search']);

    Route::get('/authors/{id}', [AuthorController::class, 'show']);
    Route::post('/authors', [AuthorController::class, 'store']);
    Route::patch('/authors/{id}', [AuthorController::class, 'update']);
    Route::delete('/authors/{id}', [AuthorController::class, 'destroy']);
    Route::get('/authors/search/{name_author}', [AuthorController::class, 'search']);

    Route::get('/publisher/{id}', [PublisherController::class, 'show']);
    Route::post('/publisher', [PublisherController::class, 'store']);
    Route::patch('/publisher/{id}', [PublisherController::class, 'update']);
    Route::delete('/publisher/{id}', [PublisherController::class, 'destroy']);
    Route::get('publisher/search/{name_publisher}', [PublisherController::class, 'search']);

//O CRUD só poderá ser acessado através do usuário autenticado
Route::group(['middleware' => ['auth:sanctum']], function () {

    //Rotas detalhadas dos livros
    // Route::get('/books', [BookController::class, 'index']);
    // Route::get('/books/{id}', [BookController::class, 'show']);
//    Route::post('/books', [BookController::class, 'store']);
    // Route::patch('/books/{id}', [BookController::class, 'update']);
    // Route::delete('/books/{id}', [BookController::class, 'destroy']);
    // Route::get('/books/search/{name_product}', [BookController::class, 'search']);

    //Rotas detalhadas do author
    // Route::get('/authors', [AuthorController::class, 'index']);
    // Route::get('/authors/{id}', [AuthorController::class, 'show']);
    // Route::post('/authors', [AuthorController::class, 'store']);
    // Route::patch('/authors/{id}', [AuthorController::class, 'update']);
    // Route::delete('/authors/{id}', [AuthorController::class, 'destroy']);
    // Route::get('/authors/search/{name_author}', [AuthorController::class, 'search']);

    //Rota detalhada da editora
    // Route::get('/publisher', [PublisherController::class, 'index']);
    // Route::get('/publisher/{id}', [PublisherController::class, 'show']);
    // Route::post('/publisher', [PublisherController::class, 'store']);
    // Route::patch('/publisher/{id}', [PublisherController::class, 'update']);
    // Route::delete('/publisher/{id}', [PublisherController::class, 'destroy']);
    // Route::get('publisher/search/{name_publisher}', [PublisherController::class, 'search']);


    Route::post('/logout', [AuthController::class, 'logout']);


    //Rotas encurtadas
    //    Route::apiResources([
    //        '/books' => BookController::class,
    //        '/authors' => AuthorController::class,
    //    ]);

}
);
