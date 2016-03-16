<?php
	echo "<p>Test PHP is here.</p>";
//	phpinfo();
	
	$link = mysqli_connect ("localhost","root","SocO94", "sakila");
	if (!$link) {
   		die('Could not connect: ' . mysql_error());
	}
	echo 'Connected successfully<br>';

	$result = mysqli_query($link, "SELECT first_name FROM sakila.actor;");
	if (!$result) {
 	   die('Invalid query: ' . mysql_error());
	}
	
	while ($row = $result->fetch_row()){
		printf("%s <br>", $row[0]); 
	}
?>