<?php
$preFlights = $GLOBALS["preFlights"];

?>


<h1>Flights Today</h1>

<div class="row">
    
    <div class="col-md-12" class="text-right" style="width: 100%;">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>FlightID</th>
                <th>AirCraft</th>
                <th>FlightDate</th>
                <th>Departure</th>
                <th>Destination</th>
                <th>Price</th>
                <th>Seats Available</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($preFlights as $preFlight): ?>
                  <tr>
                          <td><?php echo $preFlight["FlightID"]; ?></td>
                          <td><?php echo $preFlight["RegID"]; ?></td>
                          <td><?php echo $preFlight["FlightDate"]; ?></td>
                          <td><?php echo $preFlight["Departure"]; ?></td>
                          <td><?php echo $preFlight["TourType"]; ?></td>
                          <td><?php echo $preFlight["FlightPrice"]; ?></td>
                          <td><?php echo $preFlight["SeatsAvailable"]; ?></td>
                          <td>
                              <form action="?page=seatReservation" method="post">
					<input type="hidden" name="FlightID"  value="<?php echo $preFlight["FlightID"]; ?>" required>
					<button class="btn btn-default" type="submit"> Seats </button>
			      </form>
                         </td>
                          <td>
                              <form action="?page=removeFlight" method="post">
					<input type="hidden" name="givenFlightID"  value="<?php echo $preFlight["FlightID"]; ?>" required>
					<button class="btn btn-default" type="submit"> Remove </button>
			      </form>
                          </td>
                  </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>

    

</div>

