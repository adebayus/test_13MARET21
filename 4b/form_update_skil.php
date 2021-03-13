<?php 
    include "config.php";

    $id = $_POST['id'];
    $name = $_POST['name_skill'];
    $user_id = $_POST['user_id'];

    echo "$id $user_id $name";
    
    $query = "UPDATE skil_tb SET name='$name', user_id='$user_id' WHERE id='$id';";
    
    $result = $conn->query($query);

    if ($result === TRUE) {
        // echo "true";
        header("Location: index.php?status=Berhasil Terupdate");
    }
    else{
        echo "Error: " . $result . "<br>" . $conn->error;
        // echo "false";
        header("Location: index.php?status=gagal Terupdate");
    }

?>