<?php

$added = $GLOBALS["added"];
?>

<?php if ($added) { 
header("Location:?page=flight");
}else{?>
<h1>Could not remove seatreservation</h1>
<?php } ?>



<a href="?page=flight">Go back to Flight list</a>.
