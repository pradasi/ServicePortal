<?php
global $dataPoints;
$dataPoints=array();
$row = 0;
if (($handle = fopen("export_dataframe.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle,40, ",")) !== FALSE) {
       if($row > 0){
           $val = array("y" => $data[1], "label" => $data[0]);
               
             array_push($dataPoints,$val) ;
       } 
        $row++;
            
            
          
    }
    fclose($handle);
    
}  
  
?>   



<?php

 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>

window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Booking in Next Few Months"
	},
	axisY: {
		title: "Bookings in 1000"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
    
    
 
    

</head>
<body>
<!--    <h2 id="heading">Sales Prediction</h2>-->
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    
    
</body>
</html>                  