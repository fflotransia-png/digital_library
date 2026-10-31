<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Loan;

class Book extends Model
{
    protected $fillable = [
        'title',
        'isbn',
        'category',
        'stok',
        'publication_year',
        'author_id',
        'publisher_id'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
