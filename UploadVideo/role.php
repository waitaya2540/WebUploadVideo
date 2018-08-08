<?php

include 'connectdb.php';

$id = $_GET['id'];

if (empty($id)) {
    echo "Error";
} else {
    $query = mysqli_query($con, "UPDATE `tb_login` SET login_Status = 1  -  login_Status WHERE login_ID = $id");
    $result = mysqli_query($con,$query);
    }


?>

<script type="text/javascript">
    window.location = 'admin_role.php';
</script>
