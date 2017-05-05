<?php

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
//require 'SensitiveWordFilter.php';
use App\Http\Controllers\Home\SensitiveWordFilter;

class IndexController extends CommonController
{

    public function filterdata($data){
        $filter = new SensitiveWordFilter(__DIR__ . '/11.txt');
        foreach ($data as $item){
            $filter->filter($item->art_content, 10);
        }
    }

    public function index()
    {
        //点击量最高的6篇文章（站长推荐）
        $pics = Article::orderBy('art_view','desc')->take(6)->get();

        //图文列表5篇（带分页）
        $data = Article::orderBy('art_time','desc')->paginate(5);

        $this->filterdata($data);

        //友情链接
        $links = Links::orderBy('link_order','asc')->get();

        $category = (new Category)->tree();
        $guidang = Article::all();
//        date('Y-m-d',$d->art_time)
        $gui=array();
        foreach ($guidang as $item) {
//            $item['art_time']=date('Y-m-d',$item['art_time']);
//            date("Y",$time),date("M",$time),date("D",$time)
            $gui[date("Y",$item['art_time'])]=date("m",$item['art_time']);
//            array_add($gui,date("Y",$item),date("M",$item));
        }

        return view('home.index',compact('pics','data','links','category','guidang','gui'));
    }

    public function cate($cate_id)
    {
        //图文列表4篇（带分页）
        $data = Article::where('cate_id',$cate_id)->orderBy('art_time','desc')->paginate(4);

        $this->filterdata($data);

        //查看次数自增
        Category::where('cate_id',$cate_id)->increment('cate_view');

        //当前分类的子分类
        $submenu = Category::where('cate_pid',$cate_id)->get();

        $field = Category::find($cate_id);

        $category = (new Category)->tree();

        $guidang = Article::all();
//        date('Y-m-d',$d->art_time)
        $gui=array();
        foreach ($guidang as $item) {
//            $item['art_time']=date('Y-m-d',$item['art_time']);
//            date("Y",$time),date("M",$time),date("D",$time)
            $gui[date("Y",$item['art_time'])]=date("m",$item['art_time']);
//            array_add($gui,date("Y",$item),date("M",$item));
        }
        return view('home.list',compact('field','data','submenu','category','guidang','gui'));
    }

    public function guidang($year,$month,$cate_id=1)
    {
        //图文列表4篇（带分页）

//        $data = Article::where('cate_id',$cate_id)->orderBy('art_time','desc')->paginate(4);

        $day=0;
        switch ($month)
        {
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                $day=31;
                break;
            case 4:
            case 6:
            case 9:
            case 11:
                $day=30;
            case 2:
                if ($year%400==0||$year%4==0&&$year%100!=0){
                    $day=28;
                }else{
                    $day=29;
                }
        }

        $data = Article::where('art_time','>=',mktime(0,0,0,$month,0,$year))->where('art_time','<=',mktime(24,60,60,$month,$day,$year))->orderBy('art_time','desc')->paginate(5);

        $this->filterdata($data);

        //        $data = Article::orderBy('art_time','desc')->get();
//        $data1=array();
//        $count=0;
//        foreach ($data as $item){
//            if (date("Y",$item['art_time'])==$year&&date("m",$item['art_time'])==$month){
//                $data1[''.$count++]=$item;
////                array_merge(array($item),$data1);
////                $data1=array($item)+$data1;
//            }
//        }
//        $data=$data1;
//        $data['data']=$data1;
//        $cate_id=$data['data'][0]->;

        //查看次数自增
        Category::where('cate_id',$cate_id)->increment('cate_view');

        //当前分类的子分类
        $submenu = Category::where('cate_pid',$cate_id)->get();

        $field = Category::find($cate_id);

        $category = (new Category)->tree();

        $guidang = Article::all();
//        date('Y-m-d',$d->art_time)
        $gui=array();
        foreach ($guidang as $item) {
//            $item['art_time']=date('Y-m-d',$item['art_time']);
//            date("Y",$time),date("M",$time),date("D",$time)
            $gui[date("Y",$item['art_time'])]=date("m",$item['art_time']);
//            array_add($gui,date("Y",$item),date("M",$item));
        }
        return view('home.index',compact('field','data','submenu','category','guidang','gui','data1'));
    }



    public function article($art_id)
    {
        $field = Article::Join('category','article.cate_id','=','category.cate_id')->where('art_id',$art_id)->first();

        $filter = new SensitiveWordFilter(__DIR__ . '/11.txt');
        $filter->filter($field->art_content, 10);

//        $this->filterdata($data);

        //查看次数自增
        Article::where('art_id',$art_id)->increment('art_view');

        $article['pre'] = Article::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();
        $article['next'] = Article::where('art_id','>',$art_id)->orderBy('art_id','asc')->first();

        $data = Article::where('cate_id',$field->cate_id)->orderBy('art_id','desc')->take(6)->get();

        $category = (new Category)->tree();
        $guidang = Article::all();
//        date('Y-m-d',$d->art_time)
        $gui=array();
        foreach ($guidang as $item) {
//            $item['art_time']=date('Y-m-d',$item['art_time']);
//            date("Y",$time),date("M",$time),date("D",$time)
            $gui[date("Y",$item['art_time'])]=date("m",$item['art_time']);
//            array_add($gui,date("Y",$item),date("M",$item));
        }

        $errors='';

        //获取评论
        $comments = Comment::where('art_id',$art_id)->orderBy('com_time','desc')->get();

        foreach ($comments as $item){
            $item['user_name']=User::find($item->user_id)->user_name;
            $item['user_portrait']=User::find($item->user_id)->user_portrait;
        }

        $userid = 0;
        if(session('user')!=null){
            $userid = session('user')->user_id;
        }

        return view('home.new',compact('field','article','data','category','guidang','gui','errors','comments','userid'));
    }

