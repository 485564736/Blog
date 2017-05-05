<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">

	<link rel="stylesheet" href="{{asset('resources/views/home/css/common.css')}}"/>

	<script type="text/javascript" src="{{asset('resources/views/home/js/jquery.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('resources/views/admin/style/js/ch-ui.admin.js')}}"></script>
	<script type="text/javascript" src="{{asset('resources/org/layer/layer.js')}}"></script>
</head>
<body style="background:#F3F3F4;">
<div class="login_box">
	<h1>Blog</h1>
	{{--<h2>用户-博客管理平台</h2>--}}
	{{--<div class="form">--}}
	{{--@if(session('msg'))--}}
	{{--<p style="color:red">{{session('msg')}}</p>--}}
	{{--@endif--}}
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
	{{--<img src="{{url('users/code')}}" alt="" onclick="this.src='{{url('users/code')}}?'+Math.random()">--}}
	{{--</li>--}}
	{{--<li>--}}
	{{--<input type="submit" value="立即登陆"/>--}}
	{{--</li>--}}
	{{--</ul>--}}
	{{--</form>--}}
	{{--<p><a href="#">返回首页</a> &copy; 2016 Powered by <a href="http://www.houdunwang.com" target="_blank">http://www.houdunwang.com</a></p>--}}
	{{--</div>--}}


	<div id="dialogBg"></div>
	<div id="dialog" class="animated">
		<img class="dialogIco" width="50" height="50" src="{{asset('resources/views/home/images/ico.png')}}" alt="" />
		<div class="dialogTop">
			<a href="javascript:;" class="claseDialogBtn">关闭</a>
		</div>
		@if(session('msg'))
			<p style="color:red">{{session('msg')}}</p>
		@endif
		<form action="" method="post" id="editForm">
			<ul class="editInfos">
				<li><label><font color="#ff0000">* </font>用户名：<input type="text" id="user_name" name="" required value="" class="ipt" /></label></li>
				<li><label><font color="#ff0000">* </font>密  码：<input type="text" id="user_pass" name="" required value="" class="ipt" /></label></li>
				<li><label><font color="#ff0000">* </font>验证码：<input type="text" id="code" name="" required value="" class="ipt" /></label></li>
				<li>
					<div align="center">
						<img src="{{url('admin/code')}}" alt="" onclick="this.src='{{url('admin/code')}}?'+Math.random()">
					</div>
				</li>
				<li style="align-items: center">
					<input style="text-align: center" type="button" id="queren" value="确认提交" class="submitBtn" onsubmit="return false" />
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

        //            $('#dialogBg').fadeIn(300);
        $('#dialog').removeAttr('class').addClass('animated '+'rollIn'+'').fadeIn();

        $(function(){
            getSrceenWH();

            //关闭弹窗
            $('.claseDialogBtn').click(function(){
                $('#dialogBg').fadeOut(300,function(){
                    $('#dialog').addClass('bounceOutUp').fadeOut();
                    location.href = location.href;
                });
            });

            document.getElementById('queren').onclick=function () {
                var user_name=document.getElementById('user_name').value;
                var user_pass=document.getElementById('user_pass').value;
                var code=document.getElementById('code').value;
                $.post("{{url('admin/login1')}}",{'user_name':user_name,'user_pass':user_pass,'code':code,'_token':"{{csrf_token()}}"},function (data) {
                    if(data.status==0){
//                                location.href = location.href;
                        layer.msg(data.msg, {icon: 5});
                    }else{
                        $('#dialogBg').fadeOut(300,function(){
                            $('#dialog').addClass('bounceOutUp').fadeOut();
                            layer.msg(data.msg, {icon: 6});
                            location.href = location.href.substr(0,location.href.length-5)+'index';
                        });
                    }
                });
            }
        });
	</script>

</div>
</body>
</html>