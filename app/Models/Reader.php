<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function mylist()
    {
        return $this->hasMany(Mylist::class, 'user_id')->where('user_type', 'reader');
    }

    public function plans()
    {
        return $this->hasMany(Plan::class, 'userId')->where('userType', 'reader');
    }
}
