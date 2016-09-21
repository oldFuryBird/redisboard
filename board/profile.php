<?php
include 'init.php';
include 'header.php';
include 'navbar.php';
?>
<?php
  $r = redislink();
  if(!gt("u") || !($userid = $r->hget("users",gt("u")))){
      header("Location:index.php");
      exit(1);
  }
?>
<div class="center-block templatemo-form-list-container templatemo-container">
  <?
  echo "<span class='lead'>".gt("u")." ";
  if(isLoggedIn() && $User['id'] != $userid){
    $isfollowing = $r->zscore("following:".$User['id'],$userid);
    if(!$isfollowing){
        echo '<a href="follow.php?uid='.$userid.'&f=1">关注</a></span>&nbsp;';
    }else{
        echo '<a href="follow.php?uid='.$userid.'&f=0">取消关注</a></span>&nbsp;
        ';
    }
  }

$start = gt("start") === false ? 0 : intval(gt("start"));
showUserPostsWithPagination(gt("u"),$userid,$start,10);

?>
</div>
