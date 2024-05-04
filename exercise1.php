<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Exercise 5</title>
</head>
<style>
    i{
        opacity: .6;
    }
    p{
        opacity: .8;
    }
    h5{
        font-weight: bold;
    }
    p{
        transition: .5s;
        cursor: pointer;
    }
    .row{
        cursor: pointer;
    }
    /* .col-xl-3{
        border: .1px grey solid;
    } */
    .col-xl-3:hover p{
        color: gold;
        opacity: 1;
        transform: scale(1.01);
    }
    del{
        opacity: .6;
        padding: 15px;
    }
</style>
<body>
    <?php
        $data = [
            [
                'model' => 'Acer',
                'name' => ' Aspire 5 A515-58GM',
                'core' => 'i7 1355U',
                'RAM' => 8,
                'SSD' => 512,
                'original_price' => 699.00,
                'discount_price' => 649.00,
                'image' => 'acer.png'
            ],
            [
                'model' => 'MSI',
                'name' => ' Titan 18 HX A14VI',
                'core' => 'i9 14900HX',
                'RAM' => 128,
                'SSD' => 2024,
                'original_price' => 5699.00,
                'discount_price' => 5699.00,
                'image' => 'msi.png'
            ],
            [
                'model' => 'Asus Vivobook',
                'name' => 'X415MA-EK769W',
                'core' => 'Celeron N4020',
                'RAM' => 4,
                'SSD' => '',
                'original_price' => 289.00,
                'discount_price' => 289.00,
                'image' => 'asusvivobook.png'
            ],
            [
                'model' => 'MaxBook',
                'name' => 'Pro 16',
                'core' => 'M3 Max',
                'RAM' => 36,
                'SSD' => '1TB / 16.2"',
                'original_price' => 3699.00,
                'discount_price' => 3699.00,
                'image' => 'mac.png'
            ],
            [
                'model' => 'MaxBook',
                'name' => 'Pro 16',
                'core' => 'M3 Pro',
                'RAM' => 36,
                'SSD' => '512GB / 16.2"',
                'original_price' => 3099.00,
                'discount_price' => 3029.00,
                'image' => 'mac.png'
            ],
            [
                'model' => 'Lenovo',
                'name' => 'THinkPad E16 G1',
                'core' => 'i5 1335U',
                'RAM' => 16,
                'SSD' => '51',
                'original_price' => 799.00,
                'discount_price' => 799.00,
                'image' => 'lenovo.png'
            ],
            [
                'model' => 'Acer',
                'name' => 'Aspire 5 A515-58GM',
                'core' => 'i5 1335U',
                'RAM' => 8,
                'SSD' => 512,
                'original_price' => 599.00,
                'discount_price' => 549.00,
                'image' => 'acer.png'
            ],
            [
                'model' => 'MaxBook',
                'name' => 'Pro 16',
                'core' => 'M3 Pro',
                'RAM' => 18,
                'SSD' => '512GB / 16.2"',
                'original_price' => 2699.00,
                'discount_price' => 2669.00,
                'image' => 'mac.png'
            ],
            [
                'model' => 'MaxBook',
                'name' => 'Pro 14',
                'core' => 'M3 Pro',
                'RAM' => 36,
                'SSD' => '1TB / 14.2"',
                'original_price' => 3399.00,
                'discount_price' => 3329.00,
                'image' => 'mac.png'
            ],
            [
                'model' => 'MaxBook',
                'name' => 'Pro 14',
                'core' => 'M3 Pro',
                'RAM' => 18,
                'SSD' => '1TB / 14.2"',
                'original_price' => 2599.00,
                'discount_price' => 2599.00,
                'image' => 'mac.png'
            ],
        ];
    ?>
    <div class="container-fluid bg-light">
        <div class="container p-5 d-flex justify-content-between">
                <a href="./index.php" class="btn btn-outline-secondary">Back</a>
                <a href="./exercise2.php" class="btn btn-primary">Next</a>
        </div>
    </div>
    <div class="container-fluid bg-light mt-5">
        <div class="row">
            <?php
                foreach($data as $value){
                    ?>
                        <div class="col-xl-3 mt-2">
                            <h3 style="color: brown; margin-left: 3rem;">
                                <?php echo $value['model'];?>
                            </h3>
                            <img src="<?php echo $value['image'];?>" width="250" height="150" alt=""> <br>
                            <i class="fa-solid fa-star ml-3"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <p class="ml-3">
                                <?php
                                    echo $value['model'] . " ". $value['name'] . " ( " . $value['core'] . " / " . $value['RAM'] . "GB / " . $value['SSD'] . "...";
                                ?>
                            </p>
                            <h5 class="ml-3">
                                <?php
                                    if($value['original_price'] != $value['discount_price']){
                                        echo "$" . $value['discount_price'] . "<del>" . "$". $value['original_price'] . "</del>";
                                    }
                                    else{
                                        echo "$" . $value['original_price'];
                                    }
                                ?>
                            </h5>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</body>
</html>