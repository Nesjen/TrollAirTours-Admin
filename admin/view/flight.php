<?php
$Flights = $GLOBALS["flights"];
$aircraftsfk = $GLOBALS["aircrafts"];
$FlightCrews = $GLOBALS["flightCrews"];
$Employees = $GLOBALS["employees"];
$pilots = $GLOBALS["pilots"];
$guides = $GLOBALS["guides"];
?>


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
                <th>TourType</th>
                <th>Pilot</th>
                <th>Guide</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($Flights as $Flight): ?>
                  <tr>
                          <td><?php echo $Flight["FlightID"]; ?></td>
                          <td><?php echo $Flight["RegID"]; ?></td>
                          <td><?php echo $Flight["FlightDate"]; ?></td>
                          <td><?php echo $Flight["Departure"]; ?></td>
                          <td><?php echo $Flight["TourType"]; ?></td>
                          <?php foreach($FlightCrews as $FlightCrew) :
                              if($FlightCrew["FlightID"] ==$Flight["FlightID"] )
                              { ?>
                                  <td><?php echo $Employees[$FlightCrew["EmployeeID"]]; ?> </td>   
                              <?php } ?>
                          <?php  endforeach; ?>
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
                           <option>Select Aircraft</option>
                            <?php foreach($aircraftsfk as $aircraftfk): ?> 
                                    <option><?php echo $aircraftfk["RegID"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                        
                        <label for="inputPilotIDFK" class="sr-only">PilotID</label>
                        <select name="givenPilotIDFK" class="form-control" id="sel1" required>
                           <option>Select Pilot</option>
                            <?php foreach($pilots as $pilot): ?> 
                                    <option><?php echo $pilot["EmployeeID"];  ?></option>
                            <?php endforeach; ?>
                        </select>
                        
                        <select name="givenGuideIDFK" class="form-control" id="sel1" required>
                           <option>Select Guide</option>
                            <?php foreach($guides as $guide): ?> 
                                    <option><?php echo $guide["EmployeeID"];  ?></option>
                            <?php endforeach; ?>
                        </select>
                        
                        
                        
                        <label for="inputFlightID" class="sr-only">FlightID</label>
                        <input type="text" name="givenFlightID" class="form-control" placeholder="FlightID"
                              required>
                        
                        <label for="inputFlightDate" class="sr-only">FlightDate</label>
                        <input type="text" name="givenFlightDate" class="form-control" placeholder="FlightDate"
                               required>
                        
                        <label for="inputDeparture" class="sr-only">Departure</label>
                        <input type="text" name="givenDeparture" class="form-control" placeholder="Departure"
                                required>
                        
                        <label for="inputTourType" class="sr-only">TourType</label>
                        <input type="text" name="givenTourType" class="form-control" placeholder="TourType"
                                required>
                        
                        
                    </div>
                    <button class="btn btn-default" style="width:100%;background-color: #00ff00;" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>

</div>