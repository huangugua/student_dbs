<?php include "head_01.php"; ?>
    <form action="logoin-save.php" class="sui-form form-horizontal sui-validate" id="formf" method="post">
      <div class="control-group">
          <label for="email" class="control-label">用户邮箱：</label>
          <div class="controls">
            <input type="hidden" name="page" value="logoin">
              <input type="text" id="email" name="email" class="input-large input-xfat" placeholder="请输入用户邮箱" data-rules="required|email|minlength=8">
          </div>
        </div>
      <div class="control-group">
          <label for="password" class="control-label">密码：</label>
          <div class="controls">
              <input type="password" id="password" name="password" class="input-large input-xfat" placeholder="请输入密码" data-rules="required|minlength=6|maxlength=15">
          </div>
        </div>
      <div class="control-group">
          <label for="identifying" class="control-label">验证码: </label>
          <div class="controls">
              <input type="text" id="identifying" name="identifying" class="input-medium input-xfat" placeholder="请输入验证码" data-rules="required|minlength=4|maxlength=4">
              <a href="" class="sui-btn btn-bordered btn-xlarge btn-success" id="ifg"><?php 
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyz'; 
                    $randomString = ''; 
                    for ($i = 0; $i < 4; $i++) { 
                    $randomString .= $characters[rand(0, strlen($characters) - 1)]; 
                    } 
                    echo $randomString;
                ?></a>
                <div class="sui-msg msg-naked msg-error tip">
                  <i class="msg-icon"></i>
                <div class="msg-con">验证码错误</div>
              </div>
          </div>
        </div>
        <div class="control-group">
          <label for="answer" class="control-label"></label>
        <div class="controls">
            <input type="submit" value="登录" name="submit" class="sui-btn btn-xlarge btn-primary">
        </div>
      </div>
      <div class="control-group">
          <label for="forget" class="control-label"></label>
        <div class="controls">
           <a href="forget.php" class="sui-btn btn-small btn-link" id="forget">忘记密码</a>
        </div>
      </div>
    </form>
  </div>
<?php include "foot_01.php"; ?>
<script>
  // 给提交按钮绑定事件
  $("button[type=submit]").on("click",function(){
    // 使用$.ajax()提交数据
    $.ajax({
      url   : "logoin-save-ajax.php",
      type  : "POST",
      data  : $("#form1").serialize(),
      dataType: "json",
      success:function(data,textStatus){
        // 请求成功后调用此函数
        if(data.code == 200){
          $(".pp").slideDown(2000,function(){
            window.location.href = "index.php";
          });
        }
        if(data.code == 20001){
          // 惕是密码错误
        }
        if(data.code == 20004){
          // 提示邮箱填写错误
        }
      }
      error:function(XMLHTTPRequest,textStatus,errorThrown){
     console.log(data.code);
        // 请求失败后调用此函数
        console.log("失败原因:"+errorThrown);
      }
    });
    return false;
  })

</script>