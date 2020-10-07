<?php  
 $connect = mysqli_connect("localhost", "root", "", "student");  
 $query = "SELECT result, count(*) as number FROM student GROUP BY result";  
 $result = mysqli_query($connect, $query);  
 ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        .form
        {
            padding: 50px;
            margin: 50px;
        }
        button
        {
            margin: 20px;
        }
    </style>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['result', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["result"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Student Who Pass and Fail',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  

</head>
<body>
     <div class="form">
         <center>
         <button class="Astu" type="butoon""><a href="./studentform.html">Add Student Data</a></button>
         <button class="Atec"><a href="./techer.html">Add Teacher Data</a></button>
         <button class="Apar"><a href="./par.html">Add Parent Data</a></button>
        </center>
     </div>
     <br>
     <div class="view">
         <center>
        <button class="Vstu" type="button"><a href="./Sdis.php">View Student Data</a></button>
        <button class="Vtec"><a href="./Tdisplay.php">View Techer Data</a></button>
        <button class="Vpar"><a href="./Pdisplay.php">View Parent Data</a></button>
     </div>
    </center>

    <div style="width:900px;">  <center>
                  
                <br />  
                <div id="piechart" style="width: 900px; height: 500px;"></div>    </center>
           </div>  
      

  
</body>
</html>