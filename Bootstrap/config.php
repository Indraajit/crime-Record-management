<?php

$conn = mysqli_connect("localhost","root","","crime_record");

if(!$conn)
{
    echo"Connection Failed" . mysqli_connect_error();
}