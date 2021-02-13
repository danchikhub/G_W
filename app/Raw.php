<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raw extends Model
{
    protected $table = 'Raws';
    protected $primaryKey = 'ID';
    public $timestamps = false;
}
