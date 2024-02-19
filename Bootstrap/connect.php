<?php

$name = $_POST['name'];
$number = $_POST['id_number'];
$DOB = $_POST['DOB'];
$station = $_POST['station'];

//Database Connection

$conn = mysqli_connect('localhost','root','','crime_record');
if ($conn->connect_error) 
{
    die('Connection Failed'. $conn->connect_error);
}

else
{
    $stmt = $conn->prepare("insert into register(name, id_number, DOB, station) values(?,?,?,?)");
    $stmt->bind_param("ssss", $name, $number, $DOB, $station);
    $stmt->execute();
    echo '<script>
    document.location.href = "home.html";
    </script>';
    $stmt->close();
    $conn->close();
}