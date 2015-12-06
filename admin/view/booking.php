<?php

$Bookings = $GLOBALS["bookings"];


?>

<h1>Tour-Bookings</h1>

<div class="row">

    
    <div class="col-md-12" class="text-right" style="width: 100%;">
        
        
        
        <table class="table table-striped">
            <thead>
            <tr>
                <th>BookingID</th>
                <th>CustomerID</th>
            </tr>
            </thead>
            <tbody>
          <?php foreach($Bookings as $Bookings): ?>
          <tr>
                  <td><?php echo $Bookings["BookingID"]; ?></td>
                  <td><?php echo $Bookings["CustomerID"]; ?></td>
                  <td>
                        <form action="?page=getCustomer" method="post">
                                        <input type="hidden" name="lastStep"  value="booking" required>
					<input type="hidden" name="givenCustomerID"  value="<?php echo $Bookings["CustomerID"]; ?>" required>
					<button class="btn btn-default" type="submit">CustomerInfo</button>
			</form>
                  </td>
                  <td>
                        <form action="?page=bookingRemove" method="post">
					<input type="hidden" name="givenBookingID"  value="<?php echo $Bookings["BookingID"]; ?>" required>
                                        <input type="hidden" name="customBooking"  value="0" required>
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

