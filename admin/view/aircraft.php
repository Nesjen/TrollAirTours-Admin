<?php
//////////////////////////////////////////
// Template for customer listing page
//////////////////////////////////////////

// TODO - initialize necessary variables here (remember to pass them in the controller's render() function)
// Expected variables:
// $customers - list of all customers
// $customerName - last value used in "Add customer" form
$Aircrafts = $GLOBALS["aircrafts"];
$RegID = $GLOBALS["RegID"];


?>


<script>
function confirmRemove() {
    if (confirm("By removing this Aircraft, all flights and seatreservations will be removed!") == true) {
        document.getElementById("removeForm").submit();    
    }
}
</script>

<h1>Aircraft</h1>

<div class="row">

    <!-- Listing all customers -->
    <div class="col-md-12" class="text-right" style="width: 100%;">
        
        
        
        <table class="table table-striped">
            <thead>
            <tr>
                <th>RegID</th>
                <th>AircraftType</th>
                <th>Number of seats</th>
            </tr>
            </thead>
            <tbody>
          <?php foreach($Aircrafts as $Aircraft): ?>
          <tr>
                  <td><?php echo $Aircraft["RegID"]; ?></td>
                  <td><?php echo $Aircraft["AircraftType"]; ?></td>
                  <td><?php echo $Aircraft["NumberOfSeats"]; ?></td>
                  <td>
                              <form id="removeForm" action="?page=removeAircraft" method="post">
					<input type="hidden" name="RegID"  value="<?php echo $Aircraft["RegID"]; ?>" required>
                                        
			      </form>
                      <button class="btn btn-default" onclick="confirmRemove()"> Remove </button>
                 </td>
          </tr>
    <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>

    <!-- Adding a new customer -->
    <div class="col-md-12" >
        <h2>Add a new aircraft</h2>
        <div class="row">
            <div class="col-sm-6" style="width: 100%;">
                <form action="?page=addAircraft" method="post">
                    <div class="form-group">
                        <label for="inputID" class="sr-only">RegID</label>
                        <input type="text" name="givenRegID" class="form-control" placeholder="RegID"
                              required>
                        
                        <label for="inputAircraftType" class="sr-only">AircraftType</label>
                        <input type="text" name="givenAircraftType" class="form-control" placeholder="AircraftType"
                               required>
                        
                        <label for="inputNumberOfSeats" class="sr-only">NumberOfSeats</label>
                        <input type="text" name="givenNumberOfSeats" class="form-control" placeholder="NumberOfSeats"
                               required>
                        
                        
                        
                    </div>
                    <button class="btn btn-default" style="width:100%;background-color: #00ff00;" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>

</div>

