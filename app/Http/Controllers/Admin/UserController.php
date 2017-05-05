<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UserController extends CommonController
{
    //get.admin/article  全部文章列表
    public function index()
    {
        $data = User::orderBy('user_id','desc')->paginate(10);
        return view('admin.user.index',compact('data'));
    }

    //get.admin/article/create   添加文章
    public function create()
    {
        $data = (new Category)->tree();
//        $data['user']=session(['user']);
//        $session['user']='xishai';
//        session(['user'=>'xishuai']);
        return view('admin.article.add',compact('data'));
    }

    //post.admin/article  添加文章提交
    public function store()
    {
        $input = Input::except('_token');
        $input['art_time'] = time();

        $rules = [
            'art_title'=>'required',
            'art_content'=>'required',
        ];

        $message = [
            'art_title.required'=>'文章名称不能为空！',
            'art_content.required'=>'文章内容不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            if (isset($input['art_editor'])||$input['art_editor']==null||$input['art_editor']=='')
            {
                $input['art_editor']=session('user');
            }
            $re = Article::create($input);
            if($re){
                return redirect('admin/article');
            }else{
                return back()->with('errors','数据填充失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //get.admin/article/{article}/edit  编辑文章
    public function edit($art_id)
    {
        $data = (new Category)->tree();
        $field = Article::find($art_id);
        return view('admin.article.edit',compact('data','field'));
    }

    //put.admin/article/{article}    更新文章
    public function update($art_id)
    {
        $input = Input::except('_token','_method');
        $re = Article::where('art_id',$art_id)->update($input);
        if($re){
            return redirect('admin/article');
        }else{
            return back()->with('errors','文章更新失败，请稍后重试！');
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
