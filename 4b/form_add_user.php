<?php
    include "config.php";
    if(isset($_POST['submit'])){
        $nama = $_POST['nama_user'];
        
        $rand = rand();
        $imageTmpPth = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];

        $checkDuplicateUser = "SELECT * FROM users_tb";
        $resultCheckDuplicateUser = $conn->query($checkDuplicateUser);
        $isDupli = FALSE;

        while ($rowDupli = $resultCheckDuplicateUser->fetch_assoc()){
            if( $rowDupli['name'] === $nama){
                $isDupli = TRUE;
            }
        }

        if ($isDupli === TRUE){
            header("Location: index.php?status=Data Sudah Ada");
        }else{
            $randImageName= $rand."_".$imageName;
            $query = "INSERT INTO users_tb (id, name, photo) VALUES (NULL, '$nama', '$randImageName')";
            $result = $conn->query($query);
            if ($result === TRUE) {
                move_uploaded_file($imageTmpPth, 'images/'.$randImageName);
                header("Location: index.php?status=Berhasil di tambahkan");
                // echo "New record created successfully";
            }else{
                // echo "Error: " . $sql . "<br>" . $conn->error;
                header("Location: index.php?status=Sql Error");
            }
        }

    }else{
        echo "POST KOSONG";
    }

?>