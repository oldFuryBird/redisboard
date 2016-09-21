<?php
function isLoggedIn(){
  global $User,$_COOKIE;
  if(isset($User))return true;
  if(isset($_COOKIE['auth'])){
    $r = redislink();
    $authcookie = $_COOKIE['auth'];
    if($userid = $r->hget('auths',$authcookie)){
        if($r->hget("user:$userid","auth") != $authcookie)return false;
        loadUserInfo($userid);
        return true;
    }
  }
  return false;
}
function redislink(){
  $r = false;
  if($r)return $r;
  $r = new Redis();
  $r->connect('127.0.0.1');
  return $r;
}
function loadUserInfo($userid){
  global $User;
  $r = redislink();
  $User['id'] = $userid;
  $User['username'] = $r->hget("user:$userid","username");
  return true;
}
function g($param){
   global $_GET, $_POST, $_COOKIE;

    if (isset($_COOKIE[$param])) return $_COOKIE[$param];
    if (isset($_POST[$param])) return $_POST[$param];
    if (isset($_GET[$param])) return $_GET[$param];
    return false;
}
function gt($param){
  $val = g($param);
  if($val === false)return false;
  return trim($val);
}
function goback($msg) {
  include("header.php");
  include("navbar.php");
  $str ='<div class="container center-block templatemo-form-list-container templatemo-container">';
  $str .= '<div ><p class="text-danger lead">'.$msg.'</p></div>';
  $str.= '<a href="javascript:history.back()" class="btn btn-danger">请返回重试</a></div>';
  echo $str;
  include("footer.php");
  exit;
}
function strElapsed($t) {
  $d = time() - $t;
  if($d < 60 ) return "$d 秒";
  if($d <3600){
    $m = (int)($d/60);
    return "$m 分钟";
  }
   if($d <3600*24){
    $h = (int)($d/3600);
    return "$h 小时";
  }
  $d = (int)($d/(3600*24));
  return "$d 天";

}
function getrand(){
  $str = 'abcdefghijklmnopqrstuvwxyz.,@#$%!*&';
  $str = substr(str_shuffle($str),0,16);
  return md5($str);
}
function showstatus($userid){
  $r = redislink();
  $postidarr = $r->lrange("timeline",0,-1);
  foreach ($postidarr as $pid) {
    $data = $r->hgetall("post:$pid");
    print_r($data);
  }

}
function showPost($id){
  $r = redislink();
  $post = $r->hgetall("post:$id");
  if(empty($post))return false;
  $userid = $post['user_id'];
  $username = $r->hget("user:$userid","username");
  $elapse = strElapsed($post['time']);
  $userlink ='<a href="profile.php?u='.$username.'">'.$username.'</a>';
  echo '<div class="" ><span class="lead">'.$userlink.'： &nbsp;&nbsp;&nbsp;'. $post['body'].'<br />';
  echo '<i>发布：'.$elapse.'之前 </i> </span></div><hr>';
  return true;
}
function showUserPosts($userid,$start,$count) {
  $r = redislink();
  $key = ($userid == -1) ? "timeline" : "posts:$userid";
  $count = $start + $count;
  $posts = $r->lrange($key,$start,$count);
  $c = 0;
  foreach ($posts as $p) {
    if(showPost($p))$c++;
    if($c == $count) break;
  }
  return count($posts) == $count+1;

}
function showUserPostsWithPagination($username,$userid,$start,$count) {//分页
    global $_SERVER;
    $thispage = $_SERVER['PHP_SELF'];
    $next = $start +10;
    $prev = $start -10;
    $nextlink = $prevlink =false;
    if($prev < 0 ) $prev =0;
    $u = $username ? "&u=".$username : "";
    if(showUserPosts($userid,$start,$count))
      $nextlink = '<a href="'.$thispage.'?start='.$next.$u.'">下一页 &raquo;</a>';
    if($start > 0 ){
      $prevlink = '<a href="'.$thispage.'?start='.$prev.$u.'">&laquo;上一页</a>'.($nextlink ?'|':'');
    }
    if($nextlink || $prevlink)
      echo '<div><span class="pull-left">'. $prevlink .'</span><span class="pull-right">'. $nextlink.'</span></div>';
}
function showLastUsers() {//最新的注册用户 10个
  $r = redislink();
  $users = $r->zrevrange("users_by_time",0,9);
   echo("<ul class=\" breadcrumb \">");
    foreach($users as $u) {
        echo("<li><a class=\"username\" href=\"profile.php?u=".$u."\">".$u."</a> </li>");
    }
    echo("</ul>");
}
