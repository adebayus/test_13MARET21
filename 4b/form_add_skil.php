<?php 
    include 'config.php';
    // echo $_POST['nama_skil'];
    if(isset($_POST['submit'])){
        $nama = $_POST['nama_skil'];
        $user_id = $_POST['user_id'];

        $checkDuplicateSkil = "SELECT * FROM skil_tb";
        $resultCheckDuplicateSkil = $conn->query($checkDuplicateSkil);
        $isDupli = FALSE;

        while ($rowDupli = $resultCheckDuplicateSkil->fetch_assoc()){
            if( $rowDupli['name'] === $nama){
                $isDupli = TRUE;
            }
        }
        if ($isDupli === TRUE){
            header("Location: index.php?status=Data Sudah Ada");
        }else{
            $query = "INSERT INTO skil_tb (id, name, user_id) VALUES (NULL, '$nama', $user_id)";
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
        echo "post kosong";
    }

?>