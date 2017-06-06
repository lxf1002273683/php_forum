<?php
    require './view/top.php';
?>
<script type="text/javascript" src="/js/wangEditor.min.js"></script>
<script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/wangEditor.min.css">
<style type="text/css">
	#content{
		height: 440px;
	}
	.form_publish{
		padding: 40px 0;
	}
	.publish{
		display: inline-block;
	    overflow: visible;
	    padding: 0 22px;
	    height: 30px;
	    width: 100px;
	    line-height: 30px;
	    text-align: center;
	    border-radius: 3px;
	    -moz-border-radius: 3px;
	    -webkit-border-radius: 3px;
	    font-size: 14px;
	    cursor: pointer;
	    background-color: #44b549;
	    outline: none;
	    color: white;
	    margin: 30px;
	    float: right;
	    border: none;
	}
	.publish:hover{
		background-color: green;
	}
	.title{
		border:none;
		width: 100%;
		height: 48px;
		line-height: 24px;
		outline: none;
		background-color: #f8f9fb;
		padding: 0 20px;
	}
</style>
</head>
<body>
<?php
    require './view/header.php';
    require './serve/issue.php';
?>
<div class="main" style="min-height: 841px;width: 1120px;margin: 0 auto;">
	<form class="form_publish" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<input type="text" name="title" placeholder="标题" class="title">
	    <div id="content">
	    </div>
	    <input type="submit" value="发表" class="publish">
	    <input type="hidden" name="content" value="发表" class="hidden_text">
    </form>
</div>
<script type="text/javascript">
    $(function () {
        var editor = new wangEditor('content');
        editor.create();
        $('.publish').on('click',function(){
        	var html = editor.$txt.html();
        	$('.hidden_text').val(html);
        })
    });
</script>
<?php
    require './view/footer.php';
?>