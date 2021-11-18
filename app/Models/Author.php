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
        'created_at',
        'updated_at',
    ];

    public function item()
    {
       return $this->hasMany(Item::class);
    }

    public function publisher()
    {
        return $this->hasMany(Publisher::class);
    }
}