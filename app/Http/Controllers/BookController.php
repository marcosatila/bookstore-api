<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Resources\Book as BookResource;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    //Pesquisa por todos os books na tabela
    public function index()
    {
        $books = Book::all();
        return BookResource::collection($books);
        return view('index', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    //Se não encontrar estes dados na tabela, ambos serão criados juntos.
    public function store(BookRequest $request)
    {
        //SE NÃO ENCONTRAR O AUTOR NA TABELA, SERÁ CRIADO
        $authors = Author::firstOrNew(
            ['name_author' => request('name_author')]
        );
        $authors->name_author = request('name_author');
        $authors->save();
        $authors_id = $authors->id;

        //SE NÃO ENCONTRAR A EDITORA NA TABELA, SERÁ CRIADO
        $publisher = Publisher::firstOrNew(
            ['name_publisher' => request('name_publisher')]
        );
        $publisher->name_publisher = request('name_publisher');
        $publisher->save();
        $publisher_id = $publisher->id;

        //SE NÃO ENCONTRAR O BOOK NA TABELA, SERÁ CRIADO, VAI CAPTURAR O ID DO AUTOR E DA EDITORA
        $books = Book::FirstOrNew(
            ['name_product' => request('name_product')]
        );
        $books->name_product = request('name_product');
        $books->price = request('price');
        $books->pages = request('pages');
        $books->author_id = $authors_id;
        $books->publisher_id = $publisher_id;
        if ($books->save()) {
            return 'Produto cadastrado com sucesso!';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Book $book
     * @return BookResource
     */
    //Realiza a pesquisa pelo id do book
    public function show($id)
    {
        $books = Book::findOrFail($id);
        return new BookResource($books);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * //     * @param \App\Models\Book $book
     * @return string
     */
    //Realiza o update dos dados
    public function update(BookRequest $request, $id)
    {
        $authors = Author::findOrFail($id);
        $authors->name_author = $request->input('name_author');
        $authors->update();
        $author_id = $authors->id;


        $publishers = Publisher::findOrFail($id);
        $publishers->name_publisher = $request->input('name_publisher');
        $publishers->update();
        $publishers_id = $publishers->id;


        $books = Book::findOrFail($id);
        $books->name_product = $request->input('name_product');
        $books->price = $request->input('price');
        $books->pages = $request->input('pages');
        $books->author_id = $author_id;
        $books->publisher_id = $publishers_id;

        if ($books->update()) {
            return 'Dados atualizados com sucesso!';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Book $book
     * @return string
     */
    //Deleta os dados da tabela
    public function destroy($id)
    {
        $books = Book::findOrFail($id);
        if ($books->delete()) {
            return 'Dados removidos com sucesso!';
        }
    }

    //Filtra os dados pelo nome do produto
    public function search($name_product)
    {
        $books = Book::where('name_product', 'like', '%' . $name_product . '%')->get();
        return BookResource::collection($books);
    }


}
