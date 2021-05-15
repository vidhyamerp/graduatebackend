<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RenewDetails extends Model
{
    protected $table = 'renewal_details';
    protected $primaryKey = 'id';
    public $timestamps = FALSE;
}
