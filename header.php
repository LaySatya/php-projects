<?php
include "./Header/Header.php";

// menu
$menu = array(
    '<i class="fa-solid fa-house"></i>' => './Exercise7.php',
    'ContactUs' => '#',
    'AboutUs' => '#',
    'Detail' => '#'
);
?>
<style>
    *{
        font-family: 'koulen', system-ui;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    #link{
        transition: .5s;
    }
    #link:hover{
        transform: scale(1.1);
        color: white;
        box-shadow: 0px 1px 0px 0px white;
        color: red;
    }
    del{
        opacity: .6;
    }
</style>

<body>
    <div class="navbar navbar-expand-lg">
        <div class="container-fluid" style="background-color: #212121;">
            <img src="./img/pc.jpg" alt="" width="100" height="100" class="rounded-circle m-2">
            <a href="./Exercise7.php" class="h2 nav-link text-white text-uppercase mt-1">Tech Computer</a>
            <button class="navbar navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
                <span class="navbar navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-row justify-content-center" id="nav">
                <ul class="navbar-nav">
                    <?php
                    foreach ($menu as $nav => $link) {
                        ?>
                        <li class="nav-item">
                            <a href="<?php echo $link; ?>" class="nav-link m-2 mr-5 h5 text-uppercase text-white" id="link">
                                <?php
                                echo $nav;
                                ?>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="collapse navbar-collapse flex-row justify-content-center" id="nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" 
                            data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                            <i class="fa-solid fa-cart-shopping p-1"></i> Cart
                        </button>

                        <a href="./exercise6.php" class="btn btn-outline-primary">back</a>

                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasCartLabel">Tech Computer</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <p id="emptyCard">Your cart is currently empty.</p>
    </div>
</div>
</body>

</html>