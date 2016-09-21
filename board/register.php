<?php
include('init.php');
if(!gt("username") || !gt("pwd1") || !gt("pwd2"))
goback("请输入完整信息");
if(gt("pwd1") != gt("pwd2"))
goback("两次密码不一致");

$username = gt("username");
$password = gt("pwd1");
$r = redislink();
if($r->hget("users",$username))
goback("该用户已存在");

$userid = $r->incr("next_user_id");
$authsecret = getrand();
$r->hset("users",$username,$userid);
$r->hmset("user:$userid", // phpredis 需要出入数组
  array( "username"=>$username,
    "password"=>$password,
    "auth"=>$authsecret)
  );
$r->hset("auths",$authsecret,$userid);
$r->zadd("users_by_time",time(),$username);
setcookie("auth",$authsecret,time()+3600*24*365);
header("Location:index.php");
?>
