<!DOCTYPE html>
<html lang="en" class="bg-blue-400">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../4b/tailwind.css" rel="stylesheet">
    <script src="../4b/main.js"></script>
    <title>Document</title>
</head>
<body id="body" class="box-border my-10">
    <?php 
        include "config.php";
        if ( isset( $_GET['status'])) {
            echo "
                <script> 
                    alert('". $_GET['status'] ."')
                </script>
            ";
        } 
    ?>
    <div style="max-width: 1280px;" class="container mx-auto bg-white p-10">
        <button onclick="showAddListButton();" class="hover:bg-green-600 focus:outline-white relative bg-green-400 py-2 px-6 text-white text-xl rounded-md tracking-wider mt-10">
            Tambah
        </button> 
        <div id="menu_tambah" style="width: 150px;" class="hidden border absolute p-4 text-lg flex flex-col bg-white shadow-xl rounded mt-1">
            <button onclick="addFormUser();" class="hover:bg-none hover:bg-blue-400 hover:text-white py-1 border border-blue-400 text-blue-400 rounded mb-2 "> User </button>
            <button onclick="addFormSkil();" class="hover:bg-none hover:bg-green-400 hover:text-white py-1 border border-green-400 text-green-400 rounded"> Skill </button>
        </div>
        
        <!--  Form User  -->
        <div id="tambah_form_user" class="hidden absolute w-full top-0 bottom-0 left-0 right-0">
            <div id="outside_close" onclick="addFormUser();" class="absolute w-full p-5 top-0 bottom-0 left-0 right-0 bg-black opacity-30 "></div>
           
            <div id="content" style="max-width: 350px; " class="shadow-lg p-3 my-10 relative w-full bg-white p-10 mx-auto">
                <h1 class="text-gray-400 text-2xl font-semibold mb-5"> Tambah Users </h1>
                <form class="" action="form_add_user.php" method="POST" enctype="multipart/form-data">
                    <div id="container_nama_user" style="max-height: 50px;" class="relative flex flex-col h-full py-1 px-4 border mb-3">
                        <label for="nama_user" class="text-xs text-gray-400"> Nama </label>
                        <input type="text" name="nama_user" id="nama_user" class="focus:outline-none text-sm text-green-400" placeholder="Tulis Disini..." required> 
                    </div>
                    <div id="container_image"  class="relative flex flex-col  py-1 px-4 border mb-3">
                        <label for="image" class="text-xs text-gray-400"> Image </label>
                        <input type="file" name="image" id="image" class="focus:outline-none text-sm text-green-400" placeholder="Tulis Disini..." required> 
                    </div>
                    <input type="submit" name="submit" value="Tambahkan" class="cursor-pointer w-full rounded bg-green-400 text-white py-2 px-3">
                </form>
                <button onclick="addFormUser(`tambah_form_user`);" class="mt-2 cursor-pointer w-full rounded bg-gray-400 text-white py-2 px-3"> Close </button>
            </div>
        </div>

        <!-- form skill -->
        <div id="tambah_form_skil" class="hidden absolute w-full top-0 bottom-0 left-0 right-0">
            <div id="outside_close" onclick="addFormskil();" class="absolute w-full p-5 top-0 bottom-0 left-0 right-0 bg-black opacity-30 "></div>
           
            <div id="content" style="max-width: 350px; " class="shadow-lg p-3 my-10 relative w-full bg-white p-10 mx-auto">
                <h1 class="text-gray-400 text-2xl font-semibold mb-5"> Tambah skil </h1>
                <form class="" action="form_add_skil.php" method="POST" enctype="multipart/form-data">
                    <div id="container_nama_skil" style="max-height: 50px;" class="relative flex flex-col h-full py-1 px-4 border mb-3">
                        <label for="nama_skil" class="text-xs text-gray-400"> Nama Skill </label>
                        <input type="text" name="nama_skil" id="nama_skil" class="focus:outline-none text-sm text-green-400" placeholder="Tulis Disini..." required> 
                    </div>
                    <div id="container_user_id" style="max-height: 50px;" class="relative flex flex-col h-full py-1 px-4 border mb-3">
                    <label for="user_id" class="text-xs text-gray-400"> Untuk User </label>
                        <select name="user_id" id="user_id" class="focus:outline-none text-sm text-green-400" >
                            <?php
                                $queryCategoriList = "SELECT * FROM users_tb;";
                                $resultCategoriList = $conn->query($queryCategoriList);
                                while($rowCatList = $resultCategoriList->fetch_assoc()){
                            ?>
                            <option value="<?php echo $rowCatList['id'] ?>"> <?php echo $rowCatList['name'] ?> </option>
                            <?php
                                }
                            ?>
                        </select> 
                    </div>
                    <input type="submit" name="submit" value="Tambahkan" class="cursor-pointer w-full rounded bg-green-400 text-white py-2 px-3">
                </form>
                <button onclick="addFormSkil(`tambah_form_user`);" class="mt-2 cursor-pointer w-full rounded bg-gray-400 text-white py-2 px-3"> Close </button>
            </div>
        </div>

        <div id="skil_template" class="mt-5">
            <h1 class="text-gray-400 text-5xl font-semibold"> List Skil </h1>
            <!-- <p class="text-gray-300 mb-5">*click skil to <span class="text-red-300">Delete</span> </p> -->
            <div id="container_skil" class="grid gap-2 grid-rows-5 grid-flow-col grid-cols-8 text-center text-white mt-5" >
            <?php
                     $showAllListSkil = "SELECT * FROM skil_tb ";
                     $resultShowAllListSkil = $conn->query($showAllListSkil);
                     if($resultShowAllListSkil-> num_rows > 0){
                         while($rowShowAllListSkil = $resultShowAllListSkil->fetch_assoc()){
                ?>
                <div class="grid gap-2 grid-cols-10">
                    <a href="index.php?update_skill=<?php echo $rowShowAllListSkil['id'] ?>&name_skill=<?php echo $rowShowAllListSkil['name']  ?>&user_id=<?php echo $rowShowAllListSkil['user_id'] ?>" style="" class="col-start-1 col-end-9 cursor-pointer bg-blue-400 rounded p-1 overflow-clip "> <?php echo $rowShowAllListSkil['name'] ?> </a>
                    <a href="delete_skil.php?id=<?php echo $rowShowAllListSkil['id']  ?>" class="col-start-9 col-end-11 bg-red-400 text-white"> x </a>
                </div>
                
                <?php
                        }
                    }else{
                ?>
                    <h1 class="font-extrabold tracking-wider text-3xl text-gray-400 row-start-1 row-end-6 col-start-1 col-end-9"> List Skill Kosong </h1>
                <?php        
                    }

                    if (isset($_GET['update_skill'])){
                ?>
                            <div id="update_form_skil" class="absolute w-full top-0 bottom-0 left-0 right-0">
                                
                                <div id="content" style="max-width: 350px; " class="shadow-lg p-3 my-8 relative w-full bg-white p-10 mx-auto">
                                    <h1 class="text-gray-400 text-2xl font-semibold mb-5"> update skil </h1>
                                    <form class="" action="form_update_skil.php" method="POST" enctype="multipart/form-data">
                                        <div id="container_nama_skil" style="max-height: 50px;" class="relative flex flex-col h-full py-1 px-4 border mb-3">
                                            <input type="hidden" id="custId" name="id" value="<?php echo $_GET['update_skill']; ?>">
                                            <label for="name_skill" class="text-xs text-gray-400 text-left"> Nama Skill </label>
                                            <select name="name_skill" id="name_skill" class="focus:outline-none text-sm text-green-400" >
                                                <option value="<?php echo $_GET['name_skill'] ?>" > <?php echo $_GET['name_skill'] ?> </option>
                                            </select> 
                                            <!-- <input type="text" name="nama_skil" id="nama_skil" class="focus:outline-none text-sm text-green-400" placeholder="Tulis Disini..." required>  -->
                                        </div>
                                        <div id="container_user_id" style="max-height: 50px;" class="relative flex flex-col h-full py-1 px-4 border mb-3">
                                        <label for="user_id" class="text-xs text-gray-400 text-left"> Untuk User </label>
                                            <select name="user_id" id="user_id" class="focus:outline-none text-sm text-green-400" >
                                                <?php
                                                    $queryCategoriList = "SELECT * FROM users_tb;";
                                                    $resultCategoriList = $conn->query($queryCategoriList);
                                                    while($rowCatList = $resultCategoriList->fetch_assoc()){
                                                ?>
                                                <option value="<?php echo $rowCatList['id'] ?>" <?php if($rowCatList['id'] === $_GET['user_id']){ echo 'selected'; } ?> > <?php echo $rowCatList['name'] ?> </option>
                                                <?php
                                                    }
                                                ?>
                                            </select> 
                                        </div>
                                        <input type="submit" name="submit" value="Update" class="cursor-pointer w-full rounded bg-green-400 text-white py-2 px-3">
                                    </form>
                                    <div>
                                        <a href="index.php" class="mt-2 block cursor-pointer w-full rounded bg-gray-400 text-white py-2 px-3"> Close </a>
                                    </div>
                                    
                                </div>
                            </div>
                <?php
                    }
                ?>
            </div>
        </div>

        <div id="user_template" class="mt-10">
            <h1 class="text-gray-400 text-5xl font-semibold mb-5"> List User </h1>
            <div id="card_template" class=" grid gap-5 lg:grid-cols-5 xl:grid-cols-6 md:grid-cols-4">
                <?php 
                    $showAllUser = "SELECT * FROM users_tb ";
                    $resultShowAllUser = $conn->query($showAllUser);
                    if($resultShowAllUser-> num_rows > 0){
                        while($rowShowAllUser = $resultShowAllUser->fetch_assoc()){
                ?>
                <div id="card" style="max-width: 180px;" class="rounded ">
                    <img class="" style="width: 180px; height: 180px;" src="images/<?php echo $rowShowAllUser['photo'] ?>" alt="">
                    <h2 class="truncate font-extrabold text-gray-600 text-lg mt-2"> <?php echo $rowShowAllUser['name'] ?> </h2>
                    <div id="skil" class=" text-white text-sm flex flex-wrap gap-2 my-2">
                        <?php
                            $showSkil = "SELECT * FROM skil_tb Where user_id = ". $rowShowAllUser['id'] ;
                            $resultShowSkil = $conn->query($showSkil);
                            if($resultShowSkil->num_rows > 0){
                                while($rowShowSkil = $resultShowSkil->fetch_assoc()){
                        ?>
                        <span class="bg-blue-400 rounded p-1 "> <?php echo $rowShowSkil['name'] ?> </span>
                        <?php
                                }
                            }else {
                        ?>
                        <span class="text-gray-400 font-bold text-lg"> Dont Have Skill </span>
                        <?php
                            }

                        ?>

                    </div>
                    
                    
                    <div id="button" class="text-sm text-base text-white text-center grid grid-cols-1 gap-1 justify-between">
                        <!-- <a id="Detail" class="w-full py-1 bg-green-500 rounded" > Tambah Skil </a> -->
                        <a href="delete_user.php?id=<?php echo $rowShowAllUser['id']  ?>" class="hover:bg-transparent hover:text-red-400 border border-red-400 cursor-pointer py-1 w-full text-center bg-red-500 rounded" > Delete !</a>
                    </div>


                 </div>
                <?php
                        }
                    }
                ?>

            </div>
        </div>

    </div> 

</body>
</html>