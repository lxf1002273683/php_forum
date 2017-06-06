<?php
    require './view/top.php';
?>
<link rel="stylesheet" type="text/css" href="/css/index.css?5">
</head>
<body>
<?php
    require './view/header.php';
?>
<div class="main" style="min-height: 841px;width: 1280px;margin: 0 auto;padding: 20px 0;">
    <div class="main_area">
    	<h4>官方公告</h4>
    	<div class="publish">
    		<a href="/issue.php"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 发表新贴</a>
    	</div>
    	<ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">未解决</a></li>
		    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">已解决</a></li>
		    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">全部</a></li>
		</ul>
		<div class="tab-content content_main">
			<div role="tabpanel" class="tab-pane active" id="home">
				<?php
					$index_status = 0;
					require './serve/index.php';
				?>
			</div>
			<div role="tabpanel" class="tab-pane" id="profile">
				<?php
					$index_status = 1;
					require './serve/index.php';
				?>
			</div>
			<div role="tabpanel" class="tab-pane" id="settings">
				<?php
					$index_status = 2;
					require './serve/index.php';
				?>
			</div>
		</div>
	</div>
		<div class="announcement">
			<h4>官方公告</h4>
			<a href="#">开发者问题反馈模版</a>
			<a href="#">微信开发者社区管理规定v1.0</a>
			<a href="#">微信小程序常见FAQ</a>
			<a href="#">微信小程序接入指南</a>
			<a href="#">微信小程序平台常见拒绝情形</a>
		</div>
</div>
<?php
    require './view/footer.php';
?>