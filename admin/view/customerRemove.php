<?php

$SeatResRemoved = $GLOBALS["SeatResRemoved"];
$bookingRemoved = $GLOBALS["bookingRemoved"];
$customerRemoved = $GLOBALS["customerRemoved"];

echo $SeatResRemoved;
echo $bookingRemoved;
echo $customerRemoved;
?>

<?php if (($SeatResRemoved)&&($customerRemoved)&&($bookingRemoved) ){ 
header("Location:?page=customer");
}else{?>
<h1>Could not remove customer</h1>
<?php } ?>

 

<a href="?page=customer">Go back to customer list</a>.
