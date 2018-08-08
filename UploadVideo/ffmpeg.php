<?php
$ffmpeg = 'C:\xampp\ffmpeg\bin\ffmpeg.exe';
$cmd = "\"$ffmpeg\" -i \"$video\" -r 1 -ss 00:00:05 -t 00:00:01 -s 256x144 -f image2 \"$image\"";
exec($cmd);
?>
