<?php
    include 'connectdb.php';
    $query = mysqli_query($con, "SELECT COUNT(login_ID) FROM tb_login WHERE login_Status = 1");
    $result = mysqli_fetch_row($query);
    // var_dump($result);
    // exit(0);
    echo '<center><h1 class="label label-primary">Global</h1></center><br/>';
    echo '<label class="label label-danger">ADMIN:</label> ' . $result[0] . ' บุคคล' . '<br/>';

    $query = mysqli_query($con, "SELECT COUNT(login_ID) FROM tb_login WHERE login_Status = 0");
    $result = mysqli_fetch_row($query);
    echo '<label class="label label-success">MEMBER:</label> ' . $result[0] . ' บุคคล' . '<br/>';
    // while ($result = mysqli_fetch_assoc($query)) {
    //     echo 'ADMIN: ' . $result['login_ID'];
    // }

    $query2 = mysqli_query($con, "SELECT COUNT(ID) FROM tbupload");
    $result2 = mysqli_fetch_row($query2);
    echo '<label class="label label-info">VIDEO:</label> ' . $result2[0] . ' คลิป' . '<br/>';
