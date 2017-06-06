<?php
	// 关闭问题接口
	if($_SERVER["REQUEST_METHOD"] == "POST"){
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

		// 查看method方式
		// echo $_SERVER["REQUEST_METHOD"];
		$article_id = $_POST['id'];
		$status = $_POST['status'];
		$result = mysqli_query($conn,"UPDATE article SET status=$status
		WHERE id='$article_id'");
		if($result){
			$json = array ('status'=>'success','code'=>1);
			echo json_encode($json);
			// exit(json_encode($json));
		}else{
			$json = array ('status'=>'error','code'=>0);
			exit(json_encode($json));
		}
		$conn->close();
	}
?>