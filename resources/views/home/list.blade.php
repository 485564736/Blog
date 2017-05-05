@extends('layouts.home')
@section('info')
    <title>{{$field->cate_name}} - {{Config::get('web.web_title')}}</title>
    <meta name="keywords" content="{{$field->cate_keywords}}" />
    <meta name="description" content="{{$field->cate_description}}" />
@endsection
@section('content')
    <article>
        <h1 class="t_nav"><span>{{$field->cate_title}}</span><a href="{{url('/')}}" class="n1" style="background-color: lightgray;color: black">网站首页</a><a href="{{url('cate/'.$field->cate_id)}}" class="n2" style="background-color: lavender;color: black">{{$field->cate_name}}</a></h1>
        {{--newblog left--}}
        <div class="bloglist left">
            {{--@foreach($data as $d)--}}
            {{--<h2>{{$d->art_title}}</h2>--}}
            {{--<p class="dateview"><span>发布时间：{{date('Y-m-d',$d->art_time)}}</span><span>作者：{{$d->art_author}}</span><span>分类：[<a href="{{url('cate/'.$field->cate_id)}}">{{$field->cate_name}}</a>]</span></p>--}}
            {{--<figure><img src="{{url($d->art_thumb)}}"></figure>--}}
            {{--<ul class="nlist">--}}
                {{--<p>{{$d->art_description}}</p>--}}
                {{--<a title="{{$d->art_title}}" href="{{url('a/'.$d->art_id)}}" target="_blank" class="readmore">阅读全文>></a>--}}
            {{--</ul>--}}
            {{--<div class="line"></div>--}}
            {{--@endforeach--}}

{{--            {{json_encode($data)}}--}}
{{--            {{json_encode($data1)}}--}}

            <P style="display: none">{{$count=0}}</P>
            @foreach($data as $d)
                <h3>{{++$count.'、'.$d->art_title}}</h3>
{{--                {{mktime(0,0,0,8,4,2016)}}--}}
{{--                {{date('Y-m-d', mktime(0,0,0,8,4,2016))}}--}}
{{--            {{date('Y-m-d',1460082363)}}--}}
                {{--<figure><img src="{{url($d->art_thumb)}}"></figure>--}}
                @if($d->art_thumb==''||$d->art_thumb==null)
                    <div style="width: auto;height: 200px;overflow-x: inherit;margin-right: 20px">
                        <ul class="infos">
                            {!! $d->art_content !!}
                        </ul>
                    </div>
{{--                    <a title="{{$d->art_title}}" href="{{url('a/'.$d->art_id)}}" target="_blank" class="readmore"  style="margin-right: 20px;background-color: lightgray;border-radius: 15px;color: black">浏览全文->></a>--}}
                @else
                    <figure><img src="{{asset($d->art_thumb)}}"></figure>
                    <ul>
                        <p>{{$d->art_description}}</p>
{{--                        <a title="{{$d->art_title}}" href="{{url('a/'.$d->art_id)}}" target="_blank" class="readmore" style="background-color: lightgray;border-radius: 15px;color: black">浏览全文->></a>--}}
                    </ul>
                @endif
                <p class="dateview"  style="border-radius: 5px">
                    <span style="position: relative;left: 10px">{{date('Y-m-d',$d->art_time)}}</span>
                    <span>作者：{{$d->art_editor}}</span>
                    <a title="{{$d->art_title}}" href="{{url('a/'.$d->art_id)}}" target="_blank" style="background-color: #65b020;border-radius: 15px;color: black;margin-right: 20px;float: right">浏览全文->></a>
                </p>

                <hr style="margin-right: 20px">
            @endforeach

            <div class="page">
                {{$data->links()}}
            </div>
        </div>
        <aside class="right">
            {{--@if($submenu->all())--}}
            {{--<div class="rnav">--}}
                {{--<ul>--}}
                    {{--@foreach($submenu as $k=>$s)--}}
                    {{--<li class="rnav{{$k+1}}"><a href="{{url('cate/'.$s->cate_id)}}" target="_blank">{{$s->cate_name}}</a></li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--@endif--}}

            <!-- Baidu Button BEGIN -->
            <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
            <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
            <script type="text/javascript" id="bdshell_js"></script>
            <script type="text/javascript">
                document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
            </script>
            <!-- Baidu Button END -->

            <div class="news" style="float:left;">
                @parent
            </div>
        </aside>
    </article>
@endsection


