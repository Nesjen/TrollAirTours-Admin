<?php
//////////////////////////////////////////
// Template for customer listing page
//////////////////////////////////////////

// TODO - initialize necessary variables here (remember to pass them in the controller's render() function)
// Expected variables:
// $customers - list of all customers
// $customerName - last value used in "Add customer" form
$adminUsers = $GLOBALS["adminUsers"];
//$AdminUsername = $GLOBALS["adminUserName"];


?>
<script>
function confirmRemove() {
    if (confirm("Are you sure you want to delete this user?") == true) {
        document.getElementById("removeForm").submit();    
    }
}
</script>
<h1>AdminUsers</h1>

<div class="row">

    
    <div class="col-md-12" class="text-right" style="width: 100%;">
        
        
        
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Username</th>
            </tr>
            </thead>
            <tbody>
          <?php foreach($adminUsers as $adminUser): ?>
          <tr>
                  <td><?php echo $adminUser["Username"]; ?></td>
                  <td>  </td>
                  <td>
                              <form id="removeForm" action="?page=removeAdminUser" method="post">
					<input type="hidden" name="givenAdminUsername"  value="<?php echo  $adminUser["Username"]; ?>" required>
                                        <button class="btn btn-default" onclick="confirmRemove()"> Remove </button>
			      </form>
                  </td>
          </tr>
    <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>

    <!-- Adding a new customer -->
    <div class="col-md-12" >
        <h2>Add a new employee</h2>
        <div class="row">
            <div class="col-sm-6" style="width: 100%;">
                <form action="?page=addAdminUser" method="post">
                    <div class="form-group">
                        <label for="inputAdminUsername" class="sr-only">Username</label>
                        <input type="text" name="givenAdminUsername" class="form-control" placeholder="Username"
                              required>
                        <label for="inputAdminPassword" class="sr-only">Password</label>
                        <input type="password" name="givenAdminPassword" class="form-control" placeholder="Password"
                              required>
                        
                    </div>
                    <button class="btn btn-default" style="width:100%;background-color: #00ff00;" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>

</div>

