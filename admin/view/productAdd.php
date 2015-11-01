<?php

$added = $GLOBALS["added"];

?>

<?php if ($added) { 
header("Location:?page=product");
}else{?>
<h1>Could not add Product</h1>
<?php } ?>

 

<a href="?page=product">Go back to product list</a>.
