<?php 
$title = $_POST['title'];
$kicker = $_POST['kicker'];
$newname = $_POST['newname'];
$times = $_POST['times'];
$timess = $_POST['timess'];
$count = $_POST['count'];
if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "video/mp4") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 10241000)) {
	if ($_FILES["file"]["error"] > 0) {
    	echo "错误: " . $_FILES["file"]["error"] . "<br />";
    } else {
    	// 重新给上传的文件命名,增加一个年月日时分秒的前缀,并且加上保存路径
    	$filename="upload/".date("YmdHis").$_FILES['file']['name'];
    	//move_uploaded_file()移动临时文件到上传的文件存放的位置,参数1.临时文件的路径, 参数2.存放的路径
		move_uploaded_file($_FILES["file"]["tmp_name"],$filename);  
		
    	// echo "文件名: " . $_FILES["file"]["name"] . "<br />";
    	// echo "文件类型: " . $_FILES["file"]["type"] . "<br />";
    	// echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    	// echo "暂存目录: " . $_FILES["file"]["tmp_name"]. "<br />";
    }
} else {
  	echo "您上传的文件不符合要求!";
}

// 如果是录入页面提交的,那么$action等于add
$action = empty($_POST["action"])?"add":$_POST["action"];
    if($action=="add"){
        $str1="数据更新成功！";
        $str2="数据更新失败！";
        $url="logoin-success.php";
        $sql = "insert into news (标题,肩题,图片,作者,创建时间,发布时间,count) value ('$title','$kicker','$filename','$newname','$times','$timess','$count')";
    }else if($action=="update"){
        $str1="数据更新成功！";
        $str2="数据更新失败！";
        $url="logoin-success.php";
        $kid=$_POST["kid"];
        if (empty($filename)) {
            $sql="update news set 标题='{$title}',肩题='{$kicker}',作者='{$newname}',创建时间='{$times}',发布时间='{$timess}',count='{$count}' where id='{$kid}'";
        }else{
             $sql="update news set 标题='{$title}',肩题='{$kicker}',图片='{$filename}',作者='{$newname}',创建时间='{$times}',发布时间='{$timess}',count='{$count}' where id='{$kid}'";
        }
       
    }else{
        die("请选择操作方法");
    }

?>
<?php $conn = mysqli_connect("localhost","root","");

// if( $conn ){
//  echo "<script>console.log(连接成功!)</script>";
// }else{
//  echo "连接失败".mysqli_connect_error();
// }
// 选择要操作的数据库
mysqli_select_db($conn,"student_db");
// 设置读取数据库的编码,不然汉字显示乱码
mysqli_query($conn,"set names utf8");
// 执行SQL语句
$result = mysqli_query($conn,$sql);
// var_dump($result);
// // 输出数据
// // var_dump($result);
if($result){
echo "<script>alert('操作成功')</script>";
header ("Refresh:1;url=$url");
}else{
echo "操作失败!".mysqli_error($conn); 
} ?>