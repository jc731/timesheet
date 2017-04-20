<!DOCTYPE html>
<html>
<head>

<?php 
require("timeSheetHeader.php");

// 
// if ($_SESSION['loggedin'] != true) {
// 	header("location: index.php");
// }

// use if no db connected. can also use as helper to build db structure
// this one is for normal employees, use the one below for employees with old sick time, this is project specific, feel free to discard later
$row = array ( 0 => '2', 'userID' => '2', 1 => 'isdtest2', 'adUserName' => 'isdtest2', 2 => 'NOT', 'firstName' => 'NOT', 3 => 'OLD', 'lastName' => 'OLD', 4 => '43.23', 'vacation' => '43.23', 5 => '3.75', 'vacationRate' => '3.75', 6 => NULL, 'oldSickTime' => NULL, 7 => '20.00', 'newSickTime' => '20.00', 8 => '4.25', 'sickRate' => '4.25', 9 => '0', 'overtimeEligiable' => '0', 10 => NULL, 'managerName' => NULL, 11 => NULL, 'anniversary' => NULL, );

// $query = "SELECT * FROM timesheet.employees WHERE `userID`= 2";
// this is for use if you the LDAP connection/session is enabled. For testing it is not. 
// $query = "SELECT * FROM timesheet.employees WHERE `adUserName` LIKE '%".$_SESSION['uname']."%'";


// queryBigTableInSky($query, $db);
userDetails($row);

?>


<body>
	<div class="heading">
		<img src="imgs/logo.gif">
		<h1>Time Sheet </h1>
	</div>
	<div class="infoHolder">
	    <div class="name">
	    	Name: <?php echo $firstName .'&nbsp'. $lastName; ?>
	    </div>

	    <div class="payrollPeriod">
	    	Payroll Period: <?php 
	        echo $firstTime;

	        echo $currentPayPeriodStart->format('Y-m-d') . ' thru ' . $currentPayPeriodEnd->format('Y-m-d'); ?> <br />
	        <?php 
	            echo $daysLeftInPayPeriod; 
	            if ($daysLeftInPayPeriod == 1) {
	                echo ' day';
	            } else {
	                echo ' days';
	            }
	            echo ' reamining in pay period';
	        ?>
	    </div>

	    <div class="vacationRate">
	    	Vacation Rate:<?php 
	        echo '&nbsp<strong>'. $vacaRate .'</strong> hours';
	        ?>
	    </div>
	</div>
	<table id="timeSheetTable" class="table">
	<form id="timeSheetForm" action="submit.php" method="post">
		<!-- hidden inputs that populate important form data for $_POST simplicity !-->
		<input type="hidden" name="userID" value="<?php echo $userID; ?>">
		<input type="hidden" name="payPeriod" value="<?php echo $currentPayPeriodStart->format('Y-m-d'); ?>">
		<input type="hidden" name="userName" value="<?php echo $firstName . $lastName; ?>">
		<tbody>
			<tr class="tableHeading">
				<th>
				Day
				</th>
				<th>
				Regular Hours
				</th>
				<th>
				Vacation Hours
				</th>
				<th>
				Sick Hours
				</th>
				<th>
				Other Hours
				</th>			
				<th class="overtime">
				Overtime Hours
				</th>
				<th>
				Holiday Hours
				</th>
				<th>
				Total Hours
				</th>
			</tr>	
			<?php
			createDateRangeTable($currentPayPeriodStart->format('Y-m-d'), $currentPayPeriodEnd->format('Y-m-d'));
			?>