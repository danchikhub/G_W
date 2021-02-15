<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchas extends Model
{
    protected $table = 'PurchasOfRawMaterials';
    protected $primaryKey = 'ID';
    public $timestamps = false;
}
