<?php 
	// Pay Period Calculations change to pull from db config table later
	$now = new DateTime();
	$refStart = new DateTime('2017-01-17');
	$periodLength = 14;
	$daysIntoPayPeriod = $refStart->diff($now)->format('%a') % $periodLength;
	


	// // To reduce confusion since counting starts at 0
	$daysIntoPayPeriodDisplay = $daysIntoPayPeriod + 1; 
	$daysLeftInPayPeriod = $periodLength - $daysIntoPayPeriodDisplay;
	$currentPayPeriodStart = (new \DateTime()) ->modify('-'.$daysIntoPayPeriod.'days');
	$currentPayPeriodEnd = (new \DateTime()) ->modify('+'.$daysLeftInPayPeriod.'days');
	$dbName = "timeSheet";
	$db = mysqli_connect($host,$user, $password, $dbName)
	or die('Error connecting to MySQL server.');

	//Sets db to the timesheet
	// result
	function queryBigTableInSky ($query, $db){
	mysqli_query($db, $query) or die('Error querying database.');
	$result = mysqli_query($db, $query);
	global $row;
	$row = mysqli_fetch_array($result);
}

	function userDetails ($row){
	global $userID, $firstName, $lastName, $beginningVacationTime, $vacaRate, $sickRate, $beginningNewSickLeave, $oldSickTime, $overTimeEligiable;
	$userID=$row['userID'];
	$firstName=$row['firstName'];
	$lastName=$row['lastName'];
	$beginningVacationTime=$row['vacation'];
	$vacaRate=$row['vacationRate'];
	$beginningNewSickLeave=$row['newSickTime'];
	$oldSickTime = $row['oldSickTime'];
	$sickRate = $row['sickRate'];
	$overTimeEligiable = $row['overtimeEligiable'];
}

