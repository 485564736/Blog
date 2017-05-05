<?php

namespace App\Http\Controllers\Users;

use App\Http\Model\Attention;
use App\Http\Model\Comment;
use App\Http\Model\Category;
use App\Http\Model\Article;
use App\Http\Model\User;
use App\Http\Model\Word;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class AttentionController extends CommonController
{
    //get.admin/article  全部文章列表
    public function index()
    {
        $data1 = Article::where('user_id',session('user')->user_id)->get();
        $arr=array();
        $count=0;
        foreach ($data1 as $item){
            $arr[$count++]=$item->art_id;
        }
        $dataself = Attention::where('user_idd',session('user')->user_id)->get();
        $dataother = Attention::where('user_id',session('user')->user_id)->get();



        $mm=0;
        $userarr=array();
        foreach ($dataself as $item){
            $field = User::where('user_id',$item->user_id)->get()[0];
            $item['username']=$field->user_name;
            $userarr[$mm++]=$item->user_id;
        }
        $userarr[$mm++]=session('user')->user_id;
        $datauser = User::whereNotIn('user_id',$userarr)->where('user_name','!=','admin')->get();

        foreach ($dataother as $item){
            $field = User::where('user_id',$item->user_idd)->get()[0];
            $item['username']=$field->user_name;
        }

        $data2 = Article::whereIn('art_id',$arr)->get();
        foreach ($data2 as $item){
            $data2[$item->art_id]=$item->art_title;
        }


//        $count=0;
//        foreach ($data as $item){
//            $arr[$count++]=$item->user_id;
//        }
//
//        $data3=User::whereIn('user_id',$arr)->get();
//        foreach ($data3 as $item){
//            $data3[$item->user_id]=$item->user_name;
//        }

        return view('users.attention.index',compact('dataself','dataother','datauser'));
    }


    public function add($user_id){
        $data1=array('user_id'=>$user_id,'user_idd'=>session('user')->user_id);

        $re=Attention::create($data1);

        if($re){
            $data = [
                'status' => 0,
                'msg' => '关注成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '关注失败，请稍后重试！',
            ];
        }
        return $data;
    }

    //get.admin/article/create   添加文章
    public function create()
    {
        $data = (new Category)->tree();
//        $data['user']=session(['user']);
//        $session['user']='xishai';
//        session(['user'=>'xishuai']);
        return view('users.article.add',compact('data'));
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
                return redirect('users/article');
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
        return view('users.article.edit',compact('data','field'));
    }

    //put.admin/article/{article}    更新文章
    public function update($art_id)
    {
        $input = Input::except('_token','_method');
        $re = Article::where('art_id',$art_id)->update($input);
        if($re){
            return redirect('users/article');
        }else{
            return back()->with('errors','文章更新失败，请稍后重试！');
        }
    }

    //delete.admin/article/{article}   删除单个文章
    public function destroy($attention_id)
    {
        $re = Attention::where('attention_id',$attention_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '关注删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '关注删除失败，请稍后重试！',
            ];
        }
        return $data;
    }
}
