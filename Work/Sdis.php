<!DOCTYPE html>
<html>
<head>
<title>Student Table</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}

tr:nth-child(even) {background-color: #f2f2f2}
</style>


</head>
<body>
<button class="b1"><a href="./index.php">Home Page</a></button>

<table>
<tr>
<th>Name</th>
<th>Marks</th>
<th>Result</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "student");



// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT name, marks, result FROM student";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) 
{
echo "<tr><td>" . $row["name"]. "</td><td>" . $row["marks"] . "</td><td>" . $row["result"]. "</td></tr>";
}
echo "</table>";
} 
else { echo "0 results"; }
$conn->close();
?>
</table>



</body>
</html>