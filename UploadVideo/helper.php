<?php
function diffdate($date) {
    $date1 = strtotime($date);
    $date2 = strtotime(date("Y-m-d H:i:s"));

    $diffs = $date2 - $date1;

    $flag = 0;
    $hours = $diffs/60;

    if ($hours > 60) {
        $flag = 1;
        $hours = $hours/60;
        if ($hours > 24) {
            $flag = 2;
            $hours = $hours/24;
            if ($hours > 30) {
                $flag = 3;
                $hours = $hours/30;
                if ($hours > 12) {
                    $flag = 4;
                    $hours = $hours/12;
                }
            }
        }
    }

    $hours = floor($hours);

    if ($hours == 0) {
        return 'ไม่นานมานี้';
    }

    switch ($flag) {
        case 1: return $hours . ' ชั่วโมงที่ผ่านมา';
        case 2: return $hours . ' วันที่ผ่านมา';
        case 3: return $hours . ' เดือนที่ผ่านมา';
        case 4: return $hours . ' ปีที่ผ่านมา';
        default: return $hours . ' นาทีที่ผ่านมา';
    }
}
