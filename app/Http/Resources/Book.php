<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class Book extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
    //   return parent::toArray($request);


        // return [
        //         'books' => [
        //             'id' => (string)$this->id,
        //             'name_product' => $this->name_product,
        //             'pages' => $this->pages,
        //             'price' => $this->price,
        //             'author' => [
        //                 'author_id' => (string)$this->author_id,
        //            'name_author' => $this->author->name_author,
        //          'publisher' => [
        //              'publisher_id' => (string)$this->publisher_id,
        //             'name_publisher'=>$this->publisher->name_publisher,
        //          ],
        //             ],
        //         ],


        // ];


        return [

                'id' => (string)$this->id,
                'name_product' => $this->name_product,
                'pages' => $this->pages,
                'price' => $this->price,
                'author_id' => (string)$this->author_id,
                'name_author' => $this->author->name_author,
                'publisher_id' => (string)$this->publisher_id,
                'name_publisher'=>$this->publisher->name_publisher,

        ];
    }
}
