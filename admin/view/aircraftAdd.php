<?php

$added = $GLOBALS["added"];
$givenRegID = $GLOBALS["givenRegID"];
?>

<?php if ($added) { 
header("Location:?page=aircraft");
}else{?>
<h1>Could not add aircraft</h1>
<?php } ?>



<a href="?page=aircraft">Go back to Aircraft list</a>.
