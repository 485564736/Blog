<?php

namespace App\Http\Controllers\Users;
use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;

require_once 'resources/org/code/Code.class.php';

class LoginController extends CommonController
{
    public function login()
    {
        if($input = Input::all()){
            $code = new \Code;
            $_code = $code->get();
            if(strtoupper($input['code'])!=$_code){
                return back()->with('msg','验证码错误！');
            }

            if ($input['user_name']=='')
                return back()->with('msg','用户名不能为空');

            $user = User::where('user_name',$input['user_name'])->get()[0];
//            Crypt::encrypt($user->user_pass)
            if($user==null||$user->user_name != $input['user_name'] || Crypt::decrypt($user->user_pass)!= $input['user_pass']){
                return back()->with('msg','用户名或者密码错误');
            }
            session(['user'=>$user]);
            return redirect('users/index');

        }else {
            return view('users.login');
        }
    }

    public function login1()
    {
        if($input = Input::all()){
            $code = new \Code;
            $_code = $code->get();
            if(strtoupper($input['code'])!=$_code){
                $data = [
                    'status' => 0,
                    'msg' => '验证码错误！',
                ];
                return $data;
            }

//            if ($input['user_name']=='')
//                return back()->with('msg','用户名不能为空');

            $user = User::where('user_name',$input['user_name'])->get()[0];
//            Crypt::encrypt($user->user_pass)
            if($user==null||$user->user_name != $input['user_name'] || Crypt::decrypt($user->user_pass)!= $input['user_pass']){
                $data = [
                    'status' => 0,
                    'msg' => '用户名或者密码错误！',
                ];
                return $data;
            }
            session(['user'=>$user]);
            $data = [
                'status' => 1,
                'msg' => '登录成功！',
            ];
            return $data;

        }else {
            $data = [
                'status' => 1,
                'msg' => '出错了！',
            ];
            return $data;
        }
    }

    function login2($art_id){
        if($input = Input::all()){
            $code = new \Code;
            $_code = $code->get();
            if(strtoupper($input['code'])!=$_code){
                return back()->with('msg','验证码错误！');
            }
            $user = User::first();
            if($user->user_name != $input['user_name'] || Crypt::decrypt($user->user_pass)!= $input['user_pass']){
                return back()->with('msg','用户名或者密码错误！');
            }
//            session(['user'=>$user]);
//            return redirect('a/'.$art_id);
//            return back()->with('msg','1');
        }else {
            return view('users.login');
        }
    }

    public function login3()
    {
//        if($input = Input::all()){
//            $code = new \Code;
//            $_code = $code->get();
//            if(strtoupper($input['code'])!=$_code){
//                return back()->with('msg','验证码错误！');
//            }
//
//            if ($input['user_name']=='')
//                return back()->with('msg','用户名不能为空');
//
//            $user = User::where('user_name',$input['user_name'])->get()[0];
////            Crypt::encrypt($user->user_pass)
//            if($user==null||$user->user_name != $input['user_name'] || Crypt::decrypt($user->user_pass)!= $input['user_pass']){
//                return back()->with('msg','用户名或者密码错误');
//            }
//            session(['user'=>$user]);
//            return redirect('users/index');
//
//        }else {
            return view('users.login3');
//        }
    }

    public function re()
    {

        if($input = Input::all()){
            $code = new \Code;
            $_code = $code->get();
            if(strtoupper($input['code'])!=$_code){
                $data = [
                    'status' => 0,
                    'msg' => '验证码错误！',
                ];
                return $data;
            }

            if ($input['user_name']==''){
                $data = [
                    'status' => 0,
                    'msg' => '用户名不能为空！',
                ];
                return $data;
            }

            if (count(User::where('user_name',$input['user_name'])->get())==1){
                $data = [
                    'status' => 0,
                    'msg' => '用户名已存在！',
                ];
                return $data;
            }

            $arry=array('user_name'=>$input['user_name'],'user_pass'=>Crypt::encrypt($input['user_pass']));

            User::create($arry);

            $user = User::where('user_name',$input['user_name'])->get()[0];
            session(['user'=>$user]);
//            return redirect('');
            $data = [
                'status' => 1,
                'msg' => '注册成功！',
            ];
            return $data;

        }else {
            return view('users.re');
//            $data = [
//                'status' => 1,
//                'msg' => '出错了！',
//            ];
//            return $data;
        }

//        if($input = Input::all()){
//            $code = new \Code;
//            $_code = $code->get();
//            if(strtoupper($input['code'])!=$_code){
//                return back()->with('msg','验证码错误！');
//            }
//
//            if ($input['user_name']=='')
//                return back()->with('msg','用户名不能为空');
//
//            if (count(User::where('user_name',$input['user_name'])->get())==1)
//                return back()->with('msg','用户名已存在');
//
//            $arry=array('user_name'=>$input['user_name'],'user_pass'=>$input['user_pass']);
//
//            User::create($arry);
//
//            $user = User::where('user_name',$input['user_name'])->get()[0];
////            Crypt::encrypt($user->user_pass)
////            if($user==null||$user->user_name != $input['user_name'] || Crypt::decrypt($user->user_pass)!= $input['user_pass']){
////                return back()->with('msg','用户名或者密码错误');
////            }
//            session(['user'=>$user]);
//            return redirect('');
//
//        }else {
//            return view('users.re');
//        }
    }

    public function quit()
    {
        session(['user'=>null]);
        return redirect('users/login');
    }

    public function code()
    {
        $code = new \Code;
        $code->make();
    }

}
