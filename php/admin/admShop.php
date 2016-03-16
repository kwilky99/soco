<?php
//admin logic for storing new shop
//Working on loop logic to store multiple things from an array into database


include '../../html/header.html';  //admin pages - need different reference to get to css
echo '<form method=\'post\' action=\'admShop.php\'>';

$link = mysqli_connect ("localhost","root","SocO94", "soco");
if (!$link) {
	die('Could not connect: ' . mysql_error());
}

$result = mysqli_query($link,"SELECT shop_code, location_id FROM soco.shop");
if (!$result) {
	die('Could not retrieve the result: ' . mysqli_error($link));
}
//loop through and store query result in local array
$i = $result->num_rows;
for($x=0; $x <=$i; $x++){
	$row = $result->fetch_array(MYSQLI_ASSOC);
	$shopA[$x] = $row['shop_code'];
	$locationA[$x] = $row['location_id'];
}

    //---displays in drop down, now time to display in tables and add in create/update option
	//---build buttons that update/delete and add into looped tables
	//---for new, just add 'add' button at the top before the tables
	//---Have to add in logic for 'who clicked me' to make sure we aren't trying to do too
																//many things at once
	/*$i = $result->num_rows;
	//echo 'The number of rows is '.$i;
	echo '<select id=\'admShop\' name=\'admShop\'>>';
		for($x=0; $x <= $i; $x++){
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$shop = $row['shop_code'];
			$shopLoc = $row['location_id'];
			echo '<option value='.$x;
			if (isset($_POST['admShop'])){
				if($_POST['admShop']==$x){
					echo ' SELECTED ';
				}
			}
			echo '>'.$shop.'</option>';
		}
	//var_dump($result);

echo '</select>';
echo "<input type='submit' name='button1'  value='Submit'>";  //on-click action difference between different buttons
*/

//function to return data from db based off paramater
//if (isset($_POST['hdn_posted'])){
//	$countI = $returnSet->num_rows;   //need to loop through for number of rows in a single set???
	echo "<table><tr><td>Shope Code</td><td>Location ID</td></tr>";
	for($x=0; $x <= $i; $x++){
		echo "<tr>";
		echo "<td><input id=$shopA[$x]></td>";  //local array to loop instead of re-querying
		echo "<td><input id=$locationA[$x]></td>";
		echo "</tr>";
	}
	echo "</table>";
//}


//--------saving in mySQLi----------
function saveInformation(){
	$servername = "localhost";
	$username = "root";
	$password = "SocO94";
	$dbname = "soco";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "INSERT INTO $tableName($updateAttribute)
			VALUES ($updateValue)";

	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
}
//----------------------------------
echo "<input type='submit' name='Save' on-click=saveInformation() value='Save'>";

echo "<input type='hidden' name='hdn_posted' value=1>";
include '../../html/footer.html';
?>
