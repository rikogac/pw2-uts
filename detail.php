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
    $product = $pdo->query("SELECT * FROM product WHERE id = '$_GET[id]'");
    $p = $product->fetch(PDO::FETCH_ASSOC);
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

    <div class="container" id="product">
        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            <div class="col">
                <div class="lc-block card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" lc-helper="background" style="background-image: url('https://images.unsplash.com/photo-1507499739999-097706ad8914?crop=entropy&amp;cs=tinysrgb&amp;fit=crop&amp;fm=jpg&amp;ixid=MnwzNzg0fDB8MXxzZWFyY2h8MTB8fHNwYWNlfGVufDB8MXx8fDE2MjE4NDQ2MTY&amp;ixlib=rb-1.2.1&amp;q=80&amp;w=1080&amp;h=768'); background-size:cover">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <div class="lc-block pt-5 mt-5 mb-4">
                            <div editable="rich">
                                <h2 class="display-6 lh-1 fw-bold"><?= $p["name"]; ?></h2>
                                <p>Rp. <?= number_format($p["sell_price"]); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="lc-block mb-4">
                    <div editable="rich">
                        <h1 class="fw-bolder"><?= $p["name"]; ?></h1>
                        <p class="lead mb-0">Rp. <?= number_format($p["sell_price"]); ?></p>
                        <p class="lead">Stock : <?= $p["stock"]; ?></p>
                    </div>
                    <div class="">
                        <a class="text-secondary me-2" href="index.php" role="button">Back</a>
                        <a class="" href="buy.php" role="button">Buy Product</a>
                    </div>
                </div>
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