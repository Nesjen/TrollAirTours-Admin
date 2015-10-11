<?php
//////////////////////////////////////////
// Template for customer listing page
//////////////////////////////////////////

// TODO - initialize necessary variables here (remember to pass them in the controller's render() function)
// Expected variables:
// $customers - list of all customers
// $customerName - last value used in "Add customer" form
$Destinations = $GLOBALS["destinations"];
$destinationName = $GLOBALS["DestinationName"];


?>

<h1>Destinations</h1>

<div class="row">


    <div class="col-md-12" class="text-right" style="width: 100%;">
        
        
        
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Destination</th>

            </tr>
            </thead>
            <tbody>
          <?php foreach($Destinations as $Destination): ?>
          <tr>
                  <td><?php echo $Destination["DestinationName"]; ?></td>

          </tr>
    <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>

    <div class="col-md-12" >
        <h2>Add a new destination</h2>
        <div class="row">
            <div class="col-sm-6" style="width: 100%;">
                <form action="?page=addDestination" method="post">
                    <div class="form-group">
                        <label for="inputDestination" class="sr-only">DestinationName</label>
                        <input type="text" name="givenDestinationName" class="form-control" placeholder="DestinationName"
                              required>

 
                    </div>
                    <button class="btn btn-default" style="width:100%;background-color: #00ff00;" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>

</div>