function createDateRangeTable($strDateFrom,$strDateTo)
	{
	// takes two dates formatted as YYYY-MM-DD and creates an

	$dateRange=array();
	$iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
	$iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));
	if ($iDateTo>=$iDateFrom)
		{
	    	array_push($dateRange,date('Y-m-d',$iDateFrom)); // first entry
	    	while ($iDateFrom<$iDateTo)
	    	{
	        	$iDateFrom+=86400; // add 24 hours
	        	array_push($dateRange,date('Y-m-d',$iDateFrom));
	    	}
		}
	//set day of pay period to 1 for loop and week number to 0. 
	$dayOfPayPeriod = 1;
	$weekNumber = 0;
	foreach ($dateRange as $singleDate) {
		echo '<tr class="tableRow">';
		//Convert the date string into a unix timestamp and print day of the week
			$startDate = strtotime($singleDate);
			$dayOfWeek = date("l", $startDate);
			echo '<td>' . $dayOfWeek . '<br />' .$singleDate . '</td>

			<td> 
			<input 
				class="js-week-'.$dayOfPayPeriod.' js-regular"
				type="text" 
				name="regularHours'.$dayOfPayPeriod.'" 
				id="regularHours'.$dayOfPayPeriod.'" 
				value="';
					if ($dayOfWeek == "Saturday" || $dayOfWeek == "Sunday") {
						echo '0">';
					} else {
						echo '8">';
					}	

			echo '</td>
				<td>
					<input type="text" id="vacationHours'.$dayOfPayPeriod.'" name="vacationHours'.$dayOfPayPeriod.'" value="0"  class="js-vacation">
				</td>
				<td> 
					<input type="text" id="sickHours'.$dayOfPayPeriod.'" name="sickHours'.$dayOfPayPeriod.'" value="0"  class="js-sick">
				</td>
				<td> 
					<input type="text" id="otherHours'.$dayOfPayPeriod.'" name="otherHours'.$dayOfPayPeriod.'" value="0"  class="js-other">
				</td>
				<td class="overtime"> 
					<input type="text" id="overtimeHours'.$dayOfPayPeriod.'" name="overtimeHours'.$dayOfPayPeriod.'" value="0" class="js-overtime>
				</td>
				<td> 
					<input type="text" id="holidayHours'.$dayOfPayPeriod.'" name="holidayHours'.$dayOfPayPeriod.'" value="0"  class="js-holiday">
				</td>
				<td class="borderRight"> 
					<span id="added'.$dayOfPayPeriod.'"></span>
				</td>
				
			</tr>'; 
			// Condition to print the "Weekly Total" line
			if ($dayOfWeek == "Monday") {
				$weekNumber ++;
				echo'
				<tr class="tableRow weeklyTotal">
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td class="overtime"> </td>
					<td> </td>
					<td>Weekly Total:</td>
					<td> <span id="weekTotal'.$weekNumber.'"></span></td>
				</tr>';
			}				
		$dayOfPayPeriod ++;		
		
		}
		
		echo '<div class="add-container"></div>';
	}

	function checkSickTime ($vacationRate, $beginningVacationTime, $sickRate, $beginningNewSickLeave, $oldSickTime) {
			if (!empty($oldSickTime)) {
				echo '
				<th rowspan="2"> Leave Balances:</th>
				<th rowspan="2"> Vacation Leave </th>
					<th>
						Old (pre 98)
					</th>
					<th>
						New 
					</th>
					<th> 
						Combined
					</th>
				</tr>
				<tr> 
					<th colspan="3">Sick Time </td>
				</tr>
				<tr> 
					<td> 
					Beginning Balance 
					</td>
					
					<td> 
					<input id="beginningVacationLeave" value="'. $beginningVacationTime .'">
					</td>

					<td>
					<input id="beginningOldSickLeave" value="'. $oldSickTime .'">
					</td>

					<td> 
					<input id="beginningNewSickLeave" value="'. $beginningNewSickLeave .'">
					</td>

					<td> 
					<span id="beginningCombinedSickLeave"></span>
					</td>

				</tr>

				<tr> 
					<td> 
					Hours Earned
					</td>
					
					<td> 
					<input readonly id="earnedVacationLeave" value="'. $vacationRate .'">
					</td>

					<td class="blank"> 
					
					</td>

					<td> 
					<input readonly id="earnedNewSickLeave" value="'. $sickRate .'">
					</td>

					<td> 
					<span id="earnedCombinedSickLeave"></span>
					</td>

				</tr>

				<tr> 
					<td> 
					&nbsp &nbsp Subtotal
					</td>
					
					<td> 
					<span id="subVacationLeave"></span>
					</td>

					<td><span id="oldSickSub"></span>
					
					</td>

					<td><span id="subNewSickTime"></span>
					
					</td>

					<td> 
					<span id="subCombinedSickLeave"></span>
					</td>

				</tr>

				<tr>
					<td>
					Hours Used:
					</td>

					<td>
					<span id="hoursUsedVacation"></span>
					</td>

					<td id="oldSickUsedTD">
					<span id="oldSickUsed"></span>
					</td>

					<td id="newSickUsedTD">
					<spana id="newSickUsed"></span>
					</td>

					<td> 
					<span id="combinedSickUsed"></span>
					</td>
				</tr>

				<tr> 
					<td> 
					&nbsp &nbsp Ending Balance
					</td>
					<td id="endingVacationHoursTD">
					<input name="hoursEndingVacation" id="hoursEndingVacation" disabled>
					</td>
					<td id="oldSickEndingBalanceTD">
					<input name="oldSickEndingBalance" id="oldSickEndingBalance" disabled>
					</td>
					<td id="newSickEndingBalanceTD">
					<input name="newSickEndingBalance" id="newSickEndingBalance" disabled>
					</td>
					<td id="combinedSickEndingTD">
					<input name="combinedSickEnding" id="combinedSickEnding" disabled>
					</td>
				</tr>
				<tr class="endingBalance"> 
					<td> 
					&nbsp &nbsp Ending Balance(days)
					</td>
					<td id="endingVacationDaysTD"> 
					<span id="daysEndingVacation"></span>
					</td>
					<td id="oldSickDaysTD">
					<span id="oldSickDays"></span>
					</td>
					<td id="newSickDaysTD"> 
					<span id="newSickDays"></span>
					</td>
					<td id="combinedSickDaysTD">
					<span id="combinedSickDays"></span>
					</td>
				<tr>




				
				';
			}
			else {
				echo '
				<th> Leave Balances:</th>
				<th> Vacation Leave </th>
				<th> Sick Leave </th>
				</tr>
					<tr> 
						<td> 
						Beginning Balance 
						</td>
						<td> 
							<input id="beginningVacationLeave" value="'. $beginningVacationTime .'">
						</td>
						<td> 
							<input id="beginningSickLeave" readonly value="' .$beginningNewSickLeave .'">
						</td>
					</tr>
					<tr> 
						<td>
						Hours Earned
						</td>
						<td> 
							<input readonly id="earnedVacationLeave" value="'. $vacationRate .'">
						</td>
						<td>
							<input readonly id="earnedSickLeave" value="'. $sickRate .'"">
						</td>
					</tr>
					<tr>
						<td> 
						&nbsp &nbsp Subtotal
						</td>
						<td> 
							<span id="subVacationLeave"></span>
						</td>
						<td>
							<span id="subSickTime"></span>
						</td>	

					</tr>
					<tr>
						<td>
						Hours Used
						</td>
						<td>
							<span id="hoursUsedVacation"></span>
						</td>
						<td>
							<span id="sickHoursUsed"></span>
						</td>										
					</tr>
					<tr>
						<td> 
						&nbsp &nbsp Ending Balance
						</td>
						<td id="endingVacationHoursTD">
							<input id="hoursEndingVacation" name="hoursEndingVacation" disabled>
						</td>
						<td id="hoursEndingSickTD">
							<input id="sickEndingBalance" name="sickEndingBalance" disabled>
						</td>
					</tr>
					<tr> 
						<td>
						&nbsp &nbsp Ending Balance (days)
						</td>
						<td id="endingVacationDaysTD"> 
							<span id="daysEndingVacation"></span>
						</td>
						<td id="daysEndingSickTD">
							<span id="daysEndingSick"></span>
						</td>
					</tr>

				';
			}
	}

