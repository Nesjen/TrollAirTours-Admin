<?php

$customerID = $GLOBALS["customerID"];

?>

<?php if ((isset($customerID)) || ($customerID != 0)) { 
header("Location:?page=customer");
}else{?>
<h1>Could not add customer</h1>
<?php } ?>

 

<a href="?page=customer">Go back to customer list</a>.
