<?php
  include 'connectdb.php';
  // include '/workV2/view/deleteView.php';

    session_start();

    if (empty($_SESSION['user_data'])) {
        die('error1');
        exit(0);
    }

    // if ($_SESSION['user_data']['login_Status'] == 0) {
    //     die('error2');
    //     exit(0);
    // }else {
        if(preg_match('/[0-9]+/', $_GET['id'])) {
          $id = $_GET['id'];

          $query = mysqli_query($con, "SELECT * FROM `tbupload` WHERE ID = $id");
          $result = mysqli_fetch_assoc($query);

          @unlink(__DIR__ . '\\Video\\' . $result['URL']);
          @unlink(__DIR__ . '\\Video\\thumbnail\\' . $result['URL'] . '.jpg');

          if ($con->query("DELETE FROM tbupload WHERE ID = $id") === TRUE) {
              include '/view/deleted.php';
              echo "<center>Video Deleted Succes</center>";
              echo "<BR><BR><center><a href='index.php'> Back to Upload Page </a></center>";
          } else {
              echo "Error Deleting Video: " . $con->error;
          }

          $con->close();
          header("localtion: index.php");
        }

    // }

?>
