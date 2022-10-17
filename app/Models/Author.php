<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [

        'name_author'
    ];

    protected $hidden = [
        'author_id',
        'created_at',
        'updated_at',
    ];

    public function book()
    {
       return $this->hasMany(Book::class);
    }

    public function publisher()
    {
        return $this->hasMany(Publisher::class);
    }
}
