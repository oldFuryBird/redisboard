
<?php if(!isLoggedIn()){?>
  <div>
       <form action="login.php" method="post" class="form-inline  navbar-form pull-right">
          <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-user"></i>
                </div>
                <input type="text" name="username" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
                <input type="password" name="pwd" class="form-control">
            </div>
          </div>
           <button class="btn btn-default" type="submit">登录</button>
           <a href="registerform.php" class="btn btn-default" id="register" >注册</a>
       </form>
       </div>
       <?php } else {?>
        <div>
            <ul class="nav navbar-nav pull-right">
                  <li> <a href="#"><span class="text-inline"><?php echo $User['username'];?></span> </a></li>
                  <li><a href="timeline.php">时间轴</a></li>
                  <li><a href="logout.php" >退出</a></li>
            </ul>
          </div>
       <?php }?>

  </div>
</div>
