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

	//未解决
	if($index_status === 0){
		$sql = 'SELECT * FROM article WHERE status=0';
		$result = mysqli_query($conn,$sql);
		if(! $result ){
		    die('无法读取数据: ' . mysqli_error($conn));
		}
		$row = mysqli_fetch_all($result, MYSQL_ASSOC);
		foreach ($row as $key => $value) {
			echo '<div class="item">
					<a href="/content.php?id='.$value['id'].'">'.$value['title'].'</a>
					<div class="user_info">
						<span class="user_name">'.$value['name'].'</span>
						<span class="time">'.$value['update_time'].'</span>
						<span class="num"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span><span> '.$value['comment_num'].'</span></span>
					</div>
				</div>';
		}
	}

	//已解决
	if($index_status === 1){
		$sql = 'SELECT * FROM article WHERE status=1';
		$result = mysqli_query($conn,$sql);
		if(! $result ){
		    die('无法读取数据: ' . mysqli_error($conn));
		}
		$row = mysqli_fetch_all($result, MYSQL_ASSOC);
		foreach ($row as $key => $value) {
			echo '<div class="item">
					<a href="/content.php?id='.$value['id'].'">'.$value['title'].'</a><span class="status">已解决</span>
					<div class="user_info">
						<span class="user_name">'.$value['name'].'</span>
						<span class="time">'.$value['update_time'].'</span>
						<span class="num"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span><span> '.$value['comment_num'].'</span></span>
					</div>
				</div>';
		}
	}

	//全部
	if($index_status === 2){
		$sql = 'SELECT * FROM article';
		$result = mysqli_query($conn,$sql);
		if(! $result ){
		    die('无法读取数据: ' . mysqli_error($conn));
		}
		$row = mysqli_fetch_all($result, MYSQL_ASSOC);
		foreach ($row as $key => $value) {
			if($value['status'] == 0){
				echo '<div class="item">
						<a href="/content.php?id='.$value['id'].'">'.$value['title'].'</a>
						<div class="user_info">
							<span class="user_name">'.$value['name'].'</span>
							<span class="time">'.$value['update_time'].'</span>
							<span class="num"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span><span> '.$value['comment_num'].'</span></span>
						</div>
					</div>';
			}else{
				echo '<div class="item">
						<a href="/content.php?id='.$value['id'].'">'.$value['title'].'</a><span class="status">已解决</span>
						<div class="user_info">
							<span class="user_name">'.$value['name'].'</span>
							<span class="time">'.$value['update_time'].'</span>
							<span class="num"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span><span> '.$value['comment_num'].'</span></span>
						</div>
					</div>';
			}
		}
	}

	$conn->close();
?>