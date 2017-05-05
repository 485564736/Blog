<?php

namespace App\Http\Controllers\Admin;
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
            if($user==null||$user->user_name != $input['user_name'] || Crypt::decrypt($user->user_pass)!= $input['user_pass']){
                return back()->with('msg','用户名或者密码错误');
            }
            session(['user'=>$user]);
            return redirect('admin/index');

        }else {
            return view('admin.login');
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

    public function quit()
    {
        session(['user'=>null]);
        return redirect('admin/login');
    }

    public function code()
    {
        $code = new \Code;
        $code->make();
    }

}
