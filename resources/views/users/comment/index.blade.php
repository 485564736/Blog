@extends('layouts.admin')
@section('content')
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('users/article')}}">首页</a> &raquo; 评论管理
</div>
<!--面包屑导航 结束-->

<!--搜索结果页面 列表 开始-->
<form action="#" method="post">
    <div class="result_wrap">
        <!--快捷导航 开始-->
        <div class="result_title">
            <h3>评论列表</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
{{--                <a href="{{url('users/article/create')}}"><i class="fa fa-plus"></i>添加文章</a>--}}
                <a href="{{url('users/comment')}}"><i class="fa fa-recycle"></i>全部评论</a>
            </div>
        </div>
        <!--快捷导航 结束-->
    </div>

    {{--<p>我给他人的评论</p>--}}
    <div class="result_wrap">
        <div class="result_content">
            <table class="list_tab">
                <tr>
                    <th class="tc">ID</th>
                    <th>博客标题</th>
                    <th>评论者</th>
                    <th>评论内容</th>
                    {{--<th>编辑</th>--}}
                    <th>评论时间</th>
                    <th>操作</th>
                </tr>
                @foreach($data as $v)
{{--                    @if($data3[$v->user_id]==session('user')->user_name)--}}
                <tr>
                    <td class="tc">{{$v->comment_id}}</td>
                    {{--<td>--}}
                        {{--<a href="#">{{$v->art_title}}</a>--}}
                    {{--</td>--}}
                    <td>{{$data2[$v->art_id]}}</td>
                    <td>{{$data3[$v->user_id]}}</td>
{{--                    <td>{{$v->art_content}}</td>--}}
                    <td>
                        <ul class="infos">
                            {!! $v->art_content !!}
                        </ul>
                    </td>
                    <td>{{date('Y-m-d',$v->com_time)}}</td>
                    <td>
{{--                        <a href="{{url('users/comment/'.$v->comment_id.'/edit')}}">修改</a>--}}
                        <a href="javascript:;" onclick="delArt({{$v->comment_id}})">删除</a>
                    </td>
                </tr>
                    {{--@endif--}}
                @endforeach
            </table>

            <div class="page_list">
                {{$data->links()}}
            </div>
        </div>
    </div>

    {{--<p>他人给我的评论</p>--}}
    {{--<div class="result_wrap">--}}
        {{--<div class="result_content">--}}
            {{--<table class="list_tab">--}}
                {{--<tr>--}}
                    {{--<th class="tc">ID</th>--}}
                    {{--<th>博客标题</th>--}}
                    {{--<th>评论者</th>--}}
                    {{--<th>评论内容</th>--}}
                    {{--<th>编辑</th>--}}
                    {{--<th>评论时间</th>--}}
                    {{--<th>操作</th>--}}
                {{--</tr>--}}
                {{--@foreach($data as $v)--}}
                    {{--@if($data3[$v->user_id]!=session('user')->user_name)--}}
                    {{--<tr>--}}
                        {{--<td class="tc">{{$v->comment_id}}</td>--}}
                        {{--<td>--}}
                        {{--<a href="#">{{$v->art_title}}</a>--}}
                        {{--</td>--}}
                        {{--<td>{{$data2[$v->art_id]}}</td>--}}
                        {{--<td>{{$data3[$v->user_id]}}</td>--}}
                        {{--                    <td>{{$v->art_content}}</td>--}}
                        {{--<td>--}}
                            {{--<ul class="infos">--}}
                                {{--{!! $v->art_content !!}--}}
                            {{--</ul>--}}
                        {{--</td>--}}
                        {{--<td>{{date('Y-m-d',$v->com_time)}}</td>--}}
                        {{--<td>--}}
                            {{--                        <a href="{{url('users/comment/'.$v->comment_id.'/edit')}}">修改</a>--}}
                            {{--<a href="javascript:;" onclick="delArt({{$v->comment_id}})">删除</a>--}}
                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--@endif--}}
                {{--@endforeach--}}
            {{--</table>--}}

            {{--<div class="page_list">--}}
            {{--{{$data->links()}}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
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
    function delArt(art_id) {
        layer.confirm('您确定要删除这条评论吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('users/comment/')}}/"+art_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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
