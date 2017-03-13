<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    public $fillable = ['page','login','password','description'];
}
