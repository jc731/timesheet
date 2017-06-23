<?php
// print_r ($_POST);

require_once('timeSheetHeader.php');

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$adUserName = $_POST['adUserName'];
$vacation = $_POST['vacation'];
$vacationRate = $_POST['vacationRate'];
$overtimeEligiable = $_POST['overtimeEligiable'];
$oldSickTime = $_POST['oldSickTime'];
$newSickTime = $_POST['newSickTime'];
$sickRate = $_POST['sickRate'];
$managerID = $_POST['manager'];
$anniversary = $_POST['anniversary'];



$query = "INSERT INTO `timesheet`.`employees` (
		`adUserName`,
		`firstName`,
		`lastName`,
		`vacation`,
		`vacationRate`,
		`oldSickTime`,
		`newSickTime`,
		`sickRate`,
		`overtimeEligiable`,
		`managerID`,
		`anniversary`
	) 
	VALUES (
		'".$adUserName ."', 
		'". $firstName ."',
		'". $lastName ."',
		'". $vacation ."', 
		'". $vacationRate ."', 
		'". $oldSickTime ."', 
		'". $newSickTime ."', 
		'". $sickRate ."', 
		'". $overtimeEligiable ."', 
		'". $managerID ."', 
		'". $anniversary ."'
	);
";


if ($conn->query($query) === TRUE) {
	echo "New Employee Submitted Successfully";
} else {
	echo "Error: " .$sql."<br>" . $conn->error;
}

$conn -> close();

?>