<?php
/**
 * Created by PhpStorm.
 * User: xishuai
 * Date: 2017/5/3
 * Time: 19:27
 */
//namespace App\Http\Model;

//use Illuminate\Database\Eloquent\Model;

use App\Http\Model\Praise;

$data1=array('art_id'=>27,'user_id'=>1);
//echo json_encode($data1);
Praise::create($data1);