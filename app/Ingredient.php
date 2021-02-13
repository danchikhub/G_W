<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = 'Ingredient';
    protected $primaryKey = 'ID';
    public $timestamps = false;
}
