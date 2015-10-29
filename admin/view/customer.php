<?php

$Customers = $GLOBALS["customers"];

?>

<h1>Customer</h1>

<div class="row">

    
    <div class="col-md-12" class="text-right" style="width: 100%;">
        
        
        
        <table class="table table-striped">
            <thead>
            <tr>
                <th>CustomerID</th>
                <th>Gender</th>
                <th>Name</th>
                <th>Telephone</th>
                <th>Address</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
          <?php foreach($Customers as $Customer): ?>
          <tr>
                  <td><?php echo $Customer["CustomerID"]; ?></td>
                  <td><?php echo $Customer["Gender"]; ?></td>
                  <td><?php echo $Customer["FirstName"] . " " . $Customer["LastName"]; ?></td>
                  <td><?php echo "+" . $Customer["AreaCode"] . " " . $Customer["TelephoneNumber"]; ?></td>
                  <td><?php echo $Customer["StreetAddress"] . " ," . $Customer["ZipCode"] . " " . $Customer["City"] . ", " . $Customer["Country"]?></td>
                  <td><?php echo $Customer["Email"]; ?></td>
                  <td>
                        <form action="?page=removeCustomer" method="post">
					<input type="hidden" name="givenCustomerID"  value="<?php echo $Customer["CustomerID"]; ?>" required>
					<button class="btn btn-default" type="submit">Remove</button>
			</form>
                  </td>

          </tr>
    <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>

    <div class="col-md-12" >
        <h2>Add a new Customer</h2>
        <div class="row">
            <div class="col-sm-6" style="width: 100%;">
                <form action="?page=addCustomer" method="post">
                    <div class="form-group">
                        <label for="inputGender" class="sr-only">Gender</label>
                        <input type="text" name="givenGender" class="form-control" placeholder="Gender"
                               required>
                        
                        
                        <label for="inputFirstName" class="sr-only">Firstname</label>
                        <input type="text" name="givenCustomerFN" class="form-control" placeholder="Firstname"
                               required>
                        
                        <label for="inputLastName" class="sr-only">Lastname</label>
                        <input type="text" name="givenCustomerLN" class="form-control" placeholder="Lastname"
                               required>
                        
                        <label for="inputAreaCode" class="sr-only">AreaCode</label>
                        <input type="text" name="givenAreaCode" class="form-control" placeholder="AreaCode"
                                required>
                        
                        <label for="inputTelephone" class="sr-only">Telephone</label>
                        <input type="text" name="givenTelephone" class="form-control" placeholder="Telephone"
                                required>
                        
                        <label for="inputStreet" class="sr-only">Street Address</label>
                        <input type="text" name="givenStreet" class="form-control" placeholder="Street Address"
                                required>
                        
                        <label for="inputCity" class="sr-only">City</label>
                        <input type="text" name="givenCity" class="form-control" placeholder="City"
                                required>
                        
                        <label for="inputZipCode" class="sr-only">ZipCode</label>
                        <input type="text" name="givenZipCode" class="form-control" placeholder="ZipCode"
                                required>
                        
                        <label for="inputEmail" class="sr-only">Email</label>
                        <input type="text" name="givenEmail" class="form-control" placeholder="Email"
                                required>
                        
                        <label for="inputCounty" class="sr-only">Country</label>
                        <input type="text" name="givenCountry" class="form-control" placeholder="Country"
                                required>
                        
                        
                        
                        
                        
                    </div>
                    <button class="btn btn-default" style="width:100%;background-color: #00ff00;" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>

</div>

