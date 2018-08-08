<?php
    include 'connectdb.php';
    $query = mysqli_query($con, "SELECT * FROM tbupload WHERE `private` = 1 ORDER BY `view` DESC LIMIT 6");
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<?php foreach ($result as $key => $value): ?>
    <div class="media">
        <div class="media-left">
            <a href="view.php?id=<?php echo $value['ID']; ?>">
                <img class="media-object" width="150px" src="Video/thumbnail/<?php echo $value['URL']; ?>.jpg" alt="<?php echo $value['NAME']; ?>">
            </a>
        </div>
        <div class="media-body">
            <div class="media-heading">
                <a href="view.php?id=<?php echo $value['ID']; ?>">
                    <?php echo $value['NAME']; ?>
                </a>
            </div>
            <div><?php echo date('D d M Y', strtotime($value['date'])); ?></div>
            <div class="label label-default">View: <?php echo $value['view']; ?></div>
        </div>
    </div>
<?php endforeach; ?>
