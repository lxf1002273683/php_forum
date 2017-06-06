<!-- 评论 -->
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
		$article_id = intval($_POST['article_id']);
		$article_user_name = $_POST['article_user_name'];
		$content = $_POST['content'];
		$article_title = $_POST['article_title'];
		$user_name = $_COOKIE['user_name'];
		//获取评论数
		$sql_select = mysqli_query($conn, "SELECT comment_num FROM article WHERE id='$article_id'");
		$comment_num = mysqli_fetch_array($sql_select);
		$comment_num_new = $comment_num['comment_num'] +1;
		//更新帖子时间
		mysqli_query($conn,"UPDATE article SET update_time='$time',comment_num='$comment_num_new'
		WHERE id='$article_id'");
		//评论提交
		$sql = "INSERT INTO commtent (article_id, article_title, content, create_data, update_data, user_name, article_user_name)
		VALUES ('$article_id', '$article_title', '$content', '$time', '$time', '$article_user_name', '$user_name')";
		if (mysqli_query($conn, $sql)) {
			$str = "Location: /content.php?id=$article_id";
		    header($str);
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		$conn->close();
	}else{
		header("Location: /index.php");
	}
?>