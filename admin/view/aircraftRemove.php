<?php

$added = $GLOBALS["added"];
?>

<?php if ($added) { 
header("Location:?page=aircraft");
}else{?>
<h1>Could not remove aircraft!</h1>
<?php } ?>



<a href="?page=aircraft">Go back to Aircraft list</a>.
