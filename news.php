<?php include "head.php"; ?>
<div class="sui-layout">
  	<div class="sidebar">
		<!-- 左菜单 -->
		<?php include("leftmenu.php") ?>
  	</div>
	<div class="content">
		<p class="sui-text-xxlarge my-padd">新闻发布</p>
		<form action="news-save.php" id="form1" class="sui-form form-horizontal sui-validate" method="post" enctype="multipart/form-data">
			<div class="control-group">
		    	<label for="title" class="control-label">标题：</label>
		    	<div class="controls">
		      		<input type="text" name="title" id="title" class="input-large input-fat" placeholder="输入新闻标题" data-rules="required|minlength=1|maxlength=50">
				</div>
			</div>
			<div class="control-group">
		    	<label for="kicker" class="control-label">肩题：</label>
		    	<div class="controls">
		      		<input type="text" name="kicker" id="kicker" class="input-large input-fat" placeholder="输入新闻肩题" data-rules="required|minlength=1|maxlength=50">
				</div>
			</div>
			<div class="control-group">
		    	<label for="file" class="control-label">图片：</label>
		    	<div class="controls">
		      		<input type="file" name="file" id="photo" class="input-large input-fat">
				</div>
			</div>
			<div class="control-group">
		    	<label for="writer" class="control-label">作者：</label>
		    	<input type="text" value="<?php echo $_SESSION['usname']; ?>" name="newname" id="newname">
			</div>
			<div class="control-group">
		    	<label for="times" class="control-label">创建时间：</label>
		    	<div class="controls">
		      		<input type="text" name="times" id="times" class="input-large input-fat" placeholder="输入新闻作者" data-rules="required|minlength=1" value="<?php echo date('Y-m-d H:i:s') ?>" readonly unselectable="on" >
				</div>
			</div>
			<div class="control-group">
		    	<label for="timess" class="control-label">发布时间：</label>
		    	<div class="controls">
		      		<input type="text" name="timess" id="timess" class="input-large input-fat" placeholder="输入新闻作者" data-rules="required|minlength=1" value="<?php echo date('Y-m-d H:i:s') ?>" readonly unselectable="on" >
				</div>
			</div>
			<div class="control-group">
		    	<label for="count" class="control-label">内容: </label>
		    	<div class="controls">
		      		<textarea name="count" id="count" cols="30" rows="10"></textarea>
				</div>
			</div>
			<div class="control-group">
				<label for="submit" class="control-label"></label>
				<div class="controls">
					<input type="submit" id="submit" class="sui-btn btn-xlarge btn-primary" value="发布">
				</div>
			</div>
		</form>
<?php include "foot.php"; ?>