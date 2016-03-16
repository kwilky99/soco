<?php
include './getterSetterExmpl.php';
	echo '<html>
			<head><title></title></head>
			<body>';

	$cowObject = new Beef(); //creating new object to access/change the private variable
	echo $cowObject->getCowsName(); //echo's the current variable - nothing
	$cowObject->setCowsName("Sarah "); //sets it to "sarah"
	echo $cowObject->getCowsName(); //echos sarah
	$cowObject->setCowsName("Deryl "); //resets variable as 'Deryl'
	echo $cowObject->getCowsName(); //echos deryl
	
	
	echo '</body>
		</html>';
?>