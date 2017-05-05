@extends('layouts.home')
@section('info')
    <title>{{Config::get('web.web_title')}}{{Config::get('web.seo_title')}}</title>
    {{--<meta name="keywords" content="{{Config::get('web.keywords')}}" />--}}
    {{--<meta name="description" content="{{Config::get('web.description')}}" />--}}



@endsection

@section('content')

    {{--<link rel="stylesheet" href="{{asset('resources/views/home/bootstrap-3.3.7-dist/css/bootstrap.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('resources/views/home/css/lrtk.css')}}" />--}}

    <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{asset('resources/views/admin/style/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/views/admin/style/js/ch-ui.admin.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>



    <link href="{{asset('resources/views/home/css/jquery.slideBox.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('resources/views/home/js/jquery-1.7.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('resources/views/home/js/jquery.slideBox.js')}}" type="text/javascript"></script>


    {{--<script type="text/javascript" src="{{asset('resources/views/home/js/jquery.min.js')}}"></script>--}}
    {{--<script type="text/javascript" src="{{asset('resources/views/home/js/jquery.imgbox.pack.js')}}"></script>--}}
    {{--<script type="text/javascript">--}}
        {{--$(document).ready(function() {--}}
            {{--$("#example1-1").imgbox();--}}

            {{--$("#example1-2").imgbox({--}}
                {{--'zoomOpacity'	: true,--}}
                {{--'alignment'		: 'center'--}}
            {{--});--}}

            {{--$("#example1-3").imgbox({--}}
                {{--'speedIn'		: 0,--}}
                {{--'speedOut'		: 0--}}
            {{--});--}}

            {{--$("#example2-1, #example2-2").imgbox({--}}
                {{--'speedIn'		: 0,--}}
                {{--'speedOut'		: 0,--}}
                {{--'alignment'		: 'center',--}}
                {{--'overlayShow'	: true,--}}
                {{--'allowMultiple'	: false--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}

    {{--<script type="text/javascript" src="{{asset('resources/views/home/bootstrap-3.3.7-dist/js/bootstrap.js')}}"></script>--}}
<style type="text/css">
    /*a:hover{*/
        /*color: aqua;*/
        /*text-decoration: underline;*/
    /*}*/
</style>


    <script>
        jQuery(function($){
            $('#demo1').slideBox();
            $('#demo2').slideBox({
                direction : 'top',//left,top#方向
                duration : 0.3,//滚动持续时间，单位：秒
                easing : 'linear',//swing,linear//滚动特效
                delay : 5,//滚动延迟时间，单位：秒
                startIndex : 1//初始焦点顺序
            });
            $('#demo3').slideBox({
                duration : 0.3,//滚动持续时间，单位：秒
                easing : 'linear',//swing,linear//滚动特效
                delay : 5,//滚动延迟时间，单位：秒
                hideClickBar : false,//不自动隐藏点选按键
                clickBarRadius : 10
            });
            $('#demo4').slideBox({
                hideBottomBar : true//隐藏底栏
            });

            $('#demo1 img').css({'width':document.body.clientWidth-800 +'px','height':'300px'});
        });


    </script>


    {{--<div style="height: 30px;"></div>--}}
    <hr style="color: ghostwhite;">
    <div align="center" style="background-color: ghostwhite;">
    <div id="demo1" class="slideBox">
        <ul class="items">

            <li><a href="" title=""><img src="{{asset('resources/views/home/img/11.png')}}"></a></li>
            <li><a href="" title=""><img src="{{asset('resources/views/home/img/12.png')}}"></a></li>
            <li><a href="" title=""><img src="{{asset('resources/views/home/img/13.png')}}"></a></li>
            <li><a href="" title=""><img src="{{asset('resources/views/home/img/14.png')}}"></a></li>
            <li><a href="" title=""><img src="{{asset('resources/views/home/img/15.png')}}"></a></li>
            <li><a href="" title=""><img src="{{asset('resources/views/home/img/17.png')}}"></a></li>

            <li><a href="" title=""><img src="{{asset('resources/views/home/img/13.png')}}"></a></li>
            <li><a href="" title=""><img src="{{asset('resources/views/home/img/14.png')}}"></a></li>



{{--            <li><a href="" title=""><img src="{{asset('resources/views/home/img/1.jpg')}}"></a></li>--}}
{{--            <li><a href="" title=""><img src="{{asset('resources/views/home/img/2.jpg')}}"></a></li>--}}
{{--            <li><a href="" title=""><img src="{{asset('resources/views/home/img/3.jpg')}}"></a></li>--}}
{{--            <li><a href="" title=""><img src="{{asset('resources/views/home/img/4.jpg')}}"></a></li>--}}
{{--            <li><a href="" title=""><img src="{{asset('resources/views/home/img/5.jpg')}}"></a></li>--}}

            {{--<li><a href="" title=""><img src="{{asset('resources/views/home/img/5.jpg')}}"></a></li>--}}
            {{--<li><a href="" title=""><img src="{{asset('resources/views/home/img/5.jpg')}}"></a></li>--}}

            {{--<li><a href="" title=""><img src="{{asset('resources/views/home/img/11.png')}}"></a></li>--}}

        </ul>
    </div>
    </div>


    {{--<div class="slideshow" style="height: 200px; margin-top:15px;overflow: hidden">--}}
        {{--<div class="slide"><img src="{{asset('resources/views/home/img/1.jpg')}}"></div>--}}
        {{--<div class="slide"><img src="{{asset('resources/views/home/img/2.jpg')}}"></div>--}}
        {{--<div class="slide"><img src="{{asset('resources/views/home/img/3.jpg')}}"></div>--}}
        {{--<div class="slide"><img src="{{asset('resources/views/home/img/4.jpg')}}"></div>--}}
        {{--<div class="slide"><img src="{{asset('resources/views/home/img/5.jpg')}}"></div>--}}
    {{--</div>--}}
    {{--<!--<div class="slideshow-nocycle" style="height: 0; overflow: hidden">--}}
          {{--<div class="slide"><img src="./images/1000x400_b.png"></div>--}}
          {{--<div class="slide"><img src="./images/300x500_p.png"></div>--}}
          {{--<div class="slide"><img src="./images/500x300_y.png"></div>--}}
          {{--<div class="slide"><img src="./images/300x500_p.png"></div>--}}
        {{--</div> -->--}}

    {{--<!--<div class="slideshow">--}}

          {{--<div class="slide" style="background: green;">Text 1</div>--}}
          {{--<div class="slide" style="background: red;">Text 2</div>--}}
          {{--<div class="slide" style="background: yellow;">Text 3</div>--}}
          {{--<div class="slide" style="background: blue;">Text 4</div>--}}

    {{--</div> -->--}}

    {{--<script src="{{asset('resources/views/home/js/jquery-1.11.0.min.js')}}" type="text/javascript"></script>--}}
    {{--<script src="{{asset('resources/views/home/js/imagesloaded.js')}}"></script>--}}
    {{--<script src="{{asset('resources/views/home/js/smartresize.js')}}"></script>--}}
    {{--<script src="{{asset('resources/views/home/src/jquery.skidder.js')}}"></script>--}}
    {{--<script type="text/javascript">--}}
        {{--$('.slideshow').each( function() {--}}
            {{--var $slideshow = $(this);--}}
            {{--$slideshow.imagesLoaded( function() {--}}
                {{--$slideshow.skidder({--}}
                    {{--slideClass    : '.slide',--}}
                    {{--animationType : 'css',--}}
                    {{--scaleSlides   : true,--}}
                    {{--maxWidth : 1300,--}}
                    {{--maxHeight: 500,--}}
                    {{--paging        : true,--}}
                    {{--autoPaging    : true,--}}
                    {{--pagingWrapper : ".skidder-pager",--}}
                    {{--pagingElement : ".skidder-pager-dot",--}}
                    {{--swiping       : true,--}}
                    {{--leftaligned   : false,--}}
                    {{--cycle         : true,--}}
                    {{--jumpback      : false,--}}
                    {{--speed         : 400,--}}
                    {{--autoplay      : false,--}}
                    {{--autoplayResume: false,--}}
                    {{--interval      : 4000,--}}
                    {{--transition    : "slide",--}}
                    {{--afterSliding  : function() {},--}}
                    {{--afterInit     : function() {}--}}
                {{--});--}}
            {{--});--}}
        {{--});--}}
        {{--// $('.slideshow-nocycle').each( function() {--}}
        {{--//   var $slideshow = $(this);--}}
        {{--//   $slideshow.imagesLoaded( function() {--}}
        {{--//     $slideshow.skidder({--}}
        {{--//       slideClass    : '.slide',--}}
        {{--//       scaleSlides   : true,--}}
        {{--//       maxWidth : 1300,--}}
        {{--//       maxHeight: 500,--}}
        {{--//       leftaligned   : true,--}}
        {{--//       cycle         : false,--}}
        {{--//       paging        : true,--}}
        {{--//       swiping       : true,--}}
        {{--//       jumpback      : false,--}}
        {{--//       speed         : 400,--}}
        {{--//       autoplay      : false,--}}
        {{--//       interval      : 4000,--}}
        {{--//       afterSliding  : function() {}--}}
        {{--//     });--}}
        {{--//   });--}}
        {{--// });--}}
        {{--$(window).smartresize(function(){--}}
            {{--$('.slideshow').skidder('resize');--}}
        {{--});--}}
    {{--</script>--}}

    {{--<div class="banner">--}}
        {{--<section class="box">--}}
            {{--<ul class="texts">--}}
                {{--<p>打了死结的青春，捆死一颗苍白绝望的灵魂。</p>--}}
                {{--<p>为自己掘一个坟墓来葬心，红尘一梦，不再追寻。</p>--}}
                {{--<p>加了锁的青春，不会再因谁而推开心门。</p>--}}
            {{--</ul>--}}
            {{--<div class="avatar"><a href="#"><span>后盾</span></a> </div>--}}
        {{--</section>--}}
    {{--</div>--}}
    {{--<div class="template">--}}
        {{--<div class="box">--}}
            {{--<h3>--}}
                {{--<p><span>站长</span>推荐 Recommend</p>--}}
            {{--</h3>--}}
            {{--<ul>--}}
                {{--@foreach($pics as $p)--}}
                {{--<li><a href="{{url('a/'.$p->art_id)}}"  target="_blank"><img src="{{url($p->art_thumb)}}"></a><span>{{$p->art_title}}</span></li>--}}
                    {{--<li><a href="{{url('a/'.$p->art_id)}}"  target="_blank"><img src="{{$p->art_thumb}}"></a><span>{{$p->art_title}}</span></li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
    <article class="blogs">
        <h2 class="title_tj">
            <p><span>最新</span>博客</p>
        </h2>
        <div class="bloglist left">

            <P style="display: none">{{$count=0}}</P>
{{--@php(--}}
{{--require 'SensitiveWordFilter.php';--}}
{{--$filter = new SensitiveWordFilter(__DIR__ . '/11.txt')--}}
{{--)--}}
<!--            --><?php
//            require 'SensitiveWordFilter.php';
//            $filter = new SensitiveWordFilter(__DIR__ . '/11.txt');
//            ?>
            @foreach($data as $d)
                <a title="{{$d->art_title}}" href="{{url('a/'.$d->art_id)}}" target="_blank" style="text-decoration: none;border-bottom: 1px solid blue;">
            <h3>{{++$count.'、'.$d->art_title}}</h3></a>
            {{--<figure><img src="{{url($d->art_thumb)}}"></figure>--}}
                @if($d->art_thumb==''||$d->art_thumb==null)
                    <div style="width: auto;height: 200px;overflow-x: inherit;margin-right: 20px">
                    <ul class="infos">
                        {{--@php(--}}
                        {{----}}
                        {{--$filter->filter($d->art_content, 10)--}}
                        {{--)--}}
                        {!! $d->art_content !!}
                    </ul>
                    </div>
                    {{--<a title="{{$d->art_title}}" href="{{url('a/'.$d->art_id)}}" target="_blank" class="readmore" style="margin-right: 20px;background-color: lightgray;border-radius: 15px;color: black">浏览全文->></a>--}}
                @else
                <figure><img src="{{asset($d->art_thumb)}}"></figure>
            <ul>
                <p>{{$d->art_description}}</p>

            </ul>
                    {{--<a title="{{$d->art_title}}" href="{{url('a/'.$d->art_id)}}" target="_blank" class="readmore" style="background-color: lightgray;border-radius: 15px;color: black;margin-right: 20px;">浏览全文->></a>--}}
                @endif
            <p class="dateview" style="border-radius: 5px">
                <span style="position: relative;left: 10px">{{date('Y-m-d',$d->art_time)}}</span>
                <a href="{{url('artuser/'.$d->user_id)}}">
                <span>作者：{{$d->art_editor}}</span>
                </a>
                {{--background-color: #F6F6F6--}}
                <button style="border: 0px;width: 50px;position: relative;top: 4px;background-color: #F6F6F6" onclick="praise({{$d->art_id}})"><img style="width: 18px;height: 18px;float: left" src="{{asset('resources/views/home/images/99.png')}}"><span style="float: left">赞</span></button>
                <button style="border: 0px;width: 60px;position: relative;top: 4px;background-color: #F6F6F6" onclick="attention({{$d->user_id}})"><img style="width: 18px;height: 18px;float: left" src="{{asset('resources/views/home/images/88.png')}}"><span style="float: left">关注</span></button>
                <button style="border: 0px;width: 60px;position: relative;top: 4px;background-color: #F6F6F6" onclick="word({{$d->user_id}},'你好')"><img style="width: 18px;height: 18px;float: left" src="{{asset('resources/views/home/images/77.png')}}"><span style="float: left">留言</span></button>
                <button style="border: 0px;width: 60px;position: relative;top: 4px;background-color: #F6F6F6" onclick="reward(event)"><img style="width: 18px;height: 18px;float: left" src="{{asset('resources/views/home/images/7.png')}}"><span style="float: left">打赏</span></button>


                <script>
                    function praise(art_id) {
                        $.post("{{url('praise/')}}/"+art_id,{'_token':"{{csrf_token()}}"},function (data) {
                            if(data.status==0){
//                                location.href = location.href;
                                layer.msg(data.msg, {icon: 5});
                            }else{
                                layer.msg(data.msg, {icon: 6});
                            }
                        });
                    }


                    function attention(user_id) {
                        $.post("{{url('attention/')}}/"+user_id,{'_token':"{{csrf_token()}}"},function (data) {
                            if(data.status==0){
//                                location.href = location.href;
                                layer.msg(data.msg, {icon: 5});
                            }else{
                                layer.msg(data.msg, {icon: 6});
                            }
                        });
                    }

                    function reward(event) {

                        var aa=document.getElementById('erweima1');
                        $(window).height();
                        aa.style.top=event.pageY-250+'px';
                        aa.style.left=event.pageX-200 +'px';
                        $("#erweima").css('height',document.body.scrollHeight+'px').fadeIn("slow");
                        event.stopPropagation();
//                        alert(event.clientY);
//                        aa.style.display=(aa.style.display=='block')?'none':'block';

//                        aa.style.left=event.clientX;
                    }

                    window.onscroll=function () {
                        $("#erweima").fadeOut("slow");
                    }

                    document.getElementById('body1').on

                    document.getElementById('body1').onclick=function () {
                        $("#erweima").fadeOut("slow");
                    }

                    function word(user_id,word_content) {

//                        $('#dialogBg').fadeIn(300);
//                        $('#dialog').removeAttr('class').addClass('animated '+'rollIn'+'').fadeIn();

//                        JQuery.prompt('asdfdasf','fsdadf');
                        var namee = prompt("请输入留言", "");
                        if (namee&&namee!='')//如果返回的有内容
                        {
//                            alert("欢迎您：" + name)
                            $.post("{{url('word/')}}/"+user_id,{'word_content':namee,'_token':"{{csrf_token()}}"},function (data) {
                                if(data.status==0){
//                                location.href = location.href;
                                    layer.msg(data.msg, {icon: 5});
                                }else{
                                    layer.msg(data.msg, {icon: 6});
                                }
                            });
                        }
                    }
                </script>


{{--                @if($d->art_thumb!=''||$d->art_thumb!=null)--}}
                <a title="{{$d->art_title}}" href="{{url('a/'.$d->art_id)}}" target="_blank" style="border-radius: 15px;color: black;margin-right: 20px;float: right;background-color: #65b020">浏览全文->></a>
                {{--@endif--}}
            </p>
            <hr style="margin-right: 20px">
            @endforeach
            <div class="page">
                {{$data->links()}}
            </div>
        </div>


        {{--<link rel="stylesheet" href="{{asset('resources/views/home/css/common.css')}}"/>--}}

        {{--<script type="text/javascript" src="{{asset('resources/views/home/js/jquery.min.js')}}"></script>--}}

        {{--<div id="dialogBg"></div>--}}
        {{--<div id="dialog" class="animated">--}}
            {{--<img class="dialogIco" width="50" height="50" src="{{asset('resources/views/home/images/ico.png')}}" alt="" />--}}
            {{--<div class="dialogTop">--}}
                {{--<a href="javascript:;" class="claseDialogBtn">关闭</a>--}}
            {{--</div>--}}
            {{--<form action="{{url('users/login1/'.$field->art_id)}}" method="post" id="editForm">--}}
                {{--<ul class="editInfos">--}}
                    {{--<li><label><font color="#ff0000">* </font>用户名：<input type="text" id="user_name" name="" required value="" class="ipt" /></label></li>--}}
                    {{--<li><label><font color="#ff0000">* </font>密  码：<input type="text" id="user_pass" name="" required value="" class="ipt" /></label></li>--}}
                    {{--<li><label><font color="#ff0000">* </font>验证码：<input type="text" id="code" name="" required value="" class="ipt" /></label></li>--}}
                    {{--<li>--}}
                        {{--<div align="center">--}}
                            {{--<img src="{{url('admin/code')}}" alt="" onclick="this.src='{{url('admin/code')}}?'+Math.random()">--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<input type="button" id="queren" value="确认提交" class="submitBtn" onsubmit="return false" />--}}
                        {{--<input type="submit" value="确认提交" class="submitBtn" />--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</form>--}}
        {{--</div>--}}

        {{--<script type="text/javascript">--}}
            {{--var w,h,className;--}}
            {{--function getSrceenWH(){--}}
                {{--w = $(window).width();--}}
                {{--h = $(window).height();--}}
                {{--$('#dialogBg').width(w).height(h);--}}
            {{--}--}}

            {{--window.onresize = function(){--}}
                {{--getSrceenWH();--}}
            {{--}--}}
            {{--$(window).resize();--}}

            {{--$(function(){--}}
                {{--getSrceenWH();--}}

                {{--//关闭弹窗--}}
                {{--$('.claseDialogBtn').click(function(){--}}
                    {{--$('#dialogBg').fadeOut(300,function(){--}}
                        {{--$('#dialog').addClass('bounceOutUp').fadeOut();--}}
                    {{--});--}}
                {{--});--}}

                {{--document.getElementById('queren').onclick=function () {--}}
                    {{--var user_name=document.getElementById('user_name').value;--}}
                    {{--var user_pass=document.getElementById('user_pass').value;--}}
                    {{--var code=document.getElementById('code').value;--}}
                    {{--$.post("{{url('users/login1')}}",{'user_name':user_name,'user_pass':user_pass,'code':code,'_token':"{{csrf_token()}}"},function (data) {--}}
                        {{--if(data.status==0){--}}
{{--//                                location.href = location.href;--}}
                            {{--layer.msg(data.msg, {icon: 6});--}}
                        {{--}else{--}}
                            {{--$('#dialogBg').fadeOut(300,function(){--}}
                                {{--$('#dialog').addClass('bounceOutUp').fadeOut();--}}
                                {{--layer.msg(data.msg, {icon: 5});--}}
                            {{--});--}}

                        {{--}--}}
                    {{--});--}}
                {{--}--}}
            {{--});--}}
        {{--</script>--}}

        <aside class="right">
            <!-- Baidu Button BEGIN -->
            {{--<div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>--}}
            {{--<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>--}}
            {{--<script type="text/javascript" id="bdshell_js"></script>--}}
            {{--<script type="text/javascript">--}}
                {{--document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)--}}
            {{--</script>--}}
            <!-- Baidu Button END -->

            <div class="news" style="float:left;">
                @parent
                {{--<h3 class="links">--}}
                    {{--<p>友情<span>链接</span></p>--}}
                {{--</h3>--}}
                {{--<ul class="website">--}}
                    {{--@foreach($links as $l)--}}
                    {{--<li><a href="{{$l->link_url}}" target="_blank">{{$l->link_name}}</a></li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            </div>

        </aside>
    </article>
@endsection