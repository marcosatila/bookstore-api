<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Author;
use App\Models\Item;
use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Resources\Item as ItemResource;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    //Pesquisa por todos os items na tabela
    public function index()
    {
        $books = Item::all();
        return ItemResource::collection($books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    //Se não encontrar estes dados na tabela, ambos serão criados juntos.
    public function store(ItemRequest $request)
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

        //SE NÃO ENCONTRAR O ITEM NA TABELA, SERÁ CRIADO, VAI CAPTURAR O ID DO AUTOR E DA EDITORA
        $books = Item::FirstOrNew(
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
     * @param \App\Models\Item $item
     * @return ItemResource
     */
    //Realiza a pesquisa pelo id do item
    public function show($id)
    {
        $books = Item::findOrFail($id);
        return new ItemResource($books);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * //     * @param \App\Models\Item $item
     * @return string
     */
    //Realiza o update dos dados
    public function update(ItemRequest $request, $id)
    {
        $books = Item::findOrFail($id);
        $books->name_product = $request->input('name_product');
        $books->price = $request->input('price');
        $books->pages = $request->input('pages');

        if ($books->save()) {
            return 'Dados atualizados com sucesso!';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Item $item
     * @return string
     */
    //Deleta os dados da tabela
    public function destroy($id)
    {
        $books = Item::findOrFail($id);
        if ($books->delete()) {
            return 'Dados removidos com sucesso!';
        }
    }

    //Filtra os dados pelo nome do produto
    public function search($name_product)
    {
        $books = Item::where('name_product', 'like', '%' . $name_product . '%')->get();
        return ItemResource::collection($books);
    }


}
