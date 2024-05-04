<?php
    include"./Header/Header.php";
    session_start();
    if(isset($_POST['btnSave'])){
        $des = $_POST['txtDes'];
        $files = $_FILES['txtFiles']['name'];
        $path = './uploadedFiles/';
        $total = 0;
        for($i = 0 ; $i < count($files) ; $i++){
            $tmp = $_FILES['txtFiles']['tmp_name'][$i];
            $fileExtension = pathinfo($files[$i], PATHINFO_EXTENSION);
            // $type = $_FILES['txtFiles']['type'][$i];
            $size = $_FILES['txtFiles']['size'][$i];
            $newSize = $size / 1000000;
            $total = $total + $newSize;
            if(($fileExtension == 'png' || $fileExtension == 'jpg') && strlen($des) >= 5){
                if($total < 10){
                    move_uploaded_file($tmp , $path.$files[$i]);
                    $_SESSION['msg-save'] = "Data have been saved successfully";
                }
                else{
                    $_SESSION['msg-size'] = "The size must be under 10MB!";
                }
            }
            else if(($fileExtension == 'png' || $fileExtension == 'jpg') && strlen($des) < 5){
                $_SESSION['msg-str'] = "The text must be at least 5 characters!";
            }
            else if(($fileExtension != 'png' || $fileExtension != 'jpg') && strlen($des) >= 5){
                $_SESSION['msg-type'] = "The files must be type as PNG or JPG only!";
            }
            else{
                $_SESSION['msg-type-str'] = "The files must be type as PNG or JPG only! and The text must be at least 5 characters!";
            }
        }
    }
?>
</head>
<style>
    i{
        cursor: pointer;
    }
</style>
<body>
<div class="container-fluid bg-light">
        <div class="container p-5 d-flex justify-content-between">
                <a href="./exercise3.php" class="btn btn-outline-secondary">Back</a>
                <a href="./exercise5.php" class="btn btn-primary">Next</a>
        </div>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container bg-light rounded mt-3">
            <div class="row p-2">
                <div class="col-xl-6">
                    <img src="./uploadedFiles/form-logo.png" alt="" width="80" height="80">
                </div>
                <div class="col-xl-6">
                    <button type="submit" class="btn btn-success float-right mt-3 p-2" name="btnSave"><i class="fa-regular fa-floppy-disk"></i> Submit</button>
                </div>
            </div>
        </div>
        <div class="container mt-2">
            <div class="row">
                <div class="col-xl-12">
                        <?php
                            if(isset($_SESSION['msg-save'])){
                                ?>
                                    <div class="alert alert-success" id="alert">
                                        <?php
                                            echo $_SESSION['msg-save'];
                                            session_destroy();
                                        ?>
                                        <i class="fa-solid fa-xmark float-right p-1" id="exit"></i>
                                    </div>
                                <?php
                            }
                            else if(isset($_SESSION['msg-str'])){
                                ?>
                                    <div class="alert alert-danger" id="alert">
                                        <?php
                                            echo $_SESSION['msg-str'];
                                            session_destroy();
                                        ?>
                                        <i class="fa-solid fa-xmark float-right p-1" id="exit"></i>
                                    </div>
                                <?php
                            }
                            else if(isset($_SESSION['msg-type'])){
                                ?>
                                    <div class="alert alert-danger" id="alert">
                                        <?php
                                            echo $_SESSION['msg-type'];
                                            session_destroy();
                                        ?>
                                        <i class="fa-solid fa-xmark float-right p-1" id="exit"></i>
                                    </div>
                                <?php
                            }
                            else if(isset($_SESSION['msg-size']) && $total < 0.5){
                                ?>
                                    <div class="alert alert-danger" id="alert">
                                        <?php
                                            echo $_SESSION['msg-size'];
                                            session_destroy();
                                        ?>
                                        <i class="fa-solid fa-xmark float-right p-1" id="exit"></i>
                                    </div>
                                <?php
                            }
                            else if(isset($_SESSION['msg-type-str'])){
                                ?>
                                    <div class="alert alert-danger" id="alert">
                                        <?php
                                            echo $_SESSION['msg-type-str'];
                                            session_destroy();
                                        ?>
                                        <i class="fa-solid fa-xmark float-right p-1" id="exit"></i>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
            </div>
        </div>
        <div class="container bg-light rounded">
            <div class="row m-2">
                <div class="col-xl-12 p-2 m-2">
                    <label for="">Descriptions</label>
                    <textarea name="txtDes" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="col-xl-6 mt-2 p-2">
                    <label for="">Upload Files</label>
                    <input type="file" class="form-control" name="txtFiles[]" id="photo" multiple required>
                </div>
                <div class="col-xl-6 mt-3">
                    <img src="./uploadedFiles/image.jpg" id="preViewIMG" alt="" width: = "53%" height="53%">
                </div>
            </div>
        </div>
    </form>
</body>
<script>
    $("#exit").click(()=>{
        $("#alert").fadeOut(400);
    })
    const file = document.getElementById('photo');
    const imgPreview = document.getElementById('preViewIMG');

    file.addEventListener("change", function() {
        var srcFile = this.files[0];
        var reader = new FileReader();
        reader.addEventListener('load', function() {
            imgPreview.src = reader.result;
        })
        reader.readAsDataURL(srcFile);
    })
</script>
</html>