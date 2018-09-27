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
$sql="SELECT * FROM news WHERE id='{$kid}'";
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
	<p class="sui-text-xxlarge my-padd">新闻修改</p>
		<form action="news-save.php" id="form1" class="sui-form form-horizontal sui-validate" method="post" enctype="multipart/form-data">
			<div class="control-group">
		    	<label for="title" class="control-label">标题：</label>
		    	<div class="controls">
		    		<input type="hidden" name="action" value="update">
		    		<input type="hidden" name="kid" value="<?php echo $row['id'] ?>">
		      		<input type="text" name="title" id="title" class="input-large input-fat" placeholder="输入新闻标题" data-rules="required|minlength=1|maxlength=50" value="<?php echo $row['标题'] ?>">
				</div>
			</div>
			<div class="control-group">
		    	<label for="kicker" class="control-label">肩题：</label>
		    	<div class="controls">
		      		<input type="text" name="kicker" id="kicker" class="input-large input-fat" placeholder="输入新闻肩题" data-rules="required|minlength=1|maxlength=50" value="<?php echo $row['肩题'] ?>">
				</div>
			</div>
			<div class="control-group">
		    	<label for="file" class="control-label">图片：</label>
		    	<div class="controls">
		      		<input type="file" name="file" id="photo" class="input-large input-fat">
		      		<input type="hidden" name="file" value="<?php echo $row['图片'] ?>">
		      		<img style="width: 100px; height: 100px;" src="<?php echo $row['图片'] ?>">
				</div>
			</div>
			<div class="control-group">
		    	<label for="newname" class="control-label">作者：</label>
		    	<div class="controls">
		      		<input type="text" name="newname" id="newname" class="input-large input-fat" placeholder="输入新闻作者" data-rules="required|minlength=1|maxlength=50" value="<?php echo $row['作者'] ?>" readonly unselectable="on">
				</div>
			</div>
			<div class="control-group">
		    	<label for="times" class="control-label">创建时间：</label>
		    	<div class="controls">
		      		<input type="text" name="times" id="times" class="input-large input-fat" placeholder="输入创建时间" data-rules="required|minlength=1" value="<?php echo date('Y-m-d H:i:s') ?>" readonly unselectable="on" >
				</div>
			</div>
			<div class="control-group">
		    	<label for="timess" class="control-label">发布时间：</label>
		    	<div class="controls">
		      		<input type="text" name="timess" id="timess" class="input-large input-fat" placeholder="输入发布时间" data-rules="required|minlength=1" value="<?php echo date('Y-m-d H:i:s') ?>" readonly unselectable="on" >
				</div>
			</div>
			<div class="control-group">
		    	<label for="count" class="control-label">内容: </label>
		    	<div class="controls">
		      		<textarea name="count" id="count" cols="30" rows="10">
		      			<?php echo "{$row['count']}" ?>
		      		</textarea>
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
