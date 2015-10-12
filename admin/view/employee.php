<?php
//////////////////////////////////////////
// Template for customer listing page
//////////////////////////////////////////

// TODO - initialize necessary variables here (remember to pass them in the controller's render() function)
// Expected variables:
// $customers - list of all customers
// $customerName - last value used in "Add customer" form
$Employees = $GLOBALS["employees"];
$EmployeeID = $GLOBALS["employeeID"];


?>

<h1>Employee</h1>

<div class="row">

    <!-- Listing all customers -->
    <div class="col-md-12" class="text-right" style="width: 100%;">
        
        
        
        <table class="table table-striped">
            <thead>
            <tr>
                <th>EmployeeID</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Position</th>
            </tr>
            </thead>
            <tbody>
          <?php foreach($Employees as $Employee): ?>
          <tr>
                  <td><?php echo $Employee["EmployeeID"]; ?></td>
                  <td><?php echo $Employee["FirstName"]; ?></td>
                  <td><?php echo $Employee["LastName"]; ?></td>
                  <td><?php echo $Employee["Position"]; ?></td>
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
                <form action="?page=addEmployee" method="post">
                    <div class="form-group">
                        <label for="inputID" class="sr-only">Employee ID</label>
                        <input type="text" name="givenEmployeeID" class="form-control" placeholder="Employee ID"
                              required>
                        
                        <label for="inputFirstName" class="sr-only">First name</label>
                        <input type="text" name="givenEmployeeFN" class="form-control" placeholder="Firstname"
                               required>
                        
                        <label for="inputLastName" class="sr-only">First name</label>
                        <input type="text" name="givenEmployeeLN" class="form-control" placeholder="Lastname"
                               required>
                        
                        <label for="inputPosition" class="sr-only">First name</label>
                        <input type="text" name="givenEmployeeP" class="form-control" placeholder="Position"
                                required>
                        
                        
                    </div>
                    <button class="btn btn-default" style="width:100%;background-color: #00ff00;" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>

</div>

