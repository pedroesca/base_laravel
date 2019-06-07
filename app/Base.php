<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    protected $guarded = 'id';
    protected $table = "base";
    protected $fillable = ['nombre'];
    // ale.nahu.crack();
}
