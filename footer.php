<?php 
    include"./Header/Header.php";
    // array navbar
    $nav = array(
        array(
            'title' => 'Home',
            'titleLink' => './Exercise7.php',
            'liClass' => 'nav-item',
            'aClass' => 'nav-link h5 ml-5 mt-5',
            'iconClass' => 'fa-solid fa-house',
            'addressClass' => 'fa-solid fa-envelope',
            'address' => 'laysatya63@gmail.com',
        ),
        array(
            'title' => 'ContactUs',
            'titleLink' => './contactUs.php',
            'liClass' => 'nav-item',
            'aClass' => 'nav-link h5 ml-5',
            'iconClass' => 'fa-solid fa-address-card',
            'addressClass' => 'fa-solid fa-phone',
            'address' => '081480965',

        ),
        array(
            'title' => 'AboutUs',
            'titleLink' => './aboutUs.php',
            'liClass' => 'nav-item',
            'aClass' => 'nav-link h5 ml-5',
            'iconClass' => 'fa-solid fa-address-book',
            'addressClass' => 'fa-solid fa-location-dot',
            'address' => 'CADT, Preak Leap, Phonm Penh, Cambodia'
        ),
        array(
            'title' => 'ProductDetail',
            'titleLink' => './productDetail.php',
            'liClass' => 'nav-item ml-5',
            'aClass' => 'nav-link h5',
            'iconClass' => 'fa-solid fa-circle-info',
            'addressClass' => '',
            'address' => ''
        ),
    );
    $social = array(
        array(
            'liClass' => 'nav-item p-1',
            'socialClass' => 'fa-brands fa-facebook h3',
        ),
        array(
            'liClass' => 'nav-item p-1',
            'socialClass' => 'fa-brands fa-facebook-messenger h3',
        ),
        array(
            'liClass' => 'nav-item p-1',
            'socialClass' => 'fa-brands fa-telegram h3',
        ),
        array(
            'liClass' => 'nav-item p-1',
            'socialClass' => 'fa-brands fa-instagram h3',
        ),
        array(
            'liClass' => 'nav-item p-1',
            'socialClass' => 'fa-brands fa-linkedin h3',
        ),
        array(
            'liClass' => 'nav-item p-1',
            'socialClass' => 'fa-brands fa-twitter h3',
        ),
        array(
            'liClass' => 'nav-item p-1',
            'socialClass' => 'fa-brands fa-tiktok h3',
        ),
    );
?>
<style>
    .nav-link ,.fa-brands{
        transition: .4s;
        color: white;
        opacity: .8;
    }
    .nav-link:hover, .fa-brands:hover{
        color: deepskyblue;
        transform: scale(1.08);
        cursor: pointer;
        opacity: 1;
    } 
</style>
</head>
<body>
    <div class="container-fluid overflow-hidden" style="background-color: #212121;">
        <div class="row mb-5">
            <div class="col-xl-3">
                <img src="./img/pc.jpg" alt="" width ="200" height="200" class="rounded-circle m-5">
                <ul class="navbar-nav flex-row mb-4 ml-5">
                    <?php 
                        foreach($social as $res){
                            ?>
                                <li class="<?php echo $res['liClass'];?>">
                                    <i class="<?php echo $res['socialClass'];?>"></i>
                                </li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
            <div class="col-xl-3">
                <h1 class="ml-5 mt-5 text-white">Services</h1>
                <ul class="navbar-nav flex-column">
                    <?php
                        foreach($nav as $data){
                            ?>
                                <li class="<?php echo $data['liClass'];?>">
                                    <a href="<?php echo $data['titleLink'];?>" class="<?php echo $data['aClass'];?>">
                                        <i class="<?php echo $data['iconClass'];?>"></i> &nbsp; <?php echo $data['title'];?>
                                    </a>
                                </li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
            <div class="col-xl-3">
                <h1 class="ml-5 mt-5 text-white">Get In Touch</h1>
                    <ul class="navbar-nav flex-column">
                        <?php
                            foreach($nav as $data){
                                ?>
                                    <li class="<?php echo $data['liClass'];?>">
                                        <a href="#" class="<?php echo $data['aClass'];?>">
                                            <i class="<?php echo $data['addressClass'];?>"></i> &nbsp; <?php echo $data['address'];?>
                                        </a>
                                    </li>
                                <?php
                            }
                        ?>
                    </ul>
            </div>
            <div class="col-xl-3">
                <button type="submit" class="btn btn-info float-right mt-5 p-2 m-3" name="txtConnect"><span class="h5 p-2 m-2">Add To Cart <i class="fa-solid fa-handshake"></i></span></button>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 bg-secondary">
                <p class="text-center mt-2 p-1 text-white h6">
                    Copyright &copy; 2024 Tech Computer, All right reserved!
                </p>
            </div>
        </div>
    </div>
</body>
</html>