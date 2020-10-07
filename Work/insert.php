<?php
$checkin = filter_input(INPUT_POST, 'checkin');
$checkout = filter_input(INPUT_POST, 'checkout');
$adults = filter_input(INPUT_POST, 'adults');
$kids = filter_input(INPUT_POST,'kids');

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "rent";
      
$conn = new mysqli ($host, $dbUsername, $dbPassword, $dbname);

if (mysqli_connect_error()) 
{
    die('Connect Error('. mysqli_connect_errno().') '. mysqli_connect_error());
} 
else 
{
    $INSERT = "INSERT INTO rent (checkin, checkout, adults, kids) values('$checkin','$checkout','$adults','$kids')";

    if($conn -> query($INSERT)){
        echo "New recored is inserted sucessfully";
        header('Location: index.php');
    }
    else
    {
        echo "Error: ". $conn -> error;
    }
    $conn->close();

    if(isset($_post[""]))
    {
        header('Location:index.html');
    }
}
?>