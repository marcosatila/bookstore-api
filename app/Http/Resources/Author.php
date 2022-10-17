<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class Author extends JsonResource
{

    public static $wrap = 'author';

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function toArray($request)
    {
//        return parent::toArray($request);

        return Book::collection($this->book);

//        return [
//            'authors' => [
//                'name_author' => $this->name_author,
//            ],
//        ];

    }
}
