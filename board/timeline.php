<?php
include 'init.php';
include 'header.php';
include 'navbar.php'
?>
  <div class="container center-block  templatemo-container">
     <h3 class="text-primary ">时间轴</h3>
     <hr>
     <div>
        <span class="">最新注册用户</span>
          <?php showLastUsers()?>
     </div>
    <div>
      <span>最近50条消息</span><p></p>
          <?php showUserPosts(-1,0,50);?>
    </div>
     <hr>
  </div>

