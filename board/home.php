<?php
include 'init.php';
if(!isLoggedIn()){
  header("Location:index.php");
  exit;
}
include 'header.php';
include 'navbar.php';
$r =redislink();
?>

<div class="container  center-block templatemo-form-list-container templatemo-container">

    <form  method="post" action="post.php" >
        <?php echo $User['username']?>,想要写什么？<br>
       <textarea name="status" id="" cols="70" rows="3"></textarea><br>
       <input type="submit" class="btn btn-default pull-right"value="提交">
    </form>
    <div>
        <span><?=$r->zcard("followers:".$User['id'])?> 粉丝</span>
        <span><?=$r->zcard("following:".$User['id'])?> 关注</span>
    </div>

</div>
<hr>
<div class="center-block templatemo-form-list-container templatemo-container">
<?
$start = gt("start") === false ? 0 : intval(gt("start"));
showUserPostsWithPagination(false,$User['id'],$start,10);

?>
