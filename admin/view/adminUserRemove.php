<?php

$added = $GLOBALS["added"];
?>

<?php if ($added) { 
header("Location:?page=adminUser");
}else{?>
<h1>Could not remove admin user</h1>
<?php } ?>



<a href="?page=adminUser">Go back to admin user list</a>.
