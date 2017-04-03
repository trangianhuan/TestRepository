<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $fillable = ['memberNo','name','email','registerDate','lastConnect'];
}
