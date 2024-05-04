<?php
    include"./header.php";
    session_start();
    include"./usersArray.php";
    $usersFile = 'users.json';
    $users = json_decode(file_get_contents($usersFile), true);
    if(isset($_SESSION['new-users'])){
        array_push($users , $_SESSION['new-users']);
        unset($_SESSION['new-users']);
        file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));
    }
    if(isset($_SESSION['user-name'])){
        foreach($users as $key => $data){
            if($_SESSION['user-name'] == $data['Name']){
                if(isset($_SESSION['edit-user'])){
                    $users[$key] = $_SESSION['edit-user'];
                }
            }
        }
        file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));
    }

?>
</head>
<body>
<div class="container-fluid bg-light">
        <div class="container p-5 d-flex justify-content-between">
                <a href="./exercise5.php" class="btn btn-outline-secondary">Back</a>
                <a href="./exercise7.php" class="btn btn-primary">Next</a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 mt-3">
            <?php
                if(isset($_SESSION['msg-save'])){
                    ?>
                        <div class="alert alert-success">
                            <?php 
                                echo $_SESSION['msg-save'];
                                session_destroy();
                            ?>
                        </div>
                    <?php
                }
                else if(isset($_SESSION['edited'])){
                    ?>
                        <div class="alert alert-success">
                            <?php 
                                echo $_SESSION['edited'];
                                session_destroy();
                            ?>
                        </div>
                    <?php
                }
            ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <h5 class="mt-4 m-3">Users</h5>
                <p class="m-3">A list of all the users in your account including their name, title, email and role.</p>
            </div>
            <div class="col-xl-6">
                <a href="./addUser.php" class="btn btn-success float-right m-5 p-2">Add Users <i class="fa-solid fa-user-plus p-1"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <table class="table table-striped table-responsive-sm">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php 
                                foreach($users as $result){
                                    ?>
                                        <tr>
                                            <td>
                                                <?php
                                                    echo $result['Name'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $result['Title'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $result['Email'];?>
                                            </td>
                                            <td>
                                                <?php echo $result['Role'];?>
                                            </td>
                                            <td>
                                                <a href="./editUser.php?name=<?php echo $result['Name'];?>&&email=<?php echo $result['Email'];?>&&title=<?php echo $result['Title'];?>&&role=<?php echo $result['Role'];?>&&action=Update" 
                                                class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                                            </td>
                                        </tr>
                                    <?php 
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>