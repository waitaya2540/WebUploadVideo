<?php
    require'connectdb.php';
    $login_Username = $_POST['username'];
    $login_Password = $_POST['password'];
    $login_Email = $_POST['email'];
    //เข้ารหัสผ่าน
    $salt = 'abcdefghij';
    $hash_login_Password = hash_hmac('md5',$login_Password,$salt);
    $query = "INSERT INTO tb_login (login_Username,login_Password,login_Email) VALUES ('$login_Username','$hash_login_Password','$login_Email')";
    $result = mysqli_query($dbcon,$query);

    if ($result){
       header("location: ../login.php");
     } else {
    // echo "เกิดข้อผิดพลาด". mysqli_error($dbcon);
        include 'registerView.php';
     }

     mysqli_close($dbcon);
 ?>
