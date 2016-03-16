<?php
function filter($data) {
$data = trim(htmlentities(strip_tags($data)));
if (get_magic_quotes_gpc())
$data = stripslashes($data);
$data = mysql_real_escape_string($data);
return $data;
}
foreach($_POST as $key => $value) {
 $mydata[$key] = filter($value);
}
echo $mydata['MonthDrop'];
?>