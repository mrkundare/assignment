<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    
    protected $fillable = [
        'pname',
        'pprice',
        'qty',
        'total',
        'user',      
    ];
}
