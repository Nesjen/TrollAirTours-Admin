<?php

$added = $GLOBALS["added"];
?>

<?php if ($added) { 
header("Location:?page=customBooking");
}else{?>
<h1>Could not remove the custom booking</h1>
<?php } ?>



<a href="?page=customBooking">Go back to CustomBooking</a>.
