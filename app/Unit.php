<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'Units';
    protected $primaryKey = 'ID';
    public $timestamps = false;
}
