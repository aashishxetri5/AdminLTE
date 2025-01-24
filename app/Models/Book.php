<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $primaryKey = "book_id";

    protected $attributes = [
        "stock" => 0,
        "status" => false,
    ];

    protected $fillable = [
        "title",
        "description",
        "cover",
        "stock",
        "status",
        'created_at',
        'updated_at'
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_book', 'book_id', 'author_id');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genre', 'book_id', 'genre_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'book_id', 'book_id');
    }
}
