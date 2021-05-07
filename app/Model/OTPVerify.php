<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OTPVerify extends Model
{
    protected $table = 'otp_verfication';
    protected $primaryKey = 'id';
    public $timestamps = FALSE;
}
