<?php
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
		$time = date("Y-m-d H:i:s");
		$user_name = $_COOKIE['user_name'];
		$content = $_POST['content'];
		$title = $_POST['title'];
		echo $user_name;

		$sql = "INSERT INTO article (name, content, create_time, update_time, title)
		VALUES ('$user_name', '$content', '$time', '$time', '$title')";
		if ($conn->query($sql) === TRUE) {
			header("Location: /user/index.php");
		}
		$conn->close();
	}
	if(!isset($_COOKIE['user_name'])){
		header("Location: /index.php");
	}
?>