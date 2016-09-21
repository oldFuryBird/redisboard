<!DOCTYPE html>
<head>
  <title>留言板</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="view/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="view/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="view/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
  <link href="view/css/templatemo_style.css" rel="stylesheet" type="text/css">
  <script src="view/js/jquery-1.11.1.min.js"></script>
   <script src="view/js/bootstrap.min.js"></script>
</head>
<body class="templatemo-bg-gray ">
<div class="container ">
    <h1 class="margin-bottom-12">注册</h1>
          <form class="form-horizontal" action="register.php" method="post" >
                <div class="form-inner " style="width:300px;margin:auto;">
                    <div class="form-group">
                            <label class="control-label">用户名</label>
                            <input type="text" name="username" class="form-control">
                    </div>
                     <div class="form-group">
                            <label class="control-label">密码</label>
                            <input type="password" name="pwd1" class="form-control">
                    </div>
                    <div class="form-group">
                            <label class="control-label">确认密码</label>
                            <input type="password" name="pwd2" class="form-control">
                    </div>
                    <input type="submit" value="注册" class="pull-right btn btn-default">
                    <a href="javascript:history.back()" class="btn btn-default pull-left">返回</a></div>
                </div>
          </form>
</div>
