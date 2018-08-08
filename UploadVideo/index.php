<?php session_start();

if (empty($_SESSION['user_data']['login_Username'])) {
    header("location: Homepage.php");
    exit(0);
}

?>
<?php $title = 'UPLOAD'; ?>
<?php include 'navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <form action="Upload.php" enctype="multipart/form-data" method="post">
                <label>Select Video:</label>
                <input type="file" class="form-control" name="video"/><br>
                <div class="btn-group">
                    <input type="reset" class="btn btn-primary" value="cancel"/>
                    <input type="submit" class="btn btn-primary" value="upload"/>
                </div>
            </form>
            <div>
                <h3 class="page-header">List upload</h3>
                <?php
                include'./connectdb.php';
                $sql='SELECT * FROM tbupload WHERE UID = ' . $_SESSION['user_data']['login_ID'] . ' ORDER BY `date` DESC';
                $query= mysqli_query($con,$sql);
                while($run= mysqli_fetch_assoc($query)):
                    $id = $run['ID']; $name = $run['NAME']; $url = $run['URL'];
                    ?>
                    <div class="media">
                        <div class="media-left media-middle">
                            <a href="view.php?id=<?php echo $id; ?>">
                                <img class="media-object" width="150px" src="<?php echo "Video/thumbnail/$url.jpg"; ?>" alt="<?php echo $name; ?>">
                            </a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">
                                <a href="view.php?id=<?php echo $id; ?>"><?php echo $name; ?></a>
                            </h5>
                            <div><?php echo date('D d M Y H:i:s', strtotime($run['date'])); ?></div>
                            <a class="label label-danger" href="delete.php?id=<?php echo $id; ?>" onclick="return confirm('คุณต้องการลบไฟล์วิดีโอนี้ใช้หรือไม่');">Delete</a>
                            <?php if ($run['private'] == 1): ?>
                                <a href="Private.php?id=<?php echo $id; ?>" class="label label-success">Public</a>
                            <?php else: ?>
                                <a href="Private.php?id=<?php echo $id; ?>" class="label label-danger">private</a>
                            <?php endif; ?>
                            <div onclick="sendRename(<?php echo $id; ?>,'<?php echo $name; ?>')" class="label label-warning">Rename</div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <script>
                function sendRename(id,name) {
                    let newName = prompt('', name);
                    if (newName !== null) {
                        $.get('Rename.php', { id: id, name: newName }, () => location.reload());
                    }
                }
                </script>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
