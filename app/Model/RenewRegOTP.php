<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RenewRegOTP extends Model
{
    protected $table = 'renew_reg_otp';
    protected $primaryKey = 'id';
    public $timestamps = FALSE;
}
