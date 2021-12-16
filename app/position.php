<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class position extends Model
{
    protected $table = 'position';
    protected $primaryKey = 'posi_id';
    public $timestamps = false;
}
