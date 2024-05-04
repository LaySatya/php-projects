<?php
    include "./Header/Header.php";
    session_start();
    
    if (isset($_POST['btnSave'])) {
        $name = $_POST['txtName'];
        $files = $_FILES['txtFile'];
        $path = './myFilesUploaded/';
        
        if (!empty($files['name'][0])) {
            for ($i = 0; $i < count($files['name']); $i++) {
                $tmp = $files['tmp_name'][$i];
                $fileExtension = pathinfo($files['name'][$i], PATHINFO_EXTENSION);
                $timestamp = date('Ymd-Hi', time());
                $newFileName = $timestamp . '_' . $i . '.' . $fileExtension;
                
                if (!file_exists($path . $newFileName)) {
                    move_uploaded_file($tmp, $path . $newFileName);
                    if (count($files['name']) == 1) {
                        $_SESSION['msg-file'] = "File has been submitted";
                    } else {
                        $_SESSION['msg-files'] = "All files have been submitted";
                    }
                }
                else{
                    $_SESSION['msg-exist'] = "Files already exist!";
                }
            }
        } else {
            $_SESSION['msg-noFiles'] = "Please choose files!";
        }
    }
?>
</head>
<style>
    .container{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
    }
    .fa-regular{
        cursor: pointer;
    }
</style>
<body>
<div class="container-fluid bg-light">
        <div class="p-5 d-flex justify-content-between">
                <a href="./exercise1.php" class="btn btn-outline-secondary">Back</a>
                <a href="./exercise3.php" class="btn btn-primary">Next</a>
        </div>
    </div>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row mt-4">
                <div class="col-xl-6 h-90 p-4 bg-light border border-info mx-auto shadow-lg">
                    <div class="col-xl-12">
                        <h1 class="text-center text-info">
                            Files Submission
                        </h1>
                    </div>
                    <div class="col-xl-12 mt-5">
                        <?php
                            if(isset($_SESSION['msg-file'])){
                                ?>
                                    <div class="alert alert-success" id="alert">
                                        <?php
                                            echo $_SESSION['msg-file'];
                                            session_destroy();
                                        ?>
                                        <i class="fa-solid fa-check"></i>
                                        <i class="fa-regular fa-circle-xmark float-right p-1" id="exit"></i>
                                    </div>
                                <?php
                            }
                            else if(isset($_SESSION['msg-files'])){
                                ?>
                                    <div class="alert alert-success" id="alert">
                                        <?php
                                            echo $_SESSION['msg-files'];
                                            session_destroy();
                                        ?>
                                        <i class="fa-solid fa-check"></i>
                                        <i class="fa-regular fa-circle-xmark float-right p-1" id="exit"></i>
                                    </div>
                                <?php
                            }
                            else if(isset($_SESSION['msg-noFiles'])){
                                ?>
                                    <div class="alert alert-danger" id="alert">
                                        <?php
                                            echo $_SESSION['msg-noFiles'];
                                            session_destroy();
                                        ?>
                                        <i class="fa-regular fa-circle-xmark float-right p-1" id="exit"></i>
                                    </div>
                                <?php
                            }
                            else if(isset($_SESSION['msg-exist'])){
                                ?>
                                    <div class="alert alert-danger" id="alert">
                                        <?php
                                            echo $_SESSION['msg-exist'];
                                            session_destroy();
                                        ?>
                                        <i class="fa-regular fa-circle-xmark float-right p-1" id="exit"></i>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="col-xl-11 mx-auto mt-4 p-2">
                        <label for="" class="h6">Files Name </i></label>
                        <input type="text" class="form-control p-3 border" name="txtName" id="">
                    </div>
                    <div class="col-xl-11 mx-auto mt-4">
                        <label for="" class="h6">Choose Files <i class="fa-regular fa-file"></i></label>
                        <input type="file" class="form-control p-3" name="txtFile[]" id="" multiple>
                    </div>
                    <div class="col-xl-11 mx-auto mt-5">
                        <button type="submit" class="btn btn-success p-2" name="btnSave">Submit <i class="fa-solid fa-file-export"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<script>
    $("#exit").click(function(){
        $("#alert").fadeOut(500);
    })
</script>
</html>