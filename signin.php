<?php
    require './view/top.php';
?>
</head>
<body>
<?php
    require './serve/signin.php';
    require './view/header.php';
?>
<div id="main" class="main" style="min-height: 841px;width: 1280px;margin: 0 auto;padding: 20px 0;">
    <div v-show='status == 0' style="width: 1280px;float: left;background-color: #fff;border-radius: 3px;display: none;">
    	<form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="width: 30%;padding: 100px 0 400px;margin: 0 auto;">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-3 control-label">用户名</label>
		    <div class="col-sm-9">
		      <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="username">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-3 control-label">密码</label>
		    <div class="col-sm-9">
		      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-3 control-label">手机号</label>
		    <div class="col-sm-9">
		      <input type="tel" class="form-control" name="tel" id="inputPassword3" placeholder="tel">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-3 col-sm-9">
		      <div class="checkbox">
		        <label>
		          <input type="checkbox" v-model='check'> <a href="#">同意用户协议</a>
		        </label>
		      </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-3 col-sm-9">
		      <button type="submit" v-on:click='submit' class="btn btn-default btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">申请</button>
		    </div>
		  </div>
		</form>
    </div>
    <div v-show='status == 1' class="alert alert-success" role="alert" style="display: none;">注册成功</div>
    <div v-show='status == 2' class="alert alert-danger" role="alert" style="display: none;">注册失败，请重新注册</div>
</div>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">错误提示</h4>
      </div>
      <div class="modal-body">
      	请同意用户协议
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src='https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js'></script>
<script type="text/javascript" src="https://unpkg.com/vue/dist/vue.js"></script>
<script type="text/javascript">
	new Vue({
	  el: '#main',
	  data: {
	    status: '<?php echo $status;?>',
	    check: false
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