<?php
$flightsFK = $GLOBALS["flightFK"];
$Flights = $GLOBALS["flights"];
$flightFkAndNames = $GLOBALS["flightFkAndNames"];
$aircraftsfk = $GLOBALS["aircrafts"];
$FlightCrews = $GLOBALS["flightCrews"];
$Employees = $GLOBALS["employees"];
$pilots = $GLOBALS["pilots"];
$guides = $GLOBALS["guides"];
?>
<script>
function confirmRemove() {
    if (confirm("By removing this Flight, all seatreservations will be removed!") == true) {
        document.getElementById("removeForm").submit();    
    }
}
</script>

<h1>Flights</h1>

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
                <th>Pilot</th>
                <th>Guide</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($flightFkAndNames as $flightFkAndName): ?>
                  <tr>
                          <td><?php echo $flightFkAndName["FlightID"]; ?></td>
                          <td><?php echo $flightFkAndName["RegID"]; ?></td>
                          <td><?php echo $flightFkAndName["FlightDate"]; ?></td>
                          <td><?php echo $flightFkAndName["Departure"]; ?></td>
                          <td><?php echo $flightFkAndName["TourType"]; ?></td>
                          <td><?php echo $flightFkAndName["FlightPrice"]; ?></td>
                          <td><?php echo $flightFkAndName["SeatsAvailable"]; ?></td>
                          <td><?php echo $flightFkAndName["PilotFN"] . " " . $flightFkAndName["PilotLN"]; ?></td> 
                          <td><?php echo $flightFkAndName["GuideFN"] . " " . $flightFkAndName["GuideLN"]; ?></td>
                          <td>
                              <form action="?page=seatReservation" method="post">
					<input type="hidden" name="FlightID"  value="<?php echo $flightFkAndName["FlightID"]; ?>" required>
					<button class="btn btn-default" type="submit"> Seats </button>
			      </form>
                         </td>
                          <td>
                              <form id="removeForm" action="?page=removeFlight" method="post">
					<input type="hidden" name="givenFlightID"  value="<?php echo $flightFkAndName["FlightID"]; ?>" required>
                                        <button class="btn btn-default" onclick="confirmRemove()"> Remove </button>
			      </form>
                          </td>
                  </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>

    <!-- Adding a new customer -->
    <div class="col-md-12" >
        <h2>Add a new flight</h2>
        <div class="row">
            <div class="col-sm-6" style="width: 100%;">
                <form action="?page=addFlight" method="post">
                    <div class="form-group">
                        <label for="inputRegIDFK" class="sr-only">Aircraft RegID</label>
                        <select name="givenRegIDFK" class="form-control" id="sel1" required>
                           <option> - Select Aircraft - </option>
                            <?php foreach($aircraftsfk as $aircraftfk): ?> 
                                    <option><?php echo $aircraftfk["RegID"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                        
                        <label for="inputPilotIDFK" class="sr-only">PilotID</label>
                        <select name="givenPilotIDFK" class="form-control" id="sel1" required>
                           <option> - Select Pilot - </option>
                            <?php foreach($pilots as $pilot): ?> 
                           <option value="<?php echo $pilot["EmployeeID"]; ?>"><?php echo $pilot["FirstName"] . " " . $pilot["LastName"] ;  ?></option>
                            <?php endforeach; ?>
                        </select>
                        
                        <select name="givenGuideIDFK" class="form-control" id="sel1" required>
                           <option> - Select Guide - </option>
                            <?php foreach($guides as $guide): ?> 
                                     <option value="<?php echo $guide["EmployeeID"]; ?>"><?php echo $guide["FirstName"] . " " . $guide["LastName"] ;  ?></option>
                            <?php endforeach; ?>
                        </select>
                        
                        <label for="inputTourType" class="sr-only">Destination</label>
                        <select name="givenTourType" class="form-control" id="sel1" required>
                            <option> - Select Destination - </option>
                            <option>Geiranger</option>
                            <option>Briksdalen</option>
                            <option>Aakneset</option>
                            <option>Custom</option>
                        </select>
                        
                        <label for="inputFlightPrice" class="sr-only">FlightPrice in NOK</label>
                        <input type="text" name="givenFlightPrice" class="form-control" placeholder="FlightPrice"
                              required>
                        
                        <label for="inputSeatsAvailable" class="sr-only">Seats Available</label>
                        <input type="text" name="givenSeatsAvailable" class="form-control" placeholder="Seats Available"
                              required>
                        
                        
                        <label for="inputFlightID" class="sr-only">FlightID</label>
                        <input type="text" name="givenFlightID" class="form-control" placeholder="FlightID"
                              required>
                        
                        <label for="inputFlightDate" class="sr-only">FlightDate</label>
                        <input type="text" name="givenFlightDate" class="form-control" placeholder="FlightDate (yyy-mm-dd)"
                               required>
                        
                        <label for="inputDeparture" class="sr-only">Departure </label>
                        <input type="text" name="givenDeparture" class="form-control" placeholder="Departure (hh:mm)"
                                required>
                        
                     
                        
                        
                        
                    </div>
                    <button class="btn btn-default" style="width:100%;background-color: #00ff00;" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>

</div>