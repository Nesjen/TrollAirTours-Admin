
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
<script>
 
var disableddates = ["10-20-2015", "10-21-2015", "10-12-2015", "10-11-2015"];
 
function EnableSpecificDates(date) {
 
 var m = date.getMonth();
 var d = date.getDate();
 var y = date.getFullYear();
 


 var currentdate = (m + 1) + '-' + d + '-' + y ;
 

 

 for (var i = 0; i < disableddates.length; i++) {
 

 if ($.inArray(currentdate, disableddates) != -1 ) {
 return [true];
 }else
 {
     return [false];
 }
 }
 

 
}
 
 
 $(function() {
 $( "#datepicker" ).datepicker({
 beforeShowDay: EnableSpecificDates
 });
 });
 </script>



 </script>
</head>
<body>
 
<p>Date: <input type="text" id="datepicker"></p>
 
 
</body>
</html>