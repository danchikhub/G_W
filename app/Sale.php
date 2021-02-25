<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'SaleOfProducts';
    protected $primaryKey = 'ID';
    public $timestamps = false;
}
