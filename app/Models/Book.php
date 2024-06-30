<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id',
        'language_id',
        'description',
        'file',
        'picture',
        'writer_id'
    ];
    public function writer()
    {
        return $this->belongsTo(Writer::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function mylist()
    {
        return $this->hasMany(Mylist::class);
    }
}
