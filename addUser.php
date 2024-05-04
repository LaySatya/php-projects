<?php
    include "./header.php";
    session_start();
    include"./usersArray.php";
    if(isset($_POST['btnSave'])){
        $name = $_POST['txtName'];
        $title = $_POST['txtTitle'];
        $email = $_POST['txtEmail'];
        $role = $_POST['txtRole'];

        $newUsers = [
            'Name' => $name,
            'Title' => $title,
            'Email' => $email,
            'Role' => $role,
        ];

        $_SESSION['new-users'] = $newUsers;
        $_SESSION['msg-save'] = "Data saved successfully";
        header('location: Exercise6.php');
    }
?>
</head>

<body>
    <form action="./addUser.php" method="post">
        <div class="container bg-secondary mt-5 rounded">
            <div class="row">
                <div class="col-xl-6">
                    <h1 class="text-white text-uppercase">
                        <i class="fa-regular fa-circle-user"></i>
                        New Users
                    </h1>
                </div>
                <div class="col-xl-6">
                    <button type="submit" class="btn btn-success float-right mt-2 " name="btnSave">Add <i class="fa-regular fa-floppy-disk"></i></button>
                    <a href="./Exercise6.php" class="btn btn-primary mt-2 float-right m-2"><i class="fa-solid fa-arrow-left"></i> Back</a>
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
                    <label for="">Title</label>
                    <select name="txtTitle" id="" class="form-control">
                        <?php
                            foreach($users as $res){
                                ?>
                                    <option value="<?php echo $res['Title'];?>">
                                        <?php echo $res['Title'];?>
                                    </option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="col-xl-6 mt-2">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="txtEmail" id="">
                </div>
                <div class="col-xl-6 mt-2">
                    <label for="">Role</label>
                    <select name="txtRole" class="form-control" id="">
                        <option value="Admin">Admin</option>
                        <option value="Member">Member</option>
                        <option value="Owner">Owner</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
</body>

</html>