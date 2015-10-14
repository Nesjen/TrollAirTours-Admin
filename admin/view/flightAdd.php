<?php

$added = $GLOBALS["added"];

?>

<?php if ($added) { 
header("Location:?page=aircraft");
}else{?>
<h1>Could not add Flight</h1>
<?php } ?>



<a href="?page=flight">Go back to Flight list</a>.
