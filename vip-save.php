<?php 
$email = $_POST["email"];
$name = $_POST["name"];
$password = $_POST["password"];
$question = $_POST["question"];
$answer = $_POST["answer"];
// echo $kcName;
// 如果是录入页面提交的,那么$action等于add
$action = empty($_POST["action"])?"add":$_POST["action"];
if($action=="add"){
	$url = "vip-list.php";
	$sql="insert into user(email,name,password,question,answer) values('$email','$name','$password','$question','$answer')";
}else if($action=="update"){
	$url="vip-list.php";
	$kid= $_POST["kid"];
	$sql="update user set email='{$email}',name='{$name}',password='{$password}',question='{$question}',answer='{$answer}' where id='{$kid}'";
}else{
	die ("请选择操作方法");
}

?>
<?php include("conn.php") ?>