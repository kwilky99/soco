<?php
// define variables and set to empty values
include '../html/header.html';

//errors based of rules
	//validate data
	//max values (x > 0 and x < 100)

//clean data

//Dropdowns
//table loop   ---  $days is days in the month they select
//they pick month/year and I give day count (for loop)
//when storing date: must combine month and year they choose + day in loop
		//create loop for year (based off date, +1 annually)
echo '<form method=\'post\' action=\'sheet1.php\'>';
include 'monthDrop.php';
if (isset($_POST['hdn_posted'])){  //parse out all returned variables and put in local variables to use
//	var_dump($GLOBALS);


//builds page based off drop down values
$yearVal = $yearNumber[$_POST['yearDropdown']];
$monthVal = $_POST['monthDropdown'];
//echo 'year value = '.$yearVal;
//echo 'month value = '.$monthVal;
$monthDays = cal_days_in_month(CAL_GREGORIAN, $monthVal, $yearVal);  //calculates days
//echo '<br>'.$monthDays;


echo <<< END
	<section>
	<table id="sheet1" class="display" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Day</th>
				<th>Maintenance Desc.</th>
				<th>Fuel<br>gallons</th>
				<th>Cost</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>Day</th>
				<th>Maintenance Desc.</th>
				<th>Fuel<br>gallons</th>
				<th>Cost</th>
			</tr>
		</tfoot>
		<tbody>
END;
//use class for alternate css themes for light/dark rows
		for ($x = 0; $x < $monthDays; $x++){
			$tableCount = $x + 1;
			$field1Name = "mDesc".$tableCount;
			$field2Name = "fuel".$tableCount;
			$field3Name = "cost".$tableCount;



			echo "<tr>
				<td>$tableCount</td>
				<td><input id=$field1Name name=""></td>
				<td><input id=$field2Name name=""></td>
				<td><input id=$field3Name name=""></td>
			</tr>";
		}
		echo"</tbody>";
	echo"</table>";
	echo"</section>";
}
	//echo $monthDays;
//insert save functionality
//Link for loop saving in mysql: http://stackoverflow.com/questions/28619676/save-mysql-while-loop-data-into-arrays-and-then-save-into-database
echo "<input type='hidden' name='hdn_posted' value=1>";
include '../html/footer.html';
//include another hidden field to show 'who posted me' -- look at ORG CHART







//Storage-----------
//Need to loop through the array, but loop through the different attributes
//and store in individual local arrays.  SQL+PHP should look something like the following:
//Each value is increased in number (inside the loop) so you can call the same $x inside array.
/*
update vcl_rpt (uses_id, trk_rpt_date, maint_desc, fuel, dlr_cost, milage_end, milage_beg)
value ($value1[$x], $value2[$x], $value3[$x], $value4[$x], $value5[$x], $value6[$x], $value7[$x])
where vcl_rpt_id = $x;
*/
//------------------






?>
