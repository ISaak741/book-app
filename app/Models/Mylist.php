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
        'user_type',
    ];

    public function writer()
    {
        return $this->belongsTo(Writer::class)->where('user_type', 'writer');
    }

    public function reader()
    {
        return $this->belongsTo(Reader::class, 'user_id')->where('user_type', 'reader');
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
