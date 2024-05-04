<?php
include "./header.php";
session_start();

$products = [
    [
        'productID' => 'P01',
        'productName' => 'Shoes',
        'description' => 'Beautiful Shoes',
        'category' => 'Shoes',
        'image' => 'shoes.png'
    ],
    [
        'productID' => 'P02',
        'productName' => 'Shirt',
        'description' => 'Beautiful Shirt',
        'category' => 'Shirt',
        'image' => 'shirt.png'
    ],
    [
        'productID' => 'P03',
        'productName' => 'Jacket',
        'description' => 'Beautiful Jacket',
        'category' => 'Jacket',
        'image' => 'jacket.png'
    ],
];


if (isset($_POST['btnSave'])) {
    $productID = $_POST['productID'];
    $productName = $_POST['productName'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $img = $_FILES['images']['name'];
    $tmp = $_FILES['images']['tmp_name'];
    $path = '';
    move_uploaded_file($tmp, $path . $img);

    $newProduct = [
        'productID' => $productID,
        'productName' => $productName,
        'description' => $description,
        'category' => $category,
        'image' => $img
    ];
    $_SESSION['pro'] = $newProduct;
    $_SESSION['msg-add'] = "Product has been added successfully!";
    // header('location: Exercise5.php');
}
    $productsFile = 'products.json';
    $products = json_decode(file_get_contents($productsFile), true);
    if(isset($_SESSION['pro'])){
        array_push($products , $_SESSION['pro']);
        unset($_SESSION['pro']);
        file_put_contents($productsFile, json_encode($products, JSON_PRETTY_PRINT));
    }

?>
</head>

<body>
<div class="container-fluid bg-light">
        <div class="container p-5 d-flex justify-content-between">
                <a href="./exercise4.php" class="btn btn-outline-secondary">Back</a>
                <a href="./exercise6.php" class="btn btn-primary">Next</a>
        </div>
    </div>
    <div class="container mt-5 rounded border border">
        <div class="row p-2">
            <div class="col-xl-6">
                <img src="./nike.png" class="rounded-circle" alt="" width="70" height="60">
            </div>
            <div class="col-xl-6">
                <button type="submit" class="btn btn-success float-right mt-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Add Product
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel"><img src="./img/nike.png" class="rounded-circle" alt="" width="70" height="60"> Add Products</h1>
                                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="Exercise5.php" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <label for="">ProductID</label>
                                                <input type="text" name="productID" class="form-control" required>
                                                <label for="">ProductName</label>
                                                <input type="text" name="productName" class="form-control" required>
                                                <label for="">Description</label>
                                                <textarea name="description" class="form-control" id="" cols="40" rows="5"></textarea>
                                                <label for="">Category</label>
                                                <select name="category" id="" class="form-control" required>
                                                    <?php
                                                    foreach ($products as $value) {
                                                    ?>
                                                        <option value="<?php echo $value['category']; ?>">
                                                            <?php
                                                            echo $value['category'];
                                                            ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <label for="">Upload Images</label>
                                                <input type="file" class="form-control" name="images" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="btnSave" class="btn btn-primary">Add <i class="fa-solid fa-plus"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-2">
            <div class="col-xl-12 mt-2">
                <?php
                if (isset($_SESSION['msg-add'])) {
                ?>
                    <div class="alert alert-success" id="alert">
                        <?php
                        echo $_SESSION['msg-add'];
                        session_destroy();
                        ?>
                        <i class="fa-solid fa-xmark float-right p-1" id="exit" style="cursor: pointer;"></i>
                    </div>
                <?php
                }
                ?>
            </div>
            <table id="example" class="table table-striped shadow-sm table-responsive-sm" style="width:100%">
                <thead style="background-color: #212121;">
                    <tr class="text-white">
                        <th>ProductID</th>
                        <th>ProductName</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($products as $value) {
                    ?>
                        <tr>
                            <td>
                                <?php echo $value['productID']; ?>
                            </td>
                            <td>
                                <?php echo $value['productName']; ?>
                            </td>
                            <td>
                                <?php echo $value['description']; ?>
                            </td>
                            <td>
                                <?php echo $value['category']; ?>
                            </td>
                            <td>
                                <img src="./<?php echo $value['image']; ?>" alt="" height="40">
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script>
    $("#exit").click(()=>{
        $("#alert").fadeOut(400);
    })
</script>

</html>