<?php

$CustomBookings = $GLOBALS["customBookings"];


?>

<h1>Custom Bookings</h1>

<div class="row">

    
    <div class="col-md-12" class="text-right" style="width: 100%;">
        
        
        
        <table class="table table-striped">
            <thead>
            <tr>
                <th>BookingID</th>
                <th>CustomerID</th>
                <th>Request</th>
            </tr>
            </thead>
            <tbody>
          <?php foreach($CustomBookings as $CustomBookings): ?>
          <tr>
                  <td><?php echo $CustomBookings["BookingID"]; ?></td>
                  <td><?php echo $CustomBookings["CustomerID"]; ?></td>
                  <td><?php echo $CustomBookings["CustomRequest"]; ?> </td>
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


        </div>

    </div>

</div>

