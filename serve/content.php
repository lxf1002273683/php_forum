<?php
	if(!isset($_COOKIE['user_name'])){
		header("Location: /index.php");
	}
	if(!isset($_GET['id'])){
		header("Location: /index.php");
	}
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

	//获取cookie
	$id = $_GET['id'];
	//获取帖子信息
	$sql = 'SELECT * FROM article WHERE id="'.$id.'"';
	$result = mysqli_query($conn,$sql);
	if(! $result ){
	    die('无法读取数据: ' . mysqli_error($conn));
	}
	$row = mysqli_fetch_all($result, MYSQL_ASSOC);
	//获取评论信息
	$sql_comment = 'SELECT * FROM commtent WHERE article_id="'.$id.'"';
	$result_comment = mysqli_query($conn,$sql_comment);
	if(! $result_comment ){
	    die('无法读取数据: ' . mysqli_error($conn));
	}
	$result_comment = mysqli_fetch_all($result_comment, MYSQL_ASSOC);

	if(!count($row)){
		echo '<dir class="no_data">什么都没有</dir>';
	}else{
        echo '<div class="user_content">
			    <h4>'.$row[0]['title'].'</h4>
			    <div class="row">
			      <div class="col-md-6">'.date('Y-m-d',strtotime($row[0]['update_time'])).'</div>
			      <div class="col-md-6"><span aria-hidden="true" class="glyphicon glyphicon-comment"></span>'.$row[0]['comment_num'].'</div>
			    </div>
			    <div class="content_text">
			      '.$row[0]['content'].'
			    </div>
			  </div>';
		echo '<div class="comments">下面有请大佬们说话</div>';
		foreach ($result_comment as $key=>$value) {
			$num = $key+1;
			echo '<div class="comment">
			    <div class="row">
			      <div class="col-md-6">'.$value['article_user_name'].'</div>
			      <div class="col-md-6">'.$num.'楼</div>
			    </div>
			    <div class="content_text">'.$value['content'].'</div>
			    <div class="comment_time">'.$value['update_data'].'</div>
			  </div>';
		}
	}
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		var_dump($_POST);
		$sql = "INSERT INTO user (id,article_id,content,create_data,update_data,user_name,article_user_name)
		VALUES ('$user_name', '$tel', '$password', '$time', '$time')";
	}
	$conn->close();
?>