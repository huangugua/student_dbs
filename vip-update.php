<?php
$kid = empty($_GET['kid'])?"null":$_GET['kid'];
if($kid=="null"){
	die ("请选择要修改的记录");
}else{
// 创建连接 
$conn = mysqli_connect("localhost","root","");

if( $conn ){
	echo "<script>console.log('连接成功')</script>";
}else{
	echo "<script>console.log('连接失败')</script>".mysqli_connect_error() ;
}
// 选择要操作的数据库
mysqli_select_db($conn,"student_db");
// 设置读取数据库的编码,不然汉字显示乱码
mysqli_query($conn,"set names utf8");
// 执行SQL语句
$sql="SELECT * FROM user WHERE id='{$kid}'";
$result = mysqli_query($conn,$sql);
// 输出数据
if(mysqli_num_rows($result) > 0){
	// 将查询的结果转换成数组
	$row=mysqli_fetch_assoc($result);
}else{
	echo "找不到这条记录";
}
// 关闭数据连接
mysqli_close( $conn );
}
?>
<?php include "head.php" ?>
<div class="sui-layout">
  	<div class="sidebar">
		<!-- 左菜单 -->
		<?php include("leftmenu.php") ?>
  	</div>
  	<div class="content">
	<p class="sui-text-xxlarge my-padd">会员修改</p>
		<form action="vip-save.php" id="form1" class="sui-form form-horizontal sui-validate" method="post" enctype="multipart/form-data">
			<div class="control-group">
		        <label for="email" class="control-label">邮箱：</label>
		        <div class="controls">
		        	<input type="hidden" name="action" value="update">
                	<!-- 增加一个隐藏的input 保存课程编号 -->
                	<input type="hidden" name="kid" value="<?php echo $row['id']; ?>">
		            <input type="hidden" name="page" value="logoin">
		            <input type="text" id="email" name="email" class="input-large input-xfat" placeholder="请输入用户邮箱" data-rules="required|email|minlength=8" value="<?php echo $row['email']; ?>">
		        </div>
	        </div>
			<div class="control-group">
  				<label for="name" class="control-label">用户名：</label>
    			<div class="controls">
      				<input type="text" id="name" value="<?php echo $row['name']; ?>" name="name" class="input-large input-xfat" placeholder="请输入用户名" data-rules="required|minlength=2|maxlength=6">
    			</div>
  			</div>
			<div class="control-group">
    			<label for="password" class="control-label">密码：</label>
    			<div class="controls">
      				<input type="password" id="password" name="password" class="input-large input-xfat" placeholder="请输入密码" data-rules="required|minlength=6|maxlength=15" value="<?php echo $row['password']; ?>">
    			</div>
  			</div>
			<div class="control-group">
  				<label for="question" class="control-label">密码提示问题: </label>
  				<div class="controls">
  					<input type="text" id="question" value="<?php echo $row['question']; ?>" name="question" class="input-large input-xfat" placeholder="请输入用户名" data-rules="required">
  				</div>
  			</div>
  			<div class="control-group">
  				<label for="answer" class="control-label">密码答案: </label>
  				<div class="controls">
  					<input type="text" id="answer" name="answer" class="input-large input-xfat" data-rules="required" value="<?php echo $row['answer']; ?>">
  				</div>
  			</div>
			<div class="control-group">
				<label for="submit" class="control-label"></label>
				<div class="controls">
					<input type="submit" id="submit" class="sui-btn btn-xlarge btn-primary" value="修改完成">
				</div>
			</div>	  
		</form>
	</div>
</div>
</div>
<?php include("foot.php") ?>
