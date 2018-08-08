<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="/favicon.ico">
	<link href="asset/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/workV2/Homepage.php"><i class="glyphicon glyphicon-home" style="font-size: 23px;"></i></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse">
            <ul class="nav navbar-nav">
                <?php if(empty($_SESSION['user_data'])): ?>
                <?php else: ?>
                    <li class="active"><a href="index.php">Upload<span class="sr-only">(current)</span></a></li>
                <?php endif; ?>
            </ul>
            <form class="navbar-form navbar-left" action="search.php" method="GET">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i> </button>
                    </span>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <?php if(empty($_SESSION['user_data'])): ?>
                    <li class="dropdown">
                        <li><a href="/workV2/register.php">Register</a></li>
                        <li><a href="/workV2/login.php">Login</a></li>
                    </li>
                <?php else: ?>		
					<?php if ($_SESSION['user_data']['login_Status'] == 1): ?>
						<li><a href="admin_role.php"><i class="glyphicon glyphicon-cog"></i> Role</a></li>
						<li><a href="admin.php"><i class="glyphicon glyphicon-user"></i> Admin</a></li>
					<?php endif; ?>
					<li><a href="history.php"><i class="glyphicon glyphicon-tags"> </i><?php echo " History"; ?></a></li>
                    <li><a href="/workV2/main.php"><?php echo 'ยินดีตอนรับคุณ ' . $_SESSION['user_data']['login_Username']; ?></a></li>
                    <li><a href="/workV2/login1/logout.php">ออกจากระบบ</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
