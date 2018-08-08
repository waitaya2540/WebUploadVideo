<?php
include 'connectdb.php';
// include '/workV2/view/deleteView.php';

session_start();

if (empty($_SESSION['user_data'])) {
    die('error');
    exit(0);
}

if(preg_match('/[0-9]+/', $_GET['id'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $uid = $_SESSION['user_data']['login_ID'];

    $query = mysqli_query($con, "SELECT * FROM `tbupload` WHERE ID = $id AND UID = $uid");
    $result = mysqli_fetch_assoc($query);

    if (empty($result)) {
        die('error');
        exit(0);
    }

    include 'header.php';

    if ($con->query("UPDATE `tbupload` SET `NAME` = '$name' WHERE ID = $id") === TRUE) {
        echo "<center>Rename Success</center>";
        echo "<BR><BR><center><a href='index.php'> Back to Upload Page </a></center>";
    } else {
        echo "Error Deleting Video: " . $con->error;
    }

    include 'footer.php';

    $con->close();
    // header("localtion: index.php");
}
?>
