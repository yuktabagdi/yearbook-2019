<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $fillable = [
		'rollno','q1','q2','q3','q4','q5'
	];
}
