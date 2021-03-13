<?php
    include 'config.php';
    echo $_GET['id'];
    $query = "DELETE FROM users_tb WHERE id=".$_GET['id'].";";
    $result = $conn->query($query);
    if ($result === TRUE) {
        header("Location: index.php?status=Data terhapus");
    }
    else{
        header("Location: index.php?status=gagal terhapus");
    }

?>