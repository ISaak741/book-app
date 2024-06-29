<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'planType',
        'planStartDate',
        'planEndDate',
        'userType',
        'userId',
    ];

    public function writer()
    {
        return $this->belongsTo(Writer::class, 'userId');
    }

    public function reader()
    {
        return $this->belongsTo(Reader::class, 'userId');
    }
}
