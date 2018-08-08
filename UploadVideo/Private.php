<?php session_start(); ?>
<?php
	$id = $_GET['id'];

    require'connectdb.php';

    if (empty($id)) {
        echo "คุณไม่ได้กดเลือกไฟล์วิดีโอที่จะซ่อน";
    } else {
        $query = "UPDATE tbupload SET private = 1 - private WHERE id = $id";
        $result = mysqli_query($con,$query);
    }

?>
<script type="text/javascript">
    window.location = 'index.php';
</script>
