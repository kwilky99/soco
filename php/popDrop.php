<?php
$link = mysqli_connect ("localhost","root","SocO94", "sakila");
if (!$link) {
	die('Could not connect: ' . mysql_error());
}
//echo 'Connected successfully<br>';



$result = mysqli_query($link,"SELECT first_name FROM sakila.actor");
if (!$result) {
	die('Could not retrieve the result: ' . mysqli_error($link));
}
	$i = $result->num_rows;
	echo 'The number of rows is '.$i;
	echo '<br><select id=\'popDrop\' name=\'popDrop\'>>';
		for($x=0; $x <= $i; $x++){
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$name = $row['first_name']; 
			echo '<option value="'.$x.'">'.$name.'</option>';
		}
	var_dump($result);
	
echo '</select>';
?>