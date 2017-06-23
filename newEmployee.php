<?php 
require("timeSheetHeader.php");

// 
	// 0 => '2', 'userID' => '2', 
	// 1 => 'isdtest2', 'adUserName' => 'isdtest2', 
	// 2 => 'NOT', 'firstName' => 'NOT', 
	// 3 => 'OLD', 'lastName' => 'OLD', 
	// 4 => '43.23', 'vacation' => '43.23', 
	// 5 => '3.75', 'vacationRate' => '3.75', 
	// 6 => NULL, 'oldSickTime' => NULL, 
	// 7 => '20.00', 'newSickTime' => '20.00', 
	// 8 => '4.25', 'sickRate' => '4.25', 
	// 9 => '0', 'overtimeEligiable' => '0', 
	// 10 => NULL, 'managerName' => NULL, 
	// 11 => NULL, 'anniversary' => NULL, );

function getManagerList($conn){
	$managerList = array("");
	$sql ="SELECT managerID as ID,  Name as name, Email as email FROM timesheet.managers;";
	$result = $conn->query($sql);
	global $managerListDetails;
	$managerListDetails = array(); 
	if ($result->num_rows > 0) {
		// add each manger to array
		while($row = mysqli_fetch_array($result)) {
   		array_push($managerListDetails, $row);
		}
	
    }
    // else display error
	else {
		echo "Error generating managerlist";
	}
}

getManagerList($conn);
// print_r($managerListDetails);
?>



<div class="newEmployeeHolder">
<div id="newEmployeeForm">
	<form name="newEmployeeForm" method="post" action="newEmployeeSubmit.php">	
			<div class="form_description">
				<h2>New Empoloyee Form</h2>
				<p>Please fill out the below information. If you have questions on any of the fields please contact HR <p>
			</div>						
			<input type="hidden" name="country" value="<?php $_SESSION['uname'] ?>">
			
			<div>
				<h4>Name</h4> 
				<label>First Name</label>	
					<input id="firstName" name= "firstName" class="" maxlength="25" size="12" value="">
					<label>Last Name</label>
					<input id="lastName" name= "lastName" class="" maxlength="25" size="12" value="">
			</div>
			<div>							
				<label class="description" for="adUserName">Active Directory User Name</label>
				<input id="adUserName" name="adUserName" class="text medium" type="text" maxlength="8" value=""> 
			</div>
			<div>							
				<label class="description" for="vacation">Vacation </label>
				<input id="vacation" name="vacation" class="text medium" type="text" maxlength="4" value=""> 
			</div>
			<label class="description" for="vacationRate">Vacation Rate </label>
			<input id="vacationRate" name="vacationRate" class="text medium" type="text" maxlength="4" value=""> 

			<div>
			<label class="description" for="oldSickTime">Old Sick Time (time earned before 1/1/98) </label>
			<input id="oldSickTime" name="oldSickTime" class="text medium" type="text" maxlength="4" value=""> 
			</div>

			<label class="description" for="newSickTime">New Sick Time (time earned after 1/198) </label>
			<input id="newSickTime" name="newSickTime" class="text medium" type="text" maxlength="4" value=""> 
			<br />

			<label class="description" for="sickRate">Sick Rate</label>
			<input id="sickRate" name="sickRate" class="text medium" type="text" maxlength="4" value=""> 
			<br />
		
			<label class="choice" for="overTimeEligiable">Is your position eligiable for overtime?</label>
			<select name="overtimeEligiable">
				<option value="0"> No </option>
				<option value="1"> Yes </option>
			</select>
			<br />

			<label class="description" for="managerName">Managers Name</label>
			<select name="manager">
				<option value=''>Select</option>
				<?php 
				buildManagerSelection($managerListDetails);
				?>
			</select>
			<br />

			<label class="description" for="anniversary">Anniversary</label>
			<input id="anniversary" name="anniversary" class="" size="2" maxlength="2" value="" type="date">
			<br />
			
			<input id="submit" name="submit" value="submit" type="submit">
	 
</form>	


