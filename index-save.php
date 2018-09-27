<?php 
include "conn2.php"; 
	$email=$_POST['email'];
	$name = $_POST["name"];
	$password = $_POST["password"];
	$question = $_POST["question"];
	$answer = $_POST["answer"];
	$sql="insert into user(email,name,password,question,answer) values('$email','$name','$password','$question','$answer')";
$result=mysqli_query($conn,$sql);
//如果查找的记录有一条，就说明已经被注册过了，
if($result){
	echo "ok";
}else{
	echo "error";
}

mysqli_close($conn);
	
?>