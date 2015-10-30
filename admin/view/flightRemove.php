<?php

$added = $GLOBALS["added"];
$added2 = $GLOBALS["added2"];

?>




<?php if (($added) &&($added2)) { 
header("Location:?page=flight");
}else{?>
<h1>Could not remove Flight</h1>
<?php } ?>



<a href="?page=flight">Go back to Flight list</a>.
