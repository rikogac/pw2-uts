<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Learning Tools</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <?php include_once "database.php"; ?>
</head>

<body>
    <?php
    $product = $pdo->query("SELECT * FROM product")->fetchAll(PDO::FETCH_ASSOC);
    $customer = $pdo->query("SELECT * FROM customer")->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_POST["checkout"])) {
        $order_number = "PO0" . rand(11, 99);
        $qty = $_POST["qty"];
        $customer_id = $_POST["customer_id"];
        $product_id = $_POST["product_id"];

        $product_price = $pdo->query("SELECT sell_price FROM product WHERE id = $product_id")->fetch(PDO::FETCH_ASSOC);

        print_r($product_price);

        $total_price = $qty * $product_price["sell_price"];

        $insert = $pdo->prepare("INSERT INTO `order` (order_number, date, qty, total_price, customer_id, product_id) VALUES (:order_number, NOW(), :qty, :total_price, :customer_id, :product_id)");
        $insert->bindParam(":order_number", $order_number);
        $insert->bindParam(":qty", $qty);
        $insert->bindParam(":total_price", $total_price);
        $insert->bindParam(":customer_id", $customer_id);
        $insert->bindParam(":product_id", $product_id);

        $insert->execute();

        header("location:index.php");
    }

    ?>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container position-relative py-lg-4">

            <a editable="inline" class="navbar-brand d-lg-none" href="index.php">
                <img src="logo.jpg" width="48" height="48" class="align-middle me-1" alt="My Website">
                Learning Tools</a>

            <div class="lc-block position-absolute start-50 translate-middle top-50 d-none d-lg-block">
                <a editable="inline" class="navbar-brand mx-auto" href="index.php">
                    <img src="logo.jpg" width="48" height="48" class="d-block mx-auto" alt="My Website">
                    Learning Tools</a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar5" aria-controls="myNavbar5" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="lc-block collapse navbar-collapse" id="myNavbar5">
                <div lc-helper="shortcode" class="live-shortcode me-auto">
                    <ul id="menu-menu-1" class="navbar-nav me-auto mb-2 mb-md-0 navbar-nav">
                        <li class="menu-item menu-item-type-custom menu-item-object-custom nav-item nav-item-32739 me-md-2">
                            <a href="#hero" class="nav-link ">Home</a>
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-32738 me-md-2">
                            <a class="nav-link" href="#product">View Products</a>
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home nav-item nav-item-32738">
                            <a class="nav-link" href="#contact">Social Media</a>
                        </li>
                    </ul>
                </div>

                <div lc-helper="shortcode" class="live-shortcode ms-auto">
                    <ul id="menu-secondary" class="navbar-nav me-auto mb-2 mb-md-0 navbar-nav">
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-post_tag nav-item nav-item-33142">
                            <a href="dashboard/page/product/list.php" class="nav-link ">Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">

        <header class="section-header text-center my-3">
            <h2 class="fw-bold">Checkout</h2>
        </header>

        <div class="row gy-4">

            <div class="col-lg-6 mx-auto">
                <form method="post" class="checkout-form">
                    <div class="row gy-4">

                        <div class="col-md-12">
                            <label for="customer" class="form-label">Customer</label>
                            <select class="form-select" name="customer_id" id="customer" required>
                                <option value="">Select Customer</option>
                                <?php foreach ($customer as $c) : ?>
                                    <option value="<?= $c['id']; ?>"><?= $c['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="product" class="form-label">Product</label>
                            <select class="form-select" name="product_id" id="product" required>
                                <option value="">Select Product</option>
                                <?php foreach ($product as $p) : ?>
                                    <option value="<?= $p['id']; ?>"><?= $p['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-12 ">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="qty" id="quantity" placeholder="Quantity" min="0" required>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" name="checkout" class="btn btn-primary btn-md">Checkout</button>
                        </div>

                    </div>
                </form>

            </div>

        </div>

    </div>

    <section class="">
        <div class="container" id="contact">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
                <div class="col mb-3">
                    <div class="lc-block mb-3"><a class="navbar-brand" href="index.php">
                            <img class="img-fluid me-1" src="logo.jpg" alt="my brand" width="48px" height="48px" lc-helper="image">
                        </a></div>
                    <div class="lc-block">
                        <div editable="rich">
                            <p class="text-muted">© 2023 Learning Tools, Inc</p>
                        </div>
                    </div>

                </div>
                <div class="col offset-md-2 mb-3">
                    <div class="lc-block small">
                        <style>
                            .footer-links-list ul {
                                padding-left: 0
                            }

                            .footer-links-list ul li {
                                margin-bottom: 15px;
                                list-style-type: none;
                                padding-left: 0
                            }

                            .footer-links-list a {
                                text-decoration: none;
                                color: var(--bs-body-color);
                            }
                        </style>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="lc-block mb-4">
                        <div editable="rich">
                            <h4>Social Media</h4>
                        </div>
                    </div>
                    <div class="lc-block small">
                        <div editable="rich" class="footer-links-list">
                            <ul>
                                <li><a href="#">Instagram</a> </li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">Youtube</a> </li>
                                <li><a href="#">Snapchat</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="lc-block mb-4">
                        <div editable="rich">
                            <h4>Contact</h4>
                        </div>
                    </div>
                    <div class="lc-block small">
                        <div editable="rich" class="footer-links-list">
                            <ul>
                                <li><a href="#">0855-900-800</a> </li>
                                <li><a href="#">Depok, Jawa Barat</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>