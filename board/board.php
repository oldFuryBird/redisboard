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
</head>
<body class="templatemo-bg-image-2">
	<div class="container">
		<div class="col-md-12">
			<form class="form-horizontal templatemo-contact-form-1" role="form" action="boardact.php" method="post">
				<div class="form-group">
					<div class="col-md-12">
						<h1 class="margin-bottom-15">留言</h1>
						<p>输入留言信息</p>
					</div>
				</div>
		        <div class="form-group">
		          <div class="col-md-12">
		            <label for="name" class="control-label">姓名 *</label>
		            <div class="templatemo-input-icon-container">
		            	<i class="fa fa-user"></i>
		            	<input type="text" class="form-control" name="name" id="name" placeholder="">
		            </div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		            <label for="message" class="control-label">留言 *</label>
		            <div class="templatemo-input-icon-container">
		            	<i class="fa fa-pencil-square-o"></i>
		            	<textarea rows="8" cols="50" name="content" class="form-control" id="message" placeholder=""></textarea>
		            </div>
		          </div>
		        </div>

		        <div class="form-group">
		          <div class="col-md-12">
		            <input type="submit" value="提交留言" class="btn btn-success pull-right">
		          </div>
		        </div>
		      </form>
		</div>
	</div>
</body>
</html>
