<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Attention extends Model
{
    protected $table='attention';
    protected $primaryKey='attention_id';
    public $timestamps=false;
    protected $guarded=[];
}
