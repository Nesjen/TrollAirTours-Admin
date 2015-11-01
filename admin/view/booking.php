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
                        <form action="?page=removeCustomer" method="post">
					<input type="hidden" name="givenCustomerID"  value="<?php echo $Bookings["BookingID"]; ?>" required>
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

