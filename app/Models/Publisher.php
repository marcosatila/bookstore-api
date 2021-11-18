<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

//    protected $primaryKey = 'publisher_id';
    protected $fillable = [
        'id',
        'name_publisher'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function item()
    {
        return $this->hasMany(Item::class);
    }

    public function author()
    {
        return $this->hasMany(Author::class);
    }
}
