<?php
//////////////////////////////////////////
// Template for customer add result page
//////////////////////////////////////////

// Expected variables:
// $added - list of all customers
// $customerName - last value used in "Add customer" form
$added = $GLOBALS["added"];
$givenEmployeeID = $GLOBALS["givenEmployeeID"];
?>

<?php if ($added) { 
header("Location:?page=employee");
}else{?>
<h1>Could not add employee</h1>
<?php } ?>



<a href="?page=employee">Go back to employee list</a>.
