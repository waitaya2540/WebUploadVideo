<?php
    include 'connectdb.php';
    // $query = mysqli_query($con, "SELECT * FROM tbupload WHERE DATE(`date`) = DATE(CURRENT_TIMESTAMP) AND `private` = 1 ORDER BY `view` DESC LIMIT 10");
    // $query = mysqli_query($con, "SELECT * FROM tbupload WHERE YEAR(`date`) = YEAR(CURRENT_TIMESTAMP) ORDER BY `view` DESC LIMIT 10");
    $query = mysqli_query($con, "SELECT * FROM tbupload WHERE `ID` <> $id AND `private` = 1 ORDER BY RAND() LIMIT 10");
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<!-- $id = $value['ID'];
echo '<hr/>';
echo '<div style="width: 90%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">';
echo  "<a href='view.php=?id=$id'>" . $value['NAME'] . '</a>' . '<br/>';
echo '</div>'; -->
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
            <div><?php echo 'อัพโหลดเมื่อ: ' . diffdate($value['date']); ?></div>
            <div class="label label-default">View: <?php echo $value['view']; ?></div>
        </div>
    </div>
<?php endforeach; ?>
