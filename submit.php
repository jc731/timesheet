<?php 

require("../header.php");
$query = "SELECT * FROM timesheet.employees WHERE `userID`= 2";
require("timeSheetfunctions.php");




$user=$_POST["userID"];
echo $user. '<br />';
$payPeriod=$_POST["payPeriod"]; 
echo $payPeriod. '<br />';
$userName=$_POST["userName"];
echo $userName. '<br />';

// Builds array for storing all the hours for the time sheet. 
for ($i=1; $i<=14; $i++){
	$timeSheetArray[] = [
	'regularHours'.$i=> $_POST["regularHours$i"],
	'vacationHours'.$i =>$_POST["vacationHours$i"],
	'sickHours'.$i =>$_POST["sickHours$i"],
	'otherHours'.$i =>$_POST["otherHours$i"],
	'overTimeHours'.$i =>$_POST["overTimeHours$i"],
	'holidayHours'.$i=>$_POST["holidayHours$i"]
	];

	
}

var_dump($timeSheetArray);




$hoursEndingVacation=$_POST["hoursEndingVacation"];
$oldSickEndingBalance=$_POST["oldSickEndingBalance"];
$newSickEndingBalance=$_POST["newSickEndingBalance"];
$combinedSickEnding=$_POST["combinedSickEnding"];

?>

</body>
</html>



