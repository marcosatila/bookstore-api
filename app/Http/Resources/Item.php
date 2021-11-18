<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Item extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return parent::toArray($request);

        return [
                'book_id' => (string)$this->id,
                'name_product' => $this->name_product,
                'pages' => $this->pages,
                'price' => $this->price,
                // 'author' => [
                    // 'author_id' => (string)$this->author_id,
                    'name_author' => $this->author->name_author,
                // ],
                // 'publisher' => [
                //     'publisher_id' => (string)$this->publisher_id,
                    'name_publisher'=>$this->publisher->name_publisher,
                // ],

        ];


    }
}
