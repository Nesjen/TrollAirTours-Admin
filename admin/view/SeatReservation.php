<?php

$SeatReservations = $GLOBALS["seatReservations"];

$FlightID = $GLOBALS["FlightID"];

?>

<h1>Seat-reservations for flight <?php echo $FlightID ?> </h1>

<div class="row">

    
    <div class="col-md-12" class="text-right" style="width: 100%;">
        
        
        
        <table class="table table-striped">
            <thead>
            <tr>
                <th>SeatNumber</th>
                <th>CustomerID</th>
                <th>BookingID</th>
                <th>Products</th>
            </tr>
            </thead>
            <tbody>
          <?php foreach($SeatReservations as $SeatReservation): ?>
          <tr>
                  <td><?php echo $SeatReservation["SeatNumber"]; ?></td>
                  <td><?php echo $SeatReservation["CustomerID"]; ?></td>
                  <td><?php echo $SeatReservation["BookingID"]; ?> </td>
                  <td><?php echo $SeatReservation["ProductIDs"]; ?> </td>
                  <td>
                        <form action="?page=getCustomer" method="post">
                                        <input type="hidden" name="lastStep"  value="seatReservation" required>
					<input type="hidden" name="givenCustomerID"  value="<?php echo $SeatReservation["CustomerID"]; ?>" required>
					<button class="btn btn-default" type="submit">CustomerInfo</button>
			</form>
                  </td>
                  
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
<a href="?page=flight">Go back to Flight list</a>.
    </div>

</div>

