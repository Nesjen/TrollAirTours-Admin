<?php

$added = $GLOBALS["added"];
$givenDestinationName = $GLOBALS["givenDestinationName"];
?>

<?php if ($added) { 
header("Location:?page=destination");
}else{?>
<h1>Could not add destination</h1>
<?php } ?>



<a href="?page=destination">Go back to Destination list</a>.
