<?php
/**
 * Created by PhpStorm.
 * User: xishuai
 * Date: 2017/5/2
 * Time: 13:07
 */

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comment';
    protected $primaryKey='comment_id';
    public $timestamps=false;
    protected $guarded=[];
}