<?php
$pname = filter_input(INPUT_POST,'pname');
$psign = filter_input(INPUT_POST,'psign');

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
    $INSERT = "INSERT INTO par(pname,psign) values('$pname','$psign')";

    if($conn -> query($INSERT)) {
        echo "New recored is inserted sucessfully";
    }
    else
    {
        echo "Error:".$conn -> error;

    }
    header('Location: index.php');
    $conn->close();

    if(isset($_post[""]))
    {
        header('Location:index.html');
    }
}
?>