<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ticked extends Model
{
    //
    protected $fillable=['tickedNo','subject','statusNo','priority','assigneMemberNo','startDate','dueDate','descript','trackerNo','author'];
}
