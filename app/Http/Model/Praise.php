<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Praise extends Model
{
    protected $table='praise';
    protected $primaryKey='praise_id';
    public $timestamps=false;
    protected $guarded=[];
}
