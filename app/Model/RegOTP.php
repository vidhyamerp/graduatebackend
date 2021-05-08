<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RegOTP extends Model
{
    protected $table = 'reg_otp';
    protected $primaryKey = 'id';
    public $timestamps = FALSE;
}
