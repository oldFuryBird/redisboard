<?php
include('init.php');

if(!gt("username") || !gt("pwd"))
goback("请输入用户名和密码");
$username = gt("username");
$password = gt("pwd");

$r = redislink();
$userid = $r->hget("users",$username);
if(!$userid)
    goback('用户名或者密码错误');
$realpassword = $r->hget("user:$userid","password");
if($realpassword != $password)
  goback('用户名或者密码错误');
$authsecret = $r->hget("user:$userid","auth");
setcookie("auth",$authsecret,time()+3600*24*365);
header("Location: index.php");
