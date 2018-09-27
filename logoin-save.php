<script src="https://cdn.bootcss.com/limonte-sweetalert2/7.21.1/sweetalert2.all.js"></script>
<?php 
session_start();
$page = $_REQUEST["page"];
$email = empty($_REQUEST["email"])?null:strtoLower($_REQUEST["email"]);
$password = empty($_REQUEST["password"])?null:strtoLower($_REQUEST["password"]);
// 创建连接 
$conn = mysqli_connect("localhost","root","");

if( $conn ){
	echo "连接成功!<br>";
}else{
	echo "连接失败".mysqli_connect_error();
}
// 选择要操作的数据库
mysqli_select_db($conn,"student_db");
// 设置读取数据库的编码,不然汉字显示乱码
mysqli_query($conn,"set names utf8");
if($page == 'logoin'){
	$sql = "select * from user where email='{$email}' and password='{$password}'";
	$url = "logoin-success.php";

}else if($page == 'forget'){
	$question = $_REQUEST["question"];
	$answer = $_REQUEST["answer"];
	$sql = "update user set password='{$password}' where email='{$email}' and question='{$question}' and answer='{$answer}'";
	$url = 'logoin-success.php';
};
$result = mysqli_query($conn,$sql);
if($page == 'logoin'){
	if( mysqli_num_rows($result) >0 ){
		echo "<script>sweetAlert(
		  '登录成功',
		  'success'
		);document.cookie='usname={$email};path=../student_db/;';</script>";
		$_SESSION['usname'] = "{$email}";
		header ("Refresh:3;url={$url}");
	}else{
		echo "
		<script>
		sweetAlert(
		  '哎呦……',
		  '密码错误！',
		  'error'
		)
		</script>";
		header ("Refresh:5;url='logoin.php'");
	};
}else{
	if( $result ){
		echo "<script>alert('登陆成功');document.cookie='usname={$email};path=../pposms/;';</script>";
		$_SESSION['usname'] = "{$email}";
		header ("Refresh:1;url={$url}");
	}else{
		echo "<script>alert('账户有误,登录失败!')</script>";
		header ("Refresh:1;url='logoin.php'");
	};
}
// 关闭数据连接
mysqli_close( $conn );

?>

