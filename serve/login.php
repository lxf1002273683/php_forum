<?php
	//用户登录时返回状态 默认值
	$user_nonentity = false;
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
		$user_name = $_POST['name'];
		$user_password = $_POST['password'];
		$sql = 'SELECT * FROM user WHERE name="'.$user_name.'" and password="'.$user_password.'"';
		$result = mysqli_query($conn,$sql);
		if(! $result ){
		    die('无法读取数据: ' . mysqli_error($conn));
		}
		$row = mysqli_fetch_array($result, MYSQL_ASSOC);
		if($row['tel']){
			setcookie('user_name',$row['name'], time()+3600);
			header("Location: /index.php");
		}else{
			$user_nonentity = true;
		}
		$conn->close();
	}
?>