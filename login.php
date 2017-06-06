<?php
    require './view/top.php';
?>
</head>
<body>
<?php
	require './serve/login.php';
    require './view/header.php';
?>
<div id="main" class="main" style="min-height: 841px;width: 1280px;margin: 0 auto;padding: 20px 0;">
    <div style="width: 1280px;float: left;background-color: #fff;border-radius: 3px;position: relative;">
    	<form class="form-horizontal"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="width: 30%;padding: 100px 0 400px;margin: 0 auto;">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-3 control-label">用户名</label>
		    <div class="col-sm-9">
		      <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="username">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-3 control-label">密码</label>
		    <div class="col-sm-9">
		      <input type="password" name='password' class="form-control" id="inputPassword3" placeholder="Password">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-3 col-sm-3">
		      <div class="checkbox">
		        <a href="./signin">申请帐号</a>
		      </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-3 col-sm-9">
		      <button type="submit" class="btn btn-default">登录</button>
		    </div>
		  </div>
		</form>
    	<div v-show='user_nonentity' class="alert alert-danger" role="alert" style="display: none;position: absolute;top: 10px;width: 100%;text-align: center;">用户或者密码错误</div>
    </div>
</div>
<script type="text/javascript" src="https://unpkg.com/vue/dist/vue.js"></script>
<script type="text/javascript">
	new Vue({
	  el: '#main',
	  data: {
	    user_nonentity: '<?php echo $user_nonentity;?>'
	  },
	  methods: {
	  	submit: function(event){
	  		event.preventDefault();
	  		if(this.check){
	  			$(event.target).parents('form')[0].submit();
	  		}
	  	}
	  }
	})
</script>
<?php
    require './view/footer.php';
?>