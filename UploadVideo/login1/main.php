<?php

session_start();

if (empty($_SESSION['login_ID'])) {
    header("Location: index.php");
}

require 'connectdb.php';

$session_login_ID = $_SESSION['login_ID'];


$qry_user = "SELECT * FROM tb_login WHERE login_ID=$session_login_ID";
$result_user = mysqli_query($dbcon,$qry_user);
$s_login_Username = '';

if (!empty($result_user)) {
    $row_user = mysqli_fetch_array($result_user,MYSQL_ASSOC);
    $s_login_Username = $row_user['login_Username'];
    $_SESSION['user_data'] = $row_user;

    mysqli_free_result($result_user);
}

mysqli_close($dbcon);

?>

<html>
<head>
    <link href="/workV2/asset/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <title></title>
</head>

<style media="screen" rel="stylesheet">

    .wallpa{
        width: 50%;
        margin: 0 auto;
    }

    a{
        color: #00BFFF;
        text-decoration: none;
    }

    a:hover{
        color: #0174DF;
        text-decoration: none;
    }
    </style>

<body>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/workV2/Homepage.php"><i class="glyphicon glyphicon-home" style="font-size: 23px;"></i></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php if(empty($_SESSION['user_data'])): ?>
                    <?php else: ?>
                        <li class="active"><a href="/workV2/index.php"><i style="">Upload</i><span class="sr-only">(current)</span></a></li>
                    <?php endif; ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- <li><a href="#">#</a></li> -->
                    <li class="dropdown">
                        <!-- <li><a href="/workV2/login/index.php">Login</a></li> -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wallpa">

        <hr/>
            <?php
            echo "ยินดีต้อนรับคุณ : $s_login_Username" ;
            //   echo "รหัสสมาชิก :".$_SESSION['userdata']['login_Email'];
            echo "<br>";
            echo "รหัสสมาชิก :".$_SESSION['login_ID'];
            ?>
        <hr/>
            <a href="/workV2/index.php" class="btn btn-primary">เข้าสู่หน้าอัพโหลด</a><br/>
            <br/><a href="logout.php" class="btn btn-primary">ออกจากระบบ</a>

    </div>

</body>
</html>
