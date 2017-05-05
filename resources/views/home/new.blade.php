@extends('layouts.home')
@section('info')
    <title>{{$field->art_title}} - {{Config::get('web.web_title')}}</title>
    <meta name="keywords" content="{{$field->art_tag}}" />
    <meta name="description" content="{{$field->art_description}}" />

    <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('resources/views/home/css/common.css')}}"/>

    <script type="text/javascript" src="{{asset('resources/views/home/js/jquery.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('resources/views/admin/style/js/ch-ui.admin.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>

@endsection
@section('content')
    <article class="blogs">
        <h1 class="t_nav"><span>您当前的位置：<a href="{{url('/')}}">首页</a>&nbsp;&gt;&nbsp;<a href="{{url('cate/'.$field->cate_id)}}">{{$field->cate_name}}</a></span><a href="{{url('/')}}" class="n1" style="background-color: lightgray;color: black">网站首页</a><a href="{{url('cate/'.$field->cate_id)}}" class="n2" style="background-color: lavender;color: black">{{$field->cate_name}}</a></h1>
        <div class="index_about">
            <h2 class="c_titile">{{$field->art_title}}</h2>
            <p class="box_c"><span class="d_time">发布时间：{{date('Y-m-d',$field->art_time)}}</span><span>编辑：{{$field->art_editor}}</span><span>查看次数：{{$field->art_view}}</span></p>
            <ul class="infos">
                {!! $field->art_content !!}
            </ul>
            <div class="keybq">
                <p><span>关键字词</span>：{{$field->art_tag}}</p>
            </div>
            <div class="ad"> </div>
            <div class="nextinfo">
                <p>上一篇：
                    @if($article['pre'])
                        <a href="{{url('a/'.$article['pre']->art_id)}}">{{$article['pre']->art_title}}</a>
                    @else
                        <span>没有上一篇了</span>
                    @endif
                </p>
                <p>下一篇：
                    @if($article['next'])
                        <a href="{{url('a/'.$article['next']->art_id)}}">{{$article['next']->art_title}}</a>
                    @else
                        <span>没有下一篇了</span>
                    @endif
                </p>
            </div>
            {{--<div class="otherlink">--}}
                {{--<h2>相关文章</h2>--}}
                {{--<ul>--}}
                    {{--@foreach($data as $d)--}}
                    {{--<li><a href="{{url('a/'.$d->art_id)}}" title="{{$d->art_title}}">{{$d->art_title}}</a></li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}



        <div style="margin-top: 20px">
            {{$errors}}
            <form action="{{url('/commentstore').'/'.$field->art_id}}" method="post" onsubmit="jiaoyan1(event)" >
                {{csrf_field()}}
                <table class="add_tab">
                    <thead><p style="color: red;height: 30px;">评论：</p></thead>
                    <tbody>
                    <tr>
                        <th></th>
                        <td>
                            <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.config.js')}}"></script>
                            <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.all.min.js')}}"> </script>
                            <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                            <script id="editor" name="art_content" type="text/plain" style="width:auto;height:150px;margin-right:30px"></script>
                            <script type="text/javascript">
                                var ue = UE.getEditor('editor');
                            </script>
                            <style>
                                .edui-default{line-height: 28px;}
                                div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                                {overflow: hidden; height:20px;}
                                div.edui-box{overflow: hidden; height:22px;}
                            </style>
                        </td>
                    </tr>

                    <tr>
                        <th></th>
                        <td>
                            <p align="center"><input type="submit" value="发表" align="center" id="fabiao" onsubmit="" aa="{{$userid}}"></p>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>


                    <div id="dialogBg"></div>
                    <div id="dialog" class="animated">
                        <img class="dialogIco" width="50" height="50" src="{{asset('resources/views/home/images/ico.png')}}" alt="" />
                        <div class="dialogTop">
                            <a href="javascript:;" class="claseDialogBtn">关闭</a>
                        </div>
                        <form action="{{url('users/login1/'.$field->art_id)}}" method="post" id="editForm">
                            <ul class="editInfos">
                                <li><label><font color="#ff0000">* </font>用户名：<input type="text" id="user_name" name="" required value="" class="ipt" /></label></li>
                                <li><label><font color="#ff0000">* </font>密  码：<input type="text" id="user_pass" name="" required value="" class="ipt" /></label></li>
                                <li><label><font color="#ff0000">* </font>验证码：<input type="text" id="code" name="" required value="" class="ipt" /></label></li>
                                <li>
                                    <div align="center">
                                    <img src="{{url('admin/code')}}" alt="" onclick="this.src='{{url('admin/code')}}?'+Math.random()">
                                    </div>
                                </li>
                                <li>
                                    <input type="button" id="queren" value="确认提交" class="submitBtn" onsubmit="return false" />
                                    {{--<input type="submit" value="确认提交" class="submitBtn" />--}}
                                </li>
                            </ul>
                        </form>
                    </div>

            <script type="text/javascript">
                var w,h,className;
                function getSrceenWH(){
                    w = $(window).width();
                    h = $(window).height();
                    $('#dialogBg').width(w).height(h);
                }

                window.onresize = function(){
                    getSrceenWH();
                }
                $(window).resize();

                $(function(){
                    getSrceenWH();

                    //关闭弹窗
                    $('.claseDialogBtn').click(function(){
                        $('#dialogBg').fadeOut(300,function(){
                            $('#dialog').addClass('bounceOutUp').fadeOut();
                        });
                    });

                    document.getElementById('queren').onclick=function () {
                        var user_name=document.getElementById('user_name').value;
                        var user_pass=document.getElementById('user_pass').value;
                        var code=document.getElementById('code').value;
                        $.post("{{url('users/login1')}}",{'user_name':user_name,'user_pass':user_pass,'code':code,'_token':"{{csrf_token()}}"},function (data) {
                            if(data.status==0){
//                                location.href = location.href;
                                layer.msg(data.msg, {icon: 5});
                            }else{
                                $('#dialogBg').fadeOut(300,function(){
                                    $('#dialog').addClass('bounceOutUp').fadeOut();
                                    location.href = location.href;
                                    layer.msg(data.msg, {icon: 6});
                                });

                            }
                        });
                    }
                });
            </script>

            {{--<div class="login_box" style="position: absolute;left: 200px;top: 200px;display: none;z-index: 1000;" id="bb">--}}
                {{--<h1 style="font-size: small;color: black">Blog</h1>--}}
                {{--<div class="form">--}}
                    {{--@if(session('msg'))--}}
                        {{--<p style="color:red">{{session('msg')}}</p>--}}
                    {{--@endif--}}
                    {{--<form action="{{url('users/login1/'.$field->art_id)}}" method="post">--}}
                        {{--{{csrf_field()}}--}}
                        {{--<ul>--}}
                            {{--<li>--}}
                                {{--<input type="text" name="user_name" class="text"/>--}}
                                {{--<span><i class="fa fa-user"></i></span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<input type="password" name="user_pass" class="text"/>--}}
                                {{--<span><i class="fa fa-lock"></i></span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<input type="text" class="code" name="code"/>--}}
                                {{--<span><i class="fa fa-check-square-o"></i></span>--}}
                                {{--<img src="{{url('admin/code')}}" alt="" onclick="this.src='{{url('admin/code')}}?'+Math.random()">--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<input type="submit" value="立即登陆"/>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</form>--}}
                   {{--</div>--}}
            {{--</div>--}}

            {{--<div style="position: absolute;left: 200px;top: 200px;display: none;z-index: 1000" id="bb">--}}
                {{--<form action="" method="post">--}}
                    {{--{{csrf_field()}}--}}
                    {{--<ul>--}}
                        {{--<li>--}}
                            {{--<input type="text" name="user_name" class="text"/>--}}
                            {{--<span><i class="fa fa-user"></i></span>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<input type="password" name="user_pass" class="text"/>--}}
                            {{--<span><i class="fa fa-lock"></i></span>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<input type="text" class="code" name="code"/>--}}
                            {{--<span><i class="fa fa-check-square-o"></i></span>--}}
                            {{--<img src="{{url('admin/code')}}" alt="" onclick="this.src='{{url('admin/code')}}?'+Math.random()">--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<input type="submit" value="立即登陆"/>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</form>--}}
            {{--</div>--}}

            <script>

                function jiaoyan1(e) {
                    var userid=document.getElementById('fabiao').getAttribute('aa');
//                    userid=0;
                    if (userid==0){
                        e.preventDefault();
                        $('#dialogBg').fadeIn(300);
                        $('#dialog').removeAttr('class').addClass('animated '+'rollIn'+'').fadeIn();
//                        alert("请先登录");
//                        var mm=document.getElementById('bb');
//                        mm.style.display='block';
//                        mm.style.left=e.target.offsetLeft+250+'px';
//                        mm.style.top=e.target.offsetTop-100+'px';
//                        console.log(e);
//                        console.log(e.target.offsetLeft)
//                        console.log(mm);
                    }else {

                    }
                }

                function jiaoyan() {
//                    alert('adfd');
                    var userid=document.getElementById('fabiao').getAttribute('aa');
//                    alert(userid);
                    userid=0;
                    if (userid==0){
                        var mm=document.getElementById('bb');
                        mm.style.display='block';
//                        mm.style.left=e.offsetX;
//                        mm.style.top=e.offsetY;
                        return false;
                    }else {
                        return true;
                    }
                }
//                document.getElementById('fabiao').onclick=jiaoyan();
            </script>

            <div>
                {{--{{$comments}}--}}

                <hr style="margin-right: 20px;color: lightgray">
                @foreach($comments as $d)
                {{--<li><a href="{{url('a/'.$d->art_id)}}" title="{{$d->art_title}}">{{$d->art_title}}</a></li>--}}
                    <div style="float: left;margin-top: 10px">
                        {{--<img src="{{'/blog/uploads/noavatar_default.png'}}">--}}
                        <img src="{{asset($d->user_portrait)}}" style="width: 50px;height: 50px;border-radius: 25px">
                    </div>
                    <div style="float: left;margin-top: 10px">
                        <p style="margin-left: 10px">{{$d->user_name}}</p>
                        <ul class="infos">
                            {!! $d->art_content !!}
                        </ul>
                        <p style="margin-left: 10px;margin-bottom: 5px"><span class="d_time">{{date('Y-m-d',$d->com_time)}}</span></p>
                    </div>

                    <hr style="clear: both;margin-right: 20px;color: lightgray">
                @endforeach
            </div>

        </div>


        <aside class="right">
            <!-- Baidu Button BEGIN -->
            <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
            <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
            <script type="text/javascript" id="bdshell_js"></script>
            <script type="text/javascript">
                document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
            </script>
            <!-- Baidu Button END -->
            <div class="blank"></div>
            <div class="news">
                @parent
            </div>
        </aside>
    </article>

    {{--<link rel="stylesheet" href="{{asset('resources/views/home/css/common.css')}}"/>--}}
@endsection