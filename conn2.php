<?php
// 创建连接 
$conn = mysqli_connect("localhost","root","");

// if( $conn ){
// 	echo "<script>console.log(连接成功!)</script>";
// }else{
// 	echo "连接失败".mysqli_connect_error();
// }
// 选择要操作的数据库
mysqli_select_db($conn,"student_db");
// 设置读取数据库的编码,不然汉字显示乱码
mysqli_query($conn,"set names utf8");
// 执行SQL语句
// $result = mysqli_query($conn,$sql);
// var_dump($result);
// // 输出数据
// // var_dump($result);
// if($result){
// echo "<script>alert('操作成功')</script>";
// header ("Refresh:1;url=$url");
// }else{
// echo "操作失败!".mysqli_error($conn); 
// }
// // 关闭数据连接
// mysqli_close( $conn );
?>
