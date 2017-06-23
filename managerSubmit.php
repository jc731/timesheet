<?php 

require_once('timeSheetHeader.php');

// print_r($_POST);

$name = $email = $title = $firstBackup = "";

$name = $_POST['name'];

$email = $_POST['email'];

$title = $_POST['title'];

$firstBackup = $_POST ['firstBackup'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$query="
	INSERT INTO `timesheet`.`managers` (`Name`, `Email`, `Title`)

    VALUES (
    '" . $name . "',
    '" . $email . "',
    '" . $title . "'
     );";

if ($conn->query($query) === TRUE) {
	echo "New Manager Submitted Successfully";
} else {
	echo "Error: " .$sql."<br>" . $conn->error;
}

$conn -> close();



header('Location: managers.php');
?>



