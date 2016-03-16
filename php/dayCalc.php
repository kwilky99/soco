<?php
//collecting total days in the month to build the tables
$monthDays = cal_days_in_month(CAL_GREGORIAN, 2, 2016);
echo $monthDays;
?>