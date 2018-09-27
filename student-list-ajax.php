<?php include("head.php"); ?>		
		<div class="sui-layout">
		  <div class="sidebar">
		  <?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生列表</p>
			<table class="sui-table table-primary">
				<thead>
					<tr>
						<th>学号</th>
						<th>班号</th>
						<th>姓名</th>
						<th>出生日期</th>
						<th>性别</th>
						<th>联系电话</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody id="studentlist">
					
				</tbody>
			</table>
		   </div>
		</div>		
<?php include "foot.php"; ?>
<script type="text/html" id="template1">
	{{each arr val idx}}
		<tr>
			<td>{{val.学号}}</td>
			<td>{{val.班号}}</td>
			<td>{{val.姓名}}</td>
			<td>{{val.性别}}</td>
			<td>{{val.出生日期}}</td>
			<td>{{val.电话}}</td>
		</tr>
	{{/each}}
</script>
<script>
	$(function(){
		$.ajax({
			url : "api.php",
			type:"POST",
			dataType:"json",
			data:{
				"action":"student"
			},
			beforeSend:function(XMLHttpRequest){
				$("#studentlist").html("<tr><td>正在查询，请稍后....</td></tr>");
			},
			success:function(data,textStatus){
				console.log(data);
				var arr = data.data;//声明一个变量命名为arr
				var html=template('template1',{"arr":arr});
				$("tbody").html(html);
			},
			error:function(XMLHttpRequest,textStatus,errorThrown){
				console.log(XMLHttpRequest["responseText"]);
			}
		})
	})
</script>