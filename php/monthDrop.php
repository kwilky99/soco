<?php
//creates the drop down for the months selection

$mo = array('--Select Month--','January','February','March','April','May','June','July',
			'August','September','October','November','December');
$yr = array('--Select Year--','2015','2016');
$yearNumber = array('0', 2015, 2016);
$monthVal = 0;
$yearVal = 0;


echo '<div>
		<select id=\'monthDropdown\' name=\'monthDropdown\'>';  //month drop down
$months = count($mo)-1;
for ($x = 0; $x <= $months; $x++){
	$monthDrop = $mo[$x];
	echo '<option value='.$x;
	if (isset($_POST['monthDropdown'])){
		if($_POST['monthDropdown']==$x){
			echo ' SELECTED ';
			//$monthVal = $x;
		}
	}
	echo '>'.$monthDrop.'</option>';
}
echo '</select></div>';
echo '<div>              
		<select id=\'yearDropdown\' name=\'yearDropdown\'>'; //year drop down
$years = count($yr)-1;
for ($x = 0; $x <= $years; $x++){
	$yearDrop = $yr[$x];
	echo '<option value='.$x;
	if (isset($_POST['yearDropdown'])){
		if($_POST['yearDropdown']==$x){
			echo ' SELECTED ';
			//$yearVal = yearNumber[$x];
		}
	}
	echo '>'.$yearDrop.'</option>';
}	
	echo '</select></div>';

echo '<input type=\'submit\' name=\'button1\'  value=\'My Button\'>';  //on-click action difference between different buttons
/*
$yearVal = $yearNumber[$_POST['yearDropdown']];
$monthVal = $_POST['monthDropdown'];
echo 'year value = '.$yearVal;
echo 'month value = '.$monthVal;
$monthDays = cal_days_in_month(CAL_GREGORIAN, $monthVal, $yearVal);  //calculates days
*/


//logic to stop: How far in the past and fure can they edit things?
//Year first, then build in months past-future that they can edit
?>