    public function commentstore($art_id)
    {
        $field = Article::Join('category','article.cate_id','=','category.cate_id')->where('art_id',$art_id)->first();

        //查看次数自增
        Article::where('art_id',$art_id)->increment('art_view');

        $article['pre'] = Article::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();
        $article['next'] = Article::where('art_id','>',$art_id)->orderBy('art_id','asc')->first();

        $data = Article::where('cate_id',$field->cate_id)->orderBy('art_id','desc')->take(6)->get();

        $category = (new Category)->tree();
        $guidang = Article::all();
//        date('Y-m-d',$d->art_time)
        $gui=array();
        foreach ($guidang as $item) {
//            $item['art_time']=date('Y-m-d',$item['art_time']);
//            date("Y",$time),date("M",$time),date("D",$time)
            $gui[date("Y",$item['art_time'])]=date("m",$item['art_time']);
//            array_add($gui,date("Y",$item),date("M",$item));
        }

        //添加评论
        $input = Input::except('_token');
        $input['com_time'] = time();
        $input['user_id']=session('user')->user_id;
        $input['art_id']=$art_id;

        $re = Comment::create($input);
        if($re){
            return redirect('a/'.$art_id);
        }else{
            return back()->with('errors','数据填充失败，请稍后重试！');
        }

        //获取评论
//        $comments = Comment::all();

//        return view('home.new',compact('field','article','data','category','guidang','gui','comments'));
    }

    public function artuser($user_id)
    {
        //点击量最高的6篇文章（站长推荐）
        $pics = Article::orderBy('art_view','desc')->take(6)->get();

        //图文列表5篇（带分页）
        $data = Article::where('user_id',$user_id)->orderBy('art_time','desc')->paginate(5);
        $this->filterdata($data);

        //友情链接
        $links = Links::orderBy('link_order','asc')->get();

        $category = (new Category)->tree();
        $guidang = Article::all();
//        date('Y-m-d',$d->art_time)
        $gui=array();
        foreach ($guidang as $item) {
//            $item['art_time']=date('Y-m-d',$item['art_time']);
//            date("Y",$time),date("M",$time),date("D",$time)
            $gui[date("Y",$item['art_time'])]=date("m",$item['art_time']);
//            array_add($gui,date("Y",$item),date("M",$item));
        }

        return view('home.index',compact('pics','data','links','category','guidang','gui'));
    }

    public function praise($art_id)
    {
        if(session('user')==null){
            $data = [
                'status' => 0,
                'msg' => '未登录！',
            ];
            return $data;
        }

         $field = Praise::where('art_id',$art_id)->get();

         if (count($field)!=0){
             $field1 = Praise::where('art_id',$art_id)->where('user_id',session('user')->user_id)->get();
             if (count($field1)!=0){
                 $data = [
                     'status' => 0,
                     'msg' => '已点赞！',
                 ];
                 return $data;
             }else{

             }
         }else{

         }

         $data1=array('art_id'=>$art_id,'user_id'=>session('user')->user_id);

         Praise::create($data1);
//        $praise = new Praise();
//        $praise->art_id=$art_id;
//        $praise->user_id=session('user')->user_id;

//        if ($praise->save()){
//            $re = '2';
//        }else{
//            $re = '9';
//        }

        $data = [
            'status' => 1,
            'msg' => '点赞成功！',
        ];
        return $data;

    }

    public function attention($user_id)
    {
        if(session('user')==null){
            $data = [
                'status' => 0,
                'msg' => '未登录！',
            ];
            return $data;
        }

        if($user_id==session('user')->user_id){
            $data = [
                'status' => 0,
                'msg' => '不可以关注自己！',
            ];
            return $data;
        }

        $field = Attention::where('user_id',$user_id)->get();

        if (count($field)!=0){
            $field1 = Attention::where('user_id',$user_id)->where('user_idd',session('user')->user_id)->get();
            if (count($field1)!=0){
                $data = [
                    'status' => 0,
                    'msg' => '已关注！',
                ];
                return $data;
            }else{

            }
        }else{

        }

        $data1=array('user_id'=>$user_id,'user_idd'=>session('user')->user_id);

        Attention::create($data1);

        $data = [
            'status' => 1,
            'msg' => '关注成功！',
        ];
        return $data;
    }

    public function word($user_id)
    {
        if(session('user')==null){
            $data = [
                'status' => 0,
                'msg' => '未登录！',
            ];
            return $data;
        }

        if($user_id==session('user')->user_id){
            $data = [
                'status' => 0,
                'msg' => '不可以给自己留言！',
            ];
            return $data;
        }

//        $field = Word::where('user_id',$user_id)->get();
//
//        if (count($field)!=0){
//            $field1 = Attention::where('user_id',$user_id)->where('user_idd',session('user')->user_id)->get();
//            if (count($field1)!=0){
//                $data = [
//                    'status' => 0,
//                    'msg' => '已关注！',
//                ];
//                return $data;
//            }else{
//
//            }
//        }else{
//
//        }

        $input=Input::all();
        $data1=array('user_id'=>$user_id,'user_idd'=>session('user')->user_id,'word_content'=>$input['word_content'],'word_time'=>time());

        Word::create($data1);
        //第一次插入数据可以，但第二次不可以，数据库主键没有设置自增

        $data = [
            'status' => 1,
            'msg' => '留言成功！'.$input['word_content'],
        ];
        return $data;
    }

}
