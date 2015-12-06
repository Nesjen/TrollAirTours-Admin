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
                        <form action="?page=getCustomer" method="post">
                                        <input type="hidden" name="lastStep"  value="customBooking" required>
					<input type="hidden" name="givenCustomerID"  value="<?php echo $CustomBookings["CustomerID"]; ?>" required>
					<button class="btn btn-default" type="submit">CustomerInfo</button>
			</form>
                  </td>
                  <td>
                        <form action="?page=bookingRemove" method="post">
					<input type="hidden" name="givenBookingID"  value="<?php echo $CustomBookings["BookingID"]; ?>" required>
                                        <input type="hidden" name="customBooking"  value="1" required>
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

