<?php
include 'init.php';
if(!isLoggedIn()){
header("Location:index.php");
exit;
}
$r = redislink();
$newauthsecret = getrand();
$userid =$User['id'];
$oldauthsecret =$r->hget("user:$userid","auth");

$r->hset("user:$userid","auth",$newauthsecret);
$r->hset("auths",$newauthsecret,$userid);
$r->hdel("auths",$oldauthsecret);

header("Location: index.php");
