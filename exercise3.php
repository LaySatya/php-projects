<?php
include "./Header/Header.php";
session_start();

$staffs = [
    [
        'avatar' => '1.jpg',
        'name' => 'Jane Cooper',
        'position' => 'Paradigm Representative',
        'role' => 'Admin'
    ],
    [
        'avatar' => '2.jpg',
        'name' => 'Cody Fisher',
        'position' => 'Lead Security Associate',
        'role' => 'Admin'
    ],
    [
        'avatar' => '3.jpg',
        'name' => 'Esther Howard',
        'position' => 'Assurance Administrator',
        'role' => 'Admin'
    ],
    [
        'avatar' => '4.jpg',
        'name' => 'Kristin Watson',
        'position' => 'Investor Data Orchestrator',
        'role' => 'Admin'
    ],
    [
        'avatar' => '5.jpg',
        'name' => 'Cameron Williamson',
        'position' => 'Product Infrastructure Executive',
        'role' => 'Admin'
    ],
    [
        'avatar' => '6.jpg',
        'name' => 'Courtney Henry',
        'position' => 'Invester Factors Associate',
        'role' => 'Admin'
    ],
];
    $staffsFile = 'staffs.json';
    $staffs = json_decode(file_get_contents($staffsFile), true);
    if(isset($_SESSION['new_staff'])) {
        array_push($staffs , $_SESSION['new_staff']);
        unset($_SESSION['new_staff']);
        file_put_contents($staffsFile, json_encode($staffs, JSON_PRETTY_PRINT));
    }
?>
</head>
<style>
</style>

<body>
<div class="container-fluid bg-light">
        <div class="container p-5 d-flex justify-content-between">
                <a href="./exercise2.php" class="btn btn-outline-secondary">Back</a>
                <a href="./exercise4.php" class="btn btn-primary">Next</a>
        </div>
    </div>
    <div class="container bg-secondary mt-2 rounded">
        <div class="row">
            <div class="col-xl-6">
                <h1 class="text-white text-uppercase">
                    <i class="fa-regular fa-circle-user"></i>
                    Staffs
                </h1>
            </div>
            <div class="col-xl-6">
                <a href="./Staff_add.php" class="btn btn-success mt-2 float-right">Add Staffs</a>
            </div>
        </div>
    </div>
    <div class="container mx-auto mt-3">
        <?php
            if (isset($_SESSION['msg-save'])) {
                ?>
                    <div class="alert alert-success" id="alert">
                        <?php
                            echo $_SESSION['msg-save'];
                            session_destroy();
                        ?>
                        <i class="fa-solid fa-check"></i>
                        <i class="fa-regular fa-circle-xmark float-right p-1" id="exit" style="cursor: pointer;"></i>
                    </div>
                <?php
            }
        ?>
    </div>
    <div class="container bg-light">
        <div class="row p-1">
            <?php
            foreach($staffs as $res) {
                ?>
                <div class="col-xl-3 mt-3 bg-white rounded text-center shadow-sm" style="cursor: pointer;">
                    <img src="./img/<?php echo $res['avatar']; ?>" alt="" class="rounded-circle mt-3" width="120" , height="120">
                    <p class="h6 mt-3">
                        <?php echo $res['name']; ?>
                    </p>
                    <span style="opacity: .7;">
                        <?php echo $res['position']; ?>
                    </span>
                    <p class="border border-success mx-auto mt-3 text-success" style="width: 4.5rem; border-radius: 20px;">
                        <?php echo $res['role']; ?>
                    </p>
                    <br>
                    <div class="row shadow-sm mt-3">
                        <div class="col-xl-6 shadow-sm p-2 border border-light">
                            <h6 class="text-center mt-1">
                                <i class="fa-solid fa-envelope p-1" style="opacity: .5;"></i> Email
                            </h6>
                        </div>
                        <div class="col-xl-6 shadow-sm p-2 border border-light">
                            <h6 class="text-center mt-1">
                                <i class="fa-solid fa-phone p-1" style="opacity: .5;"></i> Call
                            </h6>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    </div>
</body>
<script>
    $("#exit").click(function(){
        $("#alert").fadeOut(500);
    })
</script>
</html>