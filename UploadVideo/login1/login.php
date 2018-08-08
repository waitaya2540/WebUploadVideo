<?php
    require 'connectdb.php';

    $login_Username = mysqli_real_escape_string($dbcon,$_POST['Username']);
    $login_Password = mysqli_real_escape_string($dbcon,$_POST['Password']);
    $salt = 'abcdefghij';
    $hash_login_Password = hash_hmac('md5',$login_Password,$salt);

    $sql = "SELECT * FROM tb_login WHERE login_Username=? AND login_Password=?";
    $stmt = mysqli_prepare($dbcon,$sql);
    mysqli_stmt_bind_param($stmt,"ss",$login_Username,$hash_login_Password);
    mysqli_execute($stmt);
    $result_user = mysqli_stmt_get_result($stmt);
    if ($result_user->num_rows == 1) {
        session_start();
        $row_user = mysqli_fetch_array($result_user,MYSQL_ASSOC);
        $_SESSION['login_ID'] = $row_user['login_ID'];
        $_SESSION['user_data'] = $row_user;
        header("location: ../main.php");
    } else {
      $_SESSION["noflash"] = true;
    }
  ?>
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <style media="screen" rel="stylesheet">
    .wallpaper1{
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
    <body class="wallpaper1">
      <h3 align="center">รหัสผ่านของคุณไม่ถูกต้อง</h3>
      <hr>
      <a href="logout.php">Try again</a>
    </body>
  </html>
