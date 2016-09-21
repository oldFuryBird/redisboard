<?php
include 'init.php';
if(!isLoggedIn() || !gt("status")) {
header("Location:index.php");exit;
}
$r = redislink();
$postid = $r->incr("next_post_id");
$status = str_replace("\n", "", gt("status"));
$r->hmset("post:$postid",array("user_id"=>$User['id'],"time"=>time(),"body"=>$status));
$followers = $r->zrange("followers:".$User['id'],0,-1);
$followers[] = $User['id'];
foreach ($followers as $fid) {
  $r->lpush("posts:$fid",$postid);
}
$r->lpush("timeline",$postid);
$r->ltrim("timeline",0,1000);
header("Location:index.php");
