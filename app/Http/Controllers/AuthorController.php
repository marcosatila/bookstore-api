<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Resources\Author as AuthorResource;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Pesquisa por todos os autores na tabela
    public function index()
    {
        $authors = Author::all();
        return AuthorResource::collection($authors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Cria um novo author na tabela.
    public function store(AuthorRequest $request)
    {
        $authors = new Author;
        $authors->name_author = $request->input('name_author');

        if ($authors->save()){
            return new AuthorResource($authors);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    //Realiza a pesquisa pelo id do autor
    public function show($id)
    {
        $authors = Author::findOrFail($id);
        return new AuthorResource($authors);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * * @param int $id
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    //Realiza o update dos dados
    public function update(AuthorRequest $request, $id)
    {
        $authors = Author::findOrFail($id);
        $authors->name_author = $request->input('name_author');
        if ($authors->save()){
            return new AuthorResource($authors);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    //Deleta os dados da tabela
    public function destroy($id)
    {
        $authors = Author::findOrFail($id);
        if ($authors->save()){
            return 'Dados removidos com sucesso!';
        }
    }

    //Filtra os dados pelo nome do author
    public function search($name_author)
    {
        $authors = Author::where('name_author', 'like', '%' .$name_author. '%')->get();
        return AuthorResource::collection($authors);
    }
}
