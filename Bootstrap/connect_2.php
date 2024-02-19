<?php

$station_name = $_POST['station_name'];
$id_number = $_POST['id_number'];
$area = $_POST['area'];
$pin_code = $_POST['pin_code'];
$phone_number = $_POST['phone_number'];
$district = $_POST['district'];

//Database Connection

$conn = mysqli_connect('localhost','root','','crime_record');
if ($conn->connect_error) 
{
    die('Connection Failed'. $conn->connect_error);
}

else
{
    $stmt = $conn->prepare("insert into stations(station_name, id_number, area, pin_code, phone_number, district) values(?,?,?,?,?,?)");
    $stmt->bind_param("sssiss", $station_name, $id_number, $area, $pin_code, $phone_number, $district);
    $stmt->execute();
    echo '<script>
    document.location.href = "station.html";
    </script>';
    $stmt->close();
    $conn->close();
}