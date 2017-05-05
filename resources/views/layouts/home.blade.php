<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    @yield('info')
    <link href="{{asset('resources/views/home/css/base.css')}}" rel="stylesheet">
    <link href="{{asset('resources/views/home/css/index.css')}}" rel="stylesheet">
    <link href="{{asset('resources/views/home/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('resources/views/home/css/new.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('resources/views/home/js/modernizr.js')}}"></script>

    <![endif]-->
    <style type="text/css">
        body,
        button,
        input,
        select,
        textarea,
        a,
        span,
        p,
        ul,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        td {
            font-family: '楷体', Microsoft YaHei, '宋体', Tahoma, Helvetica, Arial, "\5b8b\4f53", sans-serif;
        }

    </style>
</head>
<body id="body1" style="background-color: ">

<div id="erweima" style="display: none;width: 100%;height: 100%;position: absolute;z-index: 1000;background-color: rgba(230,230,230,0.7)" align="center">
    <div id="erweima1" style="width: 480px;height: 200px;position: absolute;top: 350px;background-color: white;border-radius: 10px;opacity: 1">
        <img style="width: 200px;height: 200px;float: left;position: relative;left: 5px;opacity: 1.0" src="{{asset('resources/views/home/images/mid.png')}}">
        <div style="width: 50px;height: 200px;float: left;position: relative;left: 5px">
            <p style="position: absolute;top: 20px">支付宝=>></p>
            <p style="position: absolute;bottom: 10px"><<=微信</p>
        </div>
        <img style="width: 200px;height: 200px;float: right;position: relative;right: 20px;opacity: 1.0" src="{{asset('resources/views/home/images/weixin.png')}}">
    </div>
</div>


<header>
    {{--<div><a href="{{url('/')}}"><img style="width: 50px;height: 50px" src="{{asset('resources/views/home/img/55.jpg')}}"></a></div>--}}
    <nav class="topnav" id="topnav" style="margin-bottom: 20px;height: 60px">
        {{--@foreach($navs as $k=>$v)--}}
            {{--@if($v->nav_id>6||$v->nav_id<3)--}}
            {{--<a href="{{$v->nav_url}}"><span>{{$v->nav_name}}</span><span class="en">{{$v->nav_alias}}</span></a>--}}
            {{--@endif--}}
        {{--@endforeach--}}
        <div style="width: 80px;float: left;position: relative;top: -20px"><a href="{{url('/')}}"><img style="width: 80px;height: 80px" src="{{asset('resources/views/home/img/55.jpg')}}"></a></div>
        <a href="{{url('')}}" style="position: relative;top: -20px;"><span>首页</span><span class="en">protal</span></a>
        {{--<a href="http://localhost:8080/blog/index.php/users/login">登录</a>--}}
        <a href="{{url('/users/login3')}}" style="position: relative;top: -10px"><span><img src="{{asset('resources/views/home/img/66.png')}}"></span><span class="en">about</span></a>
        {{--<a href="{{$v->nav_url}}"><span>{{$v->nav_name}}</span><span class="en">{{$v->nav_alias}}</span></a>--}}
    </nav>
</header>

@section('content')
    <h3>
        <p>推荐<span>博客</span></p>
    </h3>
    <ul class="rank">
        @foreach($new as $n)
            <li><a href="{{url('a/'.$n->art_id)}}" title="{{$n->art_title}}" target="_blank">{{$n->art_title}}</a></li>
        @endforeach
    </ul>
    {{--class="ph"--}}
    <h3>
        <p>浏览<span>排行</span></p>
    </h3>
    {{--paih--}}
    <ul class="paih">
        @foreach($hot as $h)
            <li><a href="{{url('a/'.$h->art_id)}}" title="{{$h->art_title}}" target="_blank">{{$h->art_title}}</a></li>
        @endforeach
    </ul>

    <h3>
        <p>博客<span>分类</span></p>
    </h3>
    <ul class="rank">
        @foreach($category as $field)
{{--            <a href="{{url('cate/'.$field->cate_id)}}" class="n2">{{$field->cate_name}}--}}
            {{--_cate_name--}}
            <li><a href="{{url('cate/'.$field->cate_id)}}" title="{{$field->cate_name}}" target="_self">{{$field->cate_name}}</a></li>
        @endforeach
    </ul>

    <h3>
        <p>博客<span>归档</span></p>
    </h3>
    <ul class="rank">
{{--        {{$guidang}}--}}
        {{--@foreach($guidang as $n)--}}
            {{--<li><a href="{{url('a/'.$n->art_id)}}" title="{{$n->art_title}}" target="_blank">{{$n->art_time}}</a></li>--}}
            {{--<li><a href="" title="" target="_blank">{{$n}}</a></li>--}}
        {{--@endforeach--}}

        @foreach($gui as $key => $value)
            <li><a href="{{url('/gui/'.$key.'/'.$value)}}" title="{{$key.'-'.$value}}" target="_self">{{$key.'-'.$value}}</a></li>
            {{--<li><a href="" title="" target="_blank">{{$n}}</a></li>--}}
        @endforeach

    </ul>


    <h3>
        <p>用户<span>功能</span></p>
    </h3>
    <div class="rank" align="center">

        <div style="float: left;margin-right: 30px;margin-left: 30px">
            <a href="{{url('users/register')}}">注册</a>
            {{--<href></href>--}}
        </div>
        <div style="float: left">
            @if(session('user')==null)
                <a href="{{url('users/login')}}">登录</a>
                @else
                <a href="{{url('')}}" onclick="return false">已登录</a>
                @endif

            {{--<href>登录</href>--}}
        </div>
    </div>

@show

{{--<footer>--}}
    {{--<p>{!! Config::get('web.copyright') !!} {!! Config::get('web.web_count') !!}</p>--}}
{{--</footer>--}}
</body>
</html>
