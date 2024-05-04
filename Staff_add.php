<?php
    include "./Header/Header.php";
    session_start();
    if(isset($_POST['btnSave'])){
        $name = $_POST['txtName'];
        $position = $_POST['txtPosition'];
        $role = $_POST['txtRole'];
        $file = $_FILES['txtFile'];
        $path = './img/';
        for($i = 0 ; $i < count($file['name']) ; $i++){
            $tmp = $file['tmp_name'][$i];
            move_uploaded_file($tmp ,$path.$file['name'][$i]);
            $newStaff = [
                'avatar' => $file['name'][$i],
                'name' => $name,
                'position' => $position,
                'role' => $role
            ];
        }
        $_SESSION['new_staff'] = $newStaff;
    
        $_SESSION['msg-save'] = "Data Saved Successfully";
        header('location: exercise3.php');
    }
?>
</head>

<body>
    <form action="./Staff_add.php" method="post" enctype="multipart/form-data">
        <div class="container bg-secondary mt-5 rounded">
            <div class="row">
                <div class="col-xl-6">
                    <h1 class="text-white text-uppercase">
                        <i class="fa-regular fa-circle-user"></i>
                        New Staffs
                    </h1>
                </div>
                <div class="col-xl-6">
                    <button type="submit" class="btn btn-success float-right mt-2 " name="btnSave">Add <i class="fa-regular fa-floppy-disk"></i></button>
                    <a href="./exercise3.php" class="btn btn-primary mt-2 float-right m-2"><i class="fa-solid fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
        <div class="container bg-light mt-4 p-3">
            <div class="row">
                <div class="col-xl-6 mt-2">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="txtName" id="" required>
                </div>
                <div class="col-xl-6 mt-2">
                    <label for="">Position</label>
                    <input type="text" class="form-control" name="txtPosition" id="" required>
                </div>
                <div class="col-xl-6 mt-2">
                    <label for="">Role</label>
                    <select name="txtRole" class="form-control" id="">
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <div class="col-xl-6 mt-2">
                    <label for="">Avatar</label>
                    <input type="file" class="form-control" name="txtFile[]" id="photo" multiple>
                </div>
                <div class="col-xl-6 mt-2 float-right">
                    <img src="./img/image.jpg" id="preViewIMG" alt="" width="100%" height="300" style="object-fit:contain;">
                </div>
            </div>
        </div>
    </form>
</body>
<script>
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