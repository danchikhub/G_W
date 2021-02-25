<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $table = 'Production';
    protected $primaryKey = 'ID';
    public $timestamps = false;
}
