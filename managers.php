
<!DOCTYPE html>
<html>
<head>

<?php 
require_once('timeSheetHeader.php');


// code to enter new manager to database 

// INSERT INTO `timesheet`.`managers` (

		// `Name`, 
		// `Email`, 
		// `Deparment`, 
		// `First Backup ID`
		// ) 
		// VALUES (
		// 	'Tester Testface', 
		// 	'testface@surs.org', 
		// 	'IS', 
		// 	'54'
		// 	);
?>



<!DOCTYPE html>
<html>
<head>

<?php 
require_once('timeSheetHeader.php');






// code to enter new manager to database 

// INSERT INTO `timesheet`.`managers` (

    // `Name`, 
    // `Email`, 
    // `Deparment`, 
    // `First Backup ID`
    // ) 
    // VALUES (
    //  'Tester Testface', 
    //  'testface@surs.org', 
    //  'IS', 
    //  '54'
    //  );
?>



<div id="addNewManager">   
      <h2>New Managers</h2>
      
      <form method = "post" action = "managerSubmit.php">
         <table>
            <tr>
               <td>Name:</td> 
               <td><input type = "text" name = "name"></td>
            </tr>
            
            <tr>
               <td>E-mail:</td>
               <td><input type = "text" name = "email"></td>
            </tr>
            <tr>
               <td>Title:</td>
               <td>
                <input type = "text" name = "title">
               </td>
            </tr>
<!--             <tr>
               <td>First  Backup:</td>
               <td><input type = "text" name = "firstBackup"></td>
            </tr> -->
            <tr>
               <td>
                  <input type = "submit" name = "submit" value = "Submit"> 
               </td>
            </tr>
         </table>
      </form>
</div>


<div id="showManagers">
<?php 
selectManagers($conn);
?>
</div>

<!-- things to add to this page.

show member department,  edit managers, etc. 

do that later -->













