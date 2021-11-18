<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Resources\Publisher as PublisherResource;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publisher = Publisher::all();
        return PublisherResource::collection($publisher);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $publisher = Publisher::create($request->all());
        // $publisher = Publisher::firstOrNew(
        //     ['book_publisher' => $request->('book_publisher')]);
        // $publisher->book_publisher = $request->('book_publisher');
        $publisher->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        $publisher = Publisher::findOrFail($publisher->id);
        return new PublisherResource($publisher);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publisher $publisher)
    {
        $publisher = Publisher::findOrFail($publisher->id);
        $publisher->book_publisher = $request->input('book_publisher');

        if($publisher->save()) {
            return new PublisherResource($publisher);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        $publisher = Publisher::findOrFail($publisher->id);
        if($publisher->delete()) {
            return 'Dados removidos com sucesso!';
        }
    }

    public function search($name_publisher)
    {
        $publisher = Publisher::where('name_publisher', 'LIKE', '%' .$name_publisher . '%')->get();
        return PublisherResource::collection($publisher);
    }
}
