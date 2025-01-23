<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /** @use HasFactory<\Database\Factories\AuthorFactory> */
    use HasFactory;

    protected $primaryKey = "author_id";

    protected $fillable = [
        'fullname',
        'email',
        'created_at',
        'updated_at'
    ];

    public function books() {
        return $this->belongsToMany(Book::class, 'author_book', 'author_id', 'book_id');
    }
}
