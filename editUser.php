<?php
include "./header.php";
session_start();
include"./usersArray.php";

if (isset($_GET['action']) && $_GET['action'] == "Update") {
    $pName = $_GET['name'];
    $pEmail = $_GET['email'];
    $pTitle = $_GET['title'];
    $pRole = $_GET['role'];
    $_SESSION['user-name'] = $pName;
} else {
    $pName = '';
    $pEmail = '';
    $pTitle = '';
    $pRole = '';
}

if (isset($_POST['btnUpdate'])) {
    $newName = $_POST['txtName'];
    $newTitle = $_POST['txtTitle'];
    $newEmail = $_POST['txtEmail'];
    $newRole = $_POST['txtRole'];

    $editUser = [
        'Name' => $newName,
        'Title' => $newTitle,
        'Email' => $newEmail,
        'Role' => $newRole,
    ];
    $_SESSION['edit-user'] = $editUser;
    $_SESSION['edited'] = "User has been updated successfully";
    
    header('Location: Exercise6.php');
}



?>
</head>

<body>
    <form action="./editUser.php" method="post">
        <div class="container bg-secondary mt-5 rounded">
            <div class="row">
                <div class="col-xl-6">
                    <h1 class="text-white text-uppercase">
                        <i class="fa-regular fa-circle-user"></i>
                        Update Users
                    </h1>
                </div>
                <div class="col-xl-6">
                    <button type="submit" class="btn btn-success float-right mt-2 " name="btnUpdate">Update <i class="fa-regular fa-floppy-disk"></i></button>
                    <a href="./Exercise6.php" class="btn btn-primary mt-2 float-right m-2"><i class="fa-solid fa-arrow-left"></i> Back</a>
                </div>
            </div>
        </div>
        <div class="container bg-light mt-4 p-3">
            <div class="row">
                <div class="col-xl-6 mt-2">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="txtName" id="" required value="<?php echo $pName; ?>">
                </div>
                <div class="col-xl-6 mt-2">
                    <label for="">Title</label>
                    <select name="txtTitle" id="" class="form-control">
                        <option value="<?php echo $pTitle; ?>">
                            <?php echo $pTitle; ?>
                        </option>
                        <?php
                        foreach ($users as $res) {
                        ?>
                            <option value="<?php echo $res['Title']; ?>">
                                <?php echo $res['Title']; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-xl-6 mt-2">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="txtEmail" id="" value="<?php echo $pEmail ?>">
                </div>
                <div class="col-xl-6 mt-2">
                    <label for="">Role</label>
                    <select name="txtRole" class="form-control" id="">
                        <option value="<?php echo $pRole; ?>">
                            <?php echo $pRole; ?>
                        </option>
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