<!DOCTYPE html>
<html>
<head>

<?php 
require("timeSheetHeader.php");
$query = "SELECT * FROM timesheet.employees WHERE `userID`= 2";
queryBigTableInSky($query, $db);
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
<!-- hidden inputs that populate important form data !-->
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
	<tr class="tableRow">
		<td> 
		<h3> TOTALS </h3>
		</td>
		<td><span id="regularTotal"></span></td>
		<td><span id="vacationTotal"></span></td>
		<td><span id="sickTotal"></span></td>
		<td><span id="otherTotal"></span></td>
		<td class="overtime"><span id="overtimeTotal"></span></td>
		<td><span id="holidayTotal"></span></td>
		<td class="borderRight"><span id="grandTotal"></span></td>

	</tr>
</tbody>
</table>
</div>

<div id="ptoHolder">
    <table id="ptoTable" class="table">
    <tbody>
    	<tr class="tableRow tableHeading">
    		<!-- function that puts the proper headings, if user has pre 98 sick time it prints slightly different -->
    		<?php
     		checkSickTime ($vacaRate, $beginningVacationTime, $sickRate, $beginningNewSickLeave, $oldSickTime);
    		?>

    	<!-- </tr> -->
    </tbody>
    </table>
    <input type="submit" name="submit" class="button" id="submit_btn" value="Submit Timesheet" onclick="submitTheThing()">
</form>
</div>

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