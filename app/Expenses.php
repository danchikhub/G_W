<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $table = 'Expenses';
    protected $primaryKey = 'ID';
    public $timestamps = false;
}
