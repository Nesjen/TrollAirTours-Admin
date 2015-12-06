<?php

$added = $GLOBALS["added"];
?>

<?php if ($added) { 
header("Location:?page=booking");
}else{?>
<h1>Could not remove booking</h1>
<p> You have to remove the connected seatreservation first!</p>
<?php } ?>



<a href="?page=booking">Go back to Booking</a>.
