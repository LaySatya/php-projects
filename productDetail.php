<?php
    include"./header.php";
    include"./array.php";
    if(isset($_GET['code'])){
        $code = $_GET['code'];
    }
    
?>
<body>
    <?php
        include"./navbar.php";
    ?>
    <?php
        foreach($data as $key => $value){
            if($code == $value['id']){
                $pcID = $value['id'];
                $model = $value['model'];
                $name = $value['name'];
                $core = $value['core'];
                $ram = $value['RAM'];
                $ssd = $value['SSD'];
                $original = $value['original_price'];
                $discount = $value['discount_price'];
                $image = $value['image'];
                ?>
                    <div class="container-fluid mt-5">
                        <div class="row">
                            <div class="col-xl-6">
                                <img src="./img/<?php echo $image;?>" class="border img-fluid" alt="">
                            </div>
                            <div class="col-xl-6">
                                <h1 style="font-size: 60px; color: brown;"><?php echo $model . " " . $name;?></h1>
                                <hr>
                                <i class="fa-solid fa-star h5"></i>
                                <i class="fa-solid fa-star h5"></i>
                                <i class="fa-solid fa-star h5"></i>
                                <i class="fa-solid fa-star h5"></i>
                                <i class="fa-solid fa-star h5"></i>
                                <p class="h4">
                                    <?php
                                        echo $model . " ". $name . " (" . $core . " / " . $ram . "GB / " . $ssd . "...";
                                    ?>
                                </p>
                                <hr>
                                <h3>
                                <?php
                                    if($original != $discount){
                                        echo "$" . $discount . " <del>" . "$". $original . "</del>";
                                    }
                                    else{
                                        echo "$" . $original;
                                    }
                                ?>
                                </h3>
                                <button class="btn btn-outline-warning m-1" id="addCart" type="button">
                                    ADD TO CART<i class="fa-solid fa-cart-shopping p-1"></i>
                                </button>
                            </div>
                            <div class="col-xl-6">
                                <img src="" alt="">
                                <img src="" alt="">
                                <img src="" alt="">
                            </div>
                        </div>
                    </div>
                <?php
            }
        }
    ?>
    <br>
    <br>
    <?php
        include"./footer.php";
    ?>
</body>
</html>