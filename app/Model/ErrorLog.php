<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs'; 
    protected $fillable = ['id', 'message'];
    public $timestamps = false;
}
