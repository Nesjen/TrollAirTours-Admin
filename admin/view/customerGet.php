<?php

$Customers = $GLOBALS["Customers"];
$CustomerID = $GLOBALS["CustomerID"];
$lastStep = $GLOBALS["lastStep"];

?>

<h1>Customer Details for CustomerID <?php echo $CustomerID ?> </h1>

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
                  

          </tr>
    <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>

  <a href="?page=<?php echo $lastStep ?>">Go back to <?php echo $lastStep ?> list</a>.

</div>

