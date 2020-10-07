<?php
$name = filter_input(INPUT_POST,'name');
$marks = filter_input(INPUT_POST,'marks');
$result = filter_input(INPUT_POST,'result');

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "student";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if(mysqli_connect_error())
{
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());

}
else
{
    $INSERT = "INSERT INTO student(name,marks,result) values('$name','$marks','$result')";

    if($conn -> query($INSERT)) {
        echo "New recored is inserted sucessfully";
        header('Location: index.php');
    }
    else
    {
        echo "Error:".$conn -> error;

    }
    $conn->close();

    if(isset($_post[""]))
    {
        header('Location: index.html');
    }
}
?>