<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostAccounting extends Model
{
    protected $table = 'costAccounting';
    protected $primaryKey = 'ID';
    public $timestamps = false;
}
