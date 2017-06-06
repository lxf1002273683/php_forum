<?php
	$status = 0;
	$user_name = '';
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
		$time = date("Y-m-d H:i:s");
		$user_name = $_POST['name'];
		$tel = $_POST['tel'];
		$password = $_POST['password'];
		$sql = "INSERT INTO user (name, tel, password, create_time, update_time)
		VALUES ('$user_name', '$tel', '$password', '$time', '$time')";
		if ($conn->query($sql) === TRUE) {
			$status = 1;
		} else {
			$status = 2;
		}

		$conn->close();
	}
	if(isset($_COOKIE['user_name'])){
		header("Location: /index.php");
	}
?>