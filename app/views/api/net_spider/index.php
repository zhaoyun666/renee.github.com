<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="/static/css/main.css" />
<link rel="stylesheet" type="text/css" href="/static/css/ace.css" />
<link rel="stylesheet" type="text/css"
	href="/static/css/jqtransform.css" />
	<title>轮丫轮</title>
<style type="text/css">
.demo {
	width: 680px;
	margin: 10px auto;
	color: #333;
	background: #fff
}

form p {
	padding: 4px;
	line-height: 20px;
	clear: both;
	margin: 0px 0px 40px;
}

form p label {
	display: block;
	float: left;
	width: 100px;
	padding-top: 2px
}

.similation{
	width: 60%;
	margin: 0px 20%;
	height: 60px;
}
</style>
<script type="text/javascript"
	src="/static/js/jquery/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/static/js/jquery.jqtransform.js"></script>
<script language="javascript">
$(function(){
	$('.jqtransform').jqTransform();
});
</script>
</head>

<body>
	<div id="header">
		<div class="similation">
			<ul>
				<li><a href="/api/photo/list">相册</a></li>
				<li><a href="/api/index/index">Api模拟</a></li>
				<li><a href="/api/message/index">短信发送</a></li>
				<li><a href="/api/spider/index">网络爬虫</a></li>
			</ul>
		</div>
	</div>

	<div id="main">
		<div class="demo">
			<form class="jqtransform" action="#" method="post">
				<p>
					<label>App：</label> <select name="app">
						<option value="1">车乐</option>
						<option value="2">车乐拍</option>
						<option value="3">大迈</option>
					</select>
				</p>

				<p>
					<label>服务器：</label> <select name="service">
						<option value="1">本地</option>
						<option value="2">测试</option>
						<option value="3">正式</option>
					</select>
				</p>
				
				<p>
					<label>备注：</label>
					<textarea name="note" rows="6" cols="40"></textarea>
				</p>
				
				<p>
					<label>&nbsp;</label><input type="submit" value="提交" /> <input
						type="reset" value="重置" />
				</p>
			</form>
		</div>

	</div>
</body>
</html>