function oldTimeSheetData ($timesheetData, $startDate, $endDate) {
	// takes two dates formatted as YYYY-MM-DD and creates an

	$dateRange=array();
	$iDateFrom=mktime(1,0,0,substr($startDate,5,2),     substr($startDate,8,2),substr($startDate,0,4));
	$iDateTo=mktime(1,0,0,substr($endDate,5,2),     substr($endDate,8,2),substr($endDate,0,4));
	if ($iDateTo>=$iDateFrom)
		{
	    	array_push($dateRange,date('Y-m-d',$iDateFrom)); // first entry
	    	while ($iDateFrom<$iDateTo)
	    	{
	        	$iDateFrom+=86400; // add 24 hours
	        	array_push($dateRange,date('Y-m-d',$iDateFrom));
	    	}
		}
	//set day of pay period to 1 for loop and week number to 0. 
	$dayOfPayPeriod = 1;
	$weekNumber = 0;
	foreach ($dateRange as $singleDate) {
		echo '<tr class="tableRow">';
		//Convert the date string into a unix timestamp and print day of the week
			$startDate = strtotime($singleDate);
			$dayOfWeek = date("l", $startDate);
			echo '<td>' . $dayOfWeek . '<br />' .$singleDate . '</td>

				<td> 
					<input type="text" name="regularHours'.$dayOfPayPeriod.'" id="regularHours'.$dayOfPayPeriod.'" value="'.$timesheetData["regularHours".$dayOfPayPeriod].'">
				</td>
				<td>
					<input type="text" id="vacationHours'.$dayOfPayPeriod.'" name="vacationHours'.$dayOfPayPeriod.'" value="'.$timesheetData["vacationHours".$dayOfPayPeriod].'"  class="">
				</td>
				<td> 
					<input type="text" id="sickHours'.$dayOfPayPeriod.'" name="sickHours'.$dayOfPayPeriod.'" value="'.$timesheetData["sickHours".$dayOfPayPeriod].'">
				</td>
				<td> 
					<input type="text" id="otherHours'.$dayOfPayPeriod.'" name="otherHours'.$dayOfPayPeriod.'" value="'.$timesheetData["otherHours".$dayOfPayPeriod].'"  class="">
				</td>
				<td class="overtime"> 
					<input type="text" id="overtimeHours'.$dayOfPayPeriod.'" name="overtimeHours'.$dayOfPayPeriod.'" value="'.$timesheetData["holidayHours".$dayOfPayPeriod].'">
				</td>
				<td> 
					<input type="text" id="holidayHours'.$dayOfPayPeriod.'" name="holidayHours'.$dayOfPayPeriod.'" value="'.$timesheetData["holidayHours".$dayOfPayPeriod].'" class="">
				</td>
				<td class="borderRight"> 
					<span id="added'.$dayOfPayPeriod.'"></span>
				</td>
				
			</tr>'; 
			// Condition to print the "Weekly Total" line
			if ($dayOfWeek == "Monday") {
				$weekNumber ++;
				echo'
				<tr class="tableRow weeklyTotal">
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td> </td>
					<td class="overtime"> </td>
					<td> </td>
					<td>Weekly Total:</td>
					<td> <span id="weekTotal'.$weekNumber.'"></span></td>
				</tr>';
			}				
		$dayOfPayPeriod ++;		
		
		}
	}