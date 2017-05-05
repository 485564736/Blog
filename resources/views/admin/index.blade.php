@extends('layouts.admin')
<style type="text/css">
	a:hover{
		color: red;
		text-decoration: underline;
	}
</style>
@section('content')
		<!--头部 开始-->
<div class="top_box" style="background-color: #EEEEEE">
	<div class="top_left">
		{{--<div class="logo">系统管理员后台管理</div>--}}
		<img style="position: relative;left: 50px;opacity: 0.3;border-radius: 20px" src="{{asset('resources/views/home/img/66.png')}}">
		<ul>
			{{--<li><a href="{{url('/')}}" target="_blank" class="active">去首页</a></li>--}}
{{--			<li><a href="{{url('admin/category')}}" target="main">管理页</a></li>--}}
		</ul>
	</div>
	<div class="top_right">
		<ul>
			<li><span style="color: black">博客系统管理员：admin</span></li>
{{--			<li><a href="{{url('admin/pass')}}" target="main">修改密码</a></li>--}}
			<li><a href="{{url('admin/quit')}}"><span style="color: black">退出</span></a></li>
		</ul>
	</div>
</div>
<!--头部 结束-->

<!--左侧导航 开始-->
<div class="menu_box" style="background-color: #EEEEEE">
	<ul>
		<li>
			<h3><i class="fa fa-fw fa-clipboard"></i>信息管理</h3>
			<ul class="sub_menu" style="">
				<li><a href="{{url('admin/category/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加分类</a></li>
				<li><a href="{{url('admin/category')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>分类列表</a></li>
{{--				<li><a href="{{url('admin/article/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加文章</a></li>--}}
				<li><a href="{{url('admin/article')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>文章列表</a></li>
				<li><a href="{{url('admin/comment')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>评论列表</a></li>
				<li><a href="{{url('admin/user')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>用户列表</a></li>

				<li><a href="{{url('admin/recomart')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>推荐博文</a></li>
			</ul>
		</li>
		{{--<li>--}}
			{{--<h3><i class="fa fa-fw fa-cog"></i>系统设置</h3>--}}
			{{--<ul class="sub_menu" style="display: block;">--}}
				{{--<li><a href="{{url('admin/links')}}" target="main"><i class="fa fa-fw fa-cubes"></i>友情链接</a></li>--}}
				{{--<li><a href="{{url('admin/navs')}}" target="main"><i class="fa fa-fw fa-navicon"></i>自定义导航</a></li>--}}
				{{--<li><a href="{{url('admin/config')}}" target="main"><i class="fa fa-fw fa-cogs"></i>网站配置</a></li>--}}
			{{--</ul>--}}
		{{--</li>--}}
	</ul>
</div>
<!--左侧导航 结束-->

<!--主体部分 开始-->
<div class="main_box">
	<iframe src="{{url('admin/category')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
</div>
<!--主体部分 结束-->

<!--底部 开始-->
{{--<div class="bottom_box">--}}
	{{--CopyRight © 2015. Powered By <a href="http://www.houdunwang.com">http://www.houdunwang.com</a>.--}}
{{--</div>--}}
<!--底部 结束-->

@endsection


