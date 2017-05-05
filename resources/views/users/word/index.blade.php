@extends('layouts.admin')
@section('content')
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('users/article')}}">首页</a> &raquo; 留言管理
</div>
<!--面包屑导航 结束-->

<!--搜索结果页面 列表 开始-->
<form action="#" method="post">
    <div class="result_wrap">
        <!--快捷导航 开始-->
        <div class="result_title">
            <h3>留言列表</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
{{--                <a href="{{url('users/article/create')}}"><i class="fa fa-plus"></i>添加文章</a>--}}
                <a href="{{url('users/word')}}"><i class="fa fa-recycle"></i>全部留言</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    <div class="result_wrap">
        <P>我的留言</P>
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc">ID</th>
                    <th>留言给</th>
                    {{--<th>留言时间</th>--}}
                    <th>留言内容</th>
                    {{--<th>编辑</th>--}}
                    <th>留言时间</th>
                    <th>操作</th>
                </tr>
                @foreach($dataself as $v)
                <tr>
                    <td class="tc">{{$v->word_id}}</td>
                    {{--<td>--}}
                        {{--<a href="#">{{$v->art_title}}</a>--}}
                    {{--</td>--}}
                    <td>{{$v->username}}</td>
                    <td>{{$v->word_content}}</td>
{{--                    <td>{{$v->art_content}}</td>--}}
                    <td>{{date('Y-m-d',$v->word_time)}}</td>
                    <td>
{{--                        <a href="{{url('users/comment/'.$v->comment_id.'/edit')}}">修改</a>--}}
                        <a href="javascript:;" onclick="delArt({{$v->word_id}})">删除</a>
                    </td>
                </tr>
                @endforeach
            </table>

            {{--<div class="page_list">--}}
                {{--{{$data->links()}}--}}
            {{--</div>--}}
        </div>
    </div>

    <div class="result_wrap">
        <P>别人的留言</P>
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc">ID</th>
                    <th>谁留言给我</th>
                    {{--<th>留言时间</th>--}}
                    <th>留言内容</th>
                    {{--<th>编辑</th>--}}
                    <th>留言时间</th>
                    <th>操作</th>
                </tr>
                @foreach($dataother as $v)
                    <tr>
                        <td class="tc">{{$v->word_id}}</td>
                        {{--<td>--}}
                        {{--<a href="#">{{$v->art_title}}</a>--}}
                        {{--</td>--}}
                        <td>{{$v->username}}</td>
                        <td>{{$v->word_content}}</td>
                        {{--                    <td>{{$v->art_content}}</td>--}}
                        <td>{{date('Y-m-d',$v->word_time)}}</td>
                        <td>
                            {{--                        <a href="{{url('users/comment/'.$v->comment_id.'/edit')}}">修改</a>--}}
                            <a href="javascript:;" onclick="delArt({{$v->word_id}})">删除</a>
                        </td>
                    </tr>
                @endforeach
            </table>

            {{--<div class="page_list">--}}
            {{--{{$data->links()}}--}}
            {{--</div>--}}
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->

<style>
    .result_content ul li span {
        font-size: 15px;
        padding: 6px 12px;
    }
</style>

<script>
    //删除分类
    function delArt(word_id) {
        layer.confirm('您确定要删除这条留言吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('users/word/')}}/"+word_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                if(data.status==0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                }else{
                    layer.msg(data.msg, {icon: 5});
                }
            });
//            layer.msg('的确很重要', {icon: 1});
        }, function(){

        });
    }
</script>

@endsection
