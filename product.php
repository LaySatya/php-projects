<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<style>
    i{
        opacity: .6;
    }
    h5{
        font-weight: bold;
    }
    p{
        transition: .5s;
        cursor: pointer;
        opacity: .8; 
    }
    .row{
        cursor: pointer;
    }
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
        include"./array.php";
    ?>
    <div class="container-fluid bg-light">
        <div class="row m-5 p-3">
            <?php
                foreach($data as $value){
                    ?>
                        <div class="col-xl-3 mt-2 p-3">
                            <h3 style="color: brown; margin-left: 3rem;">
                                <?php echo $value['model'];?>
                            </h3>
                            <img src="./img/<?php echo $value['image'];?>" width="250" height="150" alt=""> <br>
                            <i class="fa-solid fa-star ml-3"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <p class="ml-3">
                                <?php
                                    echo $value['model'] . " ". $value['name'] . " (" . $value['core'] . " / " . $value['RAM'] . "GB / " . $value['SSD'] . "...";
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
                            <a href="./productDetail.php?code=<?php echo $value['id'];?>" class="btn btn-outline-primary float-right m-1" id="addCart" type="button">
                                Detail
                            </a>
                            <button class="btn btn-outline-primary float-right m-1" id="addCart" type="button">
                                <i class="fa-solid fa-cart-shopping p-1"></i>
                            </button>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</body>
<script>
    
</script>
</html>