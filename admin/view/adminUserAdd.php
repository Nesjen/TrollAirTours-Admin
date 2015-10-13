<?php

$added = $GLOBALS["added"];
$givenAdminUsername = $GLOBALS["givenAdminUsername"];
?>

<?php if ($added) { 
header("Location:?page=adminUser");
}else{?>
<h1>Could not add admin user</h1>
<?php } ?>



<a href="?page=adminUser">Go back to admin user list</a>.
