<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bucket extends Model
{
    protected $fillable = [
        'list', 'roll', 'pic','totalcount','finalcount'
    ];

}
