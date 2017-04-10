<!DOCTYPE html>
<html>
	<head></head>
	
<body>
	<div class="heading">
		<img src="imgs/logo.gif">
		<h1>Time Sheet </h1>
	</div>
	
	<div class="infoHolder">
		<div class="name">
			Name: 
		</div>

		<div class="payrollPeriod">
			Payroll Period: 
		</div>

		<div class="vacationRate">
			Vacation Rate:
		</div>
	</div>
	
	<table id="timeSheetTable" class="table">
		<form id="timeSheetForm" action="submit.php" method="post">
			
		<!-- hidden inputs that populate important form data !-->
		<input type="hidden" name="userID" value="">
		<input type="hidden" name="payPeriod" value="">
		<input type="hidden" name="userName" value="">

		<tbody>
			<tr class="tableHeading">
				<th>Day</th>
				<th>Regular Hours</th>
				<th>Vacation Hours</th>
				<th>Sick Hours</th>
				<th>Other Hours</th>			
				<th class="overtime">Overtime Hours</th>
				<th>Holiday Hours</th>
				<th>Total Hours</th>
			</tr>

			<tr class="tableRow">
				<td> <h3> TOTALS </h3></td>
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

	<div id="ptoHolder">
		<table id="ptoTable" class="table">
			<tbody>
				<tr class="tableRow tableHeading">
					<!-- function that puts the proper headings, if user has pre 98 sick time it prints slightly different -->
				</tr>
			</tbody>
		</table>
		
		<input type="submit" name="submit" class="button" id="submit_btn" value="Submit Timesheet" onclick="submitTheThing()">
	</div>

	<pre id="whereToPrint"></pre>

</body>
</html>