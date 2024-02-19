<?php


//Database Connection


$image = $_FILES['files']['tmp_name'];
$imgContent = addslashes(file_get_contents($image));

$format = $_POST['format'];
$name = $_POST['name'];
$DOB = $_POST['DOB'];
$caste = $_POST['caste'];
$phone_number = $_POST['phone_number'];
$case_type = $_POST['case_type'];

$conn = mysqli_connect('localhost', 'root', '', 'crime_record');

if ($conn->connect_error) {

    die('connection Failed' . $conn->connect_error);
} else {

    $stmt = $conn->prepare("INSERT into file_case (image,image_format,name,DOB,caste,phone_number,case_type) values(?,?,?,?,?,?,?)");
    $stmt->bind_param("bssssss",$imgContent ,$format,$name, $DOB, $caste, $phone_number, $case_type);
    $stmt->execute();

    echo '<script>
    document.location.href = "case.html";
    </script>';
    $stmt->close();

    $conn->close();
}
?>