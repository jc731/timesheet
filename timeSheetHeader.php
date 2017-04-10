<?php 
    // this is where the DB connection stuff is stored
	require("../header.php");
    //move to functions later, but leaving here for testing (1 is old time 2 is no old time)
   
	require("timeSheetfunctions.php");
?>


<script src ="js/timesheet.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"> 
</script>
<script> 
    $(document).ready(function() {
        calculateTotals2();

        // buildArray();
        $("input").keyup(calculateTotals2);
    });
<?php 
    if (!empty($oldSickTime)) {
        echo'
            $(document).ready(function() {
                calculateOldSick()
                $("input").keyup(calculateOldSick);
            });
        ';
    } else {
        echo '
            $(document).ready(function() {
                calculateSick()
            $("input").keyup(calculateSick);
            });
        ';
    }

    ?>
</script>

<link rel="stylesheet" type="text/css" href="css/master.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">

</head>