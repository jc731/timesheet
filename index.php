<?php 
$uname = $_POST['username'];
$username = $uname.$userDomain;
$password = $_POST['password'];
$ldap = ldap_connect($adServer) or die ("Connection routine failed.");
ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3) or die ("versioning set fail");
ldap_set_option($ldap, LDAP_OPT_NETWORK_TIMEOUT, 10); 
/* 10 second timeout */


if ($password) {
    $bind=ldap_bind($ldap, $username, $password);
    if($bind) {
        var_dump($bind);
    }
    else {
        echo "sad";
    }
}
else {
    echo "enter password";
}

// if ($connect){


// echo $uname.'<br />';
// print_r($bind);
// }
// else {
//     echo "fail";
// }
// var_dump($ldap);
// if(isset($uname)){
//     
//     if ($bind = ldap_bind($ldap, $username, $password)) {
//       // log them in!
//         header("location: timesheet.php");
//     } else {
//       // error message
//         echo "fail";
//     }
// }    

?>


<form action="#" method="POST">
    <label for="username">Username: </label><input id="username" type="text" name="username" /> 
    <label for="password">Password: </label><input id="password" type="password" name="password" />        
    <input type="submit" name="submit" value="Submit" />
</form>
