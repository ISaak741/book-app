<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mylist extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id',
        'user_id',
        'writer_id',
        'user_type',
    ];

    public function writer()
    {
        return $this->belongsTo(Writer::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
