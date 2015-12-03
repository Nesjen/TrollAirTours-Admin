<?php
//////////////////////////////////////////
// Template for customer add result page
//////////////////////////////////////////

// Expected variables:
// $added - list of all customers
// $customerName - last value used in "Add customer" form
$added = $GLOBALS["added"];
$feedback = $GLOBALS["feedback"];
?>

<?php if ($added) { 
header("Location:?page=employee");
}else{?>
<h1>Error</h1>
<h4> <?php echo $feedback ?> </h4>
<?php } ?>



<a href="?page=employee">Go back to employee list</a>.
