<!DOCTYPE html>
<html>
<head>

 <?php 
	require("timeSheetHeader.php");
 	require("../header.php");

$query = "SELECT * FROM timesheet.timesheets WHERE `sheetID`= 1";

//returns $row, move it to another variable 
queryBigTableInSky($query, $db);
$timesheetData = $row;

$userID = $timesheetData['userID'];

$startDate=date($row["payPeriodStart"]);

// Fix the issue of normal people not counting 0 as a number :( 
// casuals....
$oldPeriodLength = $periodLength - 1; 

$endDate = date('Y-m-d', strtotime($startDate. " + {$oldPeriodLength} days"));
// echo $startDate
// .' <br /> '. 
// $endDate .'
// <br />';
// $currentPayPeriodStart;

$query = "SELECT * FROM  timesheet.employees WHERE `userID`= ". $userID;
queryBigTableInSky($query, $db);
userDetails($row);
echo $firstName;


if ($overTimeEligiable == 1) {
	echo '
		<script>
		    $(document).ready(function() {
		        overTimeEligiable();
		    });
		</script>
	';
	};
?>


<body>
<table id="timeSheetTable" class="table">
<form id="timeSheetForm" action="submit.php" method="post">
<!-- hidden inputs that populate important form data !-->
<input type="hidden" name="userID" value="<?php echo $userID; ?>">
<input type="hidden" name="payPeriod" value="<?php echo $startDate?>">
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
<form id="oldTimeSheetData">
<?php 
oldTimeSheetData($timesheetData, $startDate, $endDate);
// createDateRangeTable($startDate,$endDate)
?>

</tbody>
</table>
</div>
</form>

<pre id="whereToPrint"></pre>
</div>

<!-- check if overtimeEligiable -->
<?php
    if ($overTimeEligiable == 1) {
        echo '
            <script>
                $(document).ready(function() {
                    overTimeEligiable();
                });
            </script>
            ';
    };
?>

</body>

<?php
mysqli_close($db);
?>

</html>

