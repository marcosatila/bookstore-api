<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

//    protected $primaryKey = 'publisher_id';
    protected $fillable = [

        'name_publisher'
    ];

    protected $hidden = [
        'publisher_id',
        'created_at',
        'updated_at'
    ];

    public function book()
    {
        return $this->hasMany(Book::class);
    }

    public function author()
    {
        return $this->hasMany(Author::class);
    }
}
