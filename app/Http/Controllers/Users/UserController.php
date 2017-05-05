<?php

namespace App\Http\Controllers\Users;

use App\Http\Model\User;
use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
class UserController extends CommonController
{
    //get.admin/article  全部文章列表
    public function index()
    {
//        $data = User::orderBy('user_id','desc')->paginate(10);

        $data = (new Category)->tree();
        $field = User::where('user_id',session('user')->user_id)->get()[0];
        return view('users.user.edit',compact('field','data'));
    }

    //get.admin/article/create   添加文章
    public function create()
    {
        $data = (new Category)->tree();
//        $data['user']=session(['user']);
//        $session['user']='xishai';
//        session(['user'=>'xishuai']);
        return view('users.user.add',compact('data'));
    }

    //post.admin/article  添加文章提交
    public function store()
    {
        $input = Input::except('_token');
//        $input['art_time'] = time();

//        $rules = [
//            'art_title'=>'required',
//            'art_content'=>'required',
//        ];
//
//        $message = [
//            'art_title.required'=>'文章名称不能为空！',
//            'art_content.required'=>'文章内容不能为空！',
//        ];

//        $validator = Validator::make($input,$rules,$message);

//        if($validator->passes()){
//            if (isset($input['art_editor'])||$input['art_editor']==null||$input['art_editor']=='')
//            {
//                $input['art_editor']=session('user');
//            }
            $re = User::create($input);
            if($re){
                return redirect('users/user');
            }else{
                return back()->with('errors','数据填充失败，请稍后重试！');
            }
//        }else{
//            return back()->withErrors($validator);
//        }
    }

    //get.admin/article/{article}/edit  编辑文章
    public function edit($user_id)
    {
        $data = (new Category)->tree();
        $field = User::find($user_id);
        return view('users.user.edit',compact('data','field'));
    }

    //put.admin/article/{article}    更新文章
    public function update($user_id)
    {
        $input = Input::except('_token','_method');
        $input['user_pass']=Crypt::encrypt($input['user_pass']);
        $re = User::where('user_id',$user_id)->update($input);
        if($re){
            return redirect('users/user');
        }else{
            return back()->with('errors','信息更新失败，请稍后重试！');
        }
    }

    //delete.admin/article/{article}   删除单个文章
    public function destroy($user_id)
    {
        $re = User::where('user_id',$user_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '评论删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '评论删除失败，请稍后重试！',
            ];
        }
        return $data;
    }
}
