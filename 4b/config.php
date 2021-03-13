<?php 
    $conn = mysqli_connect("localhost","root","","dumbways");
    if(!$conn){
        die("connection failed: ". mysqli_connect_error());
    }
?>