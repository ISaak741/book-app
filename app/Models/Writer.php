<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone'
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function mylist()
    {
        return $this->hasMany(Mylist::class)->where('user_type', 'writer');
    }
    public function plans()
    {
        return $this->hasMany(Plan::class, 'userId')->where('userType', 'writer');
    }
}
