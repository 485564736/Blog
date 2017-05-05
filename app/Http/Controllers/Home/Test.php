<?php
/**
 * Created by PhpStorm.
 * User: xishuai
 * Date: 2017/5/3
 * Time: 19:34
 */

namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use App\Http\Model\Attention;
use App\Http\Model\Category;
use App\Http\Model\Comment;
use App\Http\Model\Links;

use App\Http\Model\Praise;
use App\Http\Model\User;
use App\Http\Model\Word;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\home\CommonController;

class Test extends CommonController
{
    public function __construct()
    {
        $data1=array('art_id'=>27,'user_id'=>1);

        Praise::create($data1);
    }
}