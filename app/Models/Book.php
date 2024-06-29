<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'genre',
        'language',
        'description',
        'file',
        'picture',
        'writer_id'
    ];
    public function writer()
    {
        return $this->belongsTo(Writer::class);
    }

    public function mylist()
    {
        return $this->hasMany(Mylist::class);
    }
}
