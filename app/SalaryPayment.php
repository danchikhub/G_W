<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryPayment extends Model
{
    protected $table = 'SalaryPayment';
    protected $primaryKey = 'ID';
    public $timestamps = false;
}
