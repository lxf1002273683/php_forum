    <nav class="navbar navbar-default" style="background-color: #fff;">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/index.php" style="font-size: 24px;">减减肥</a></li>
      </ul>
      	<?php
		  	$path = $_SERVER['SCRIPT_NAME'];
		  	$urlname = basename($path,".php");
		  	$pathArr = ['login', 'changePassword', 'signin'];
		  	$htmlStr = '<ul class="nav navbar-nav navbar-right">
	  			        <li><a href="/index.php">社区</a></li>
	  			        <li><a href="/login.php">登录</a></li>
	  			      </ul>';
	  		$statusCode = in_array($urlname, $pathArr);
		  	if(!$statusCode && !isset($_COOKIE['user_name'])){
		  		echo $htmlStr;
		  	}
	  		//用户有登录缓存
	  		if(isset($_COOKIE['user_name'])){
				$htmlStr = '<ul class="nav navbar-nav navbar-right">
	  			        <li><a href="/index.php">社区</a></li>
	  			        <li class="dropdown">
	  			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$_COOKIE['user_name'].'<span class="caret"></span></a>
	  			          <ul class="dropdown-menu">
	  			            <li><a href="/user/index.php">我的</a></li>
	  			            <li><form method="get" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'"><input type="hidden" name="user_name" value="'.$_COOKIE['user_name'].'"/><input type="submit" value="退出" style="background-color: white;border: none;display: block;padding: 3px 20px;clear: both;font-weight: 400;line-height: 1.42857143;color: #333;white-space: nowrap; outline: none;" /></form></li>
	  			          </ul>
	  			        </li>
	  			      </ul>';
	  			echo $htmlStr;
			}
	  		
		  	//注册成功
		  	if($urlname == 'signin'){
		  		if($status == 1){
					setcookie('user_name',$user_name, time()+3600);
		  			$htmlStr = '<ul class="nav navbar-nav navbar-right">
	  			        <li><a href="/index.php">社区</a></li>
	  			        <li class="dropdown">
	  			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$user_name.'<span class="caret"></span></a>
	  			          <ul class="dropdown-menu">
	  			            <li><a href="/user/index.php">我的</a></li>
	  			            <li><form method="get" action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'"><input type="hidden" name="user_name" value="'.$user_name.'"/><input type="submit" value="退出" style="background-color: white;border: none;display: block;padding: 3px 20px;clear: both;font-weight: 400;line-height: 1.42857143;color: #333;white-space: nowrap; outline: none;" /></form></li>
	  			          </ul>
	  			        </li>
	  			      </ul>';
		  		echo $htmlStr;
		  		}
		  	}
		  	//退出登录
		  	if($_SERVER["REQUEST_METHOD"] == "GET"){
				if(isset($_GET['user_name'])){
					setcookie("user_name", "", time()-3800);
	  				header("Location: /index.php");
				}
			}
		?>
      
    </div>
  </div>
</nav>