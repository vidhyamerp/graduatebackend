<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Graduates extends Model
{
    protected $table = 'registration_details';
    protected $primaryKey = 'id';
    public $timestamps = FALSE;
}
