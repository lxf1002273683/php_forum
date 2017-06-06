<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = 'mydb';
	// 创建连接
	$conn = new mysqli($servername, $username, $password, $dbname);
	// 检测连接
	if ($conn->connect_error) {
	    die("连接失败: " . $conn->connect_error);
	}
	mysqli_query($conn , "set names utf8");

	if($user_article_status === 0){
		//获取cookie
		$user_name = $_COOKIE['user_name'];
		$sql = 'SELECT * FROM article WHERE name="'.$user_name.'"';
		$result = mysqli_query($conn,$sql);
		if(! $result ){
		    die('无法读取数据: ' . mysqli_error($conn));
		}
		$row = mysqli_fetch_all($result, MYSQL_ASSOC);
		if(!count($row)){
			echo '<dir class="no_data">什么都没有发过</dir>';
		}else{
			foreach ($row as $key) {
				echo '<div class="article_list">
		            <a href="/content.php?id='.$key['id'].'" class="article_title">'.$key['title'].'</a>
		            <div class="message">
		              <span class="time">'.date('Y-m-d',strtotime($key['update_time'])).'</span>
		              <span class="num"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span><span>'.$key['comment_num'].'</span></span>
		            </div>
		          </div>';
			}
		}
	}
	if($user_article_status === 1){
		
		$user_name = $_COOKIE['user_name'];
		$sql = 'SELECT * FROM commtent WHERE article_user_name="'.$user_name.'"';
		$result = mysqli_query($conn,$sql);
		if(! $result ){
		    die('无法读取数据: ' . mysqli_error($conn));
		}
		$row = mysqli_fetch_all($result, MYSQL_ASSOC);
		if(!count($row)){
			echo '<dir class="no_data">什么都没有发过</dir>';
		}else{
			foreach ($row as $key) {
				echo '<div class="article_list">
	            <a href="/content.php?id='.$key['article_id'].'" class="article_title">'.$key['article_title'].'</a>
	            <div class="message">
	              <img src="/images/timg.jpg" class="user_img">
	              <div class="comment_area">
	                <div>'.$key['content'].'</div>
	                <span class="comment_time">'.$key['update_data'].'</span>
	              </div>
	            </div>
	          </div>';
			}
		}
	}
	if($user_article_status === 2){
		$user_name = $_COOKIE['user_name'];
		$sql = 'SELECT * FROM commtent WHERE user_name="'.$user_name.'"';
		$result = mysqli_query($conn,$sql);
		if(! $result ){
		    die('无法读取数据: ' . mysqli_error($conn));
		}
		$row = mysqli_fetch_all($result, MYSQL_ASSOC);
		if(!count($row)){
			echo '<dir class="no_data">什么都没有发过</dir>';
		}else{
			foreach ($row as $key=>$value) {
				echo '<div class="panel panel-default">
		            <div class="panel-heading" role="tab" id="headingOne">
		              <h4 class="panel-title">
		                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne'.$key.'" aria-expanded="true" aria-controls="collapseOne'.$key.'">你关注的帖子有新评论</a>
		                <span class="time">'.$value['update_data'].'</span>
		              </h4>
		            </div>
		            <div id="collapseOne'.$key.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
		              <div class="panel-body">
		                 '.$value['article_user_name'].'回答了你的帖子《'.$value['article_title'].'》，<a href="/content.php?id='.$value['article_id'].'">立即查看</a>
		              </div>
		            </div>
		          </div>';
			}
		}
	}
	if(!isset($_COOKIE['user_name'])){
		header("Location: /index.php");
	}
	$conn->close();
?>