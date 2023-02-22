<?php

$error = array('option' => '');
$option = "";


if (isset($_POST['option'])) {
    if (empty($_POST['op'])) {
        $error['option'] = 'A product has to be selected <br />';
    } else {
        $option = $_POST['op'];

        if ($option != "Ice Cream Rolls") {
            $error['option'] = 'Product Unavailable';
        } // echo

        htmlspecialchars($_POST['op']);
    }
    if (!array_filter($error)) {
        header('Location: http://localhost/orders/ice-cream-rolls.php');
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="./new-order.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Homemade+Apple&family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;1,700&family=Raleway:wght@300;400;500;700&display=swap"
        rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <nav class="nave navbar navbar-expand navbar-dark bg-black w-100 d-flex align-items-center justify-content-between">
        <a href="./index.php">
            <img class="ima m-4" src="./img/left-arrow.png" alt="">
        </a>
        <img class="logo" src="./img/logo1.png" alt="">
        <a href="./shopping-cart.php">
            <img class="ima m-4" src="./img/shopping-cart(1).png" alt="">
        </a>
    </nav>
    <div class="conta container mt-3 rounded-3">
        <div class="row d-flex flex-column justify-content-center align-items-center">
            <div class="col d-flex justify-content-center align-item-center gy-3"><button type="button"
                    class="rosa  btn  rounded-3 btn-lg" onclick="productType()">
                    New +
                </button>
            </div>

            <div id="produ"
                class="d-none col bg-white contenido rounded-3 p-3 d-flex align-items-center flex-column text-secondary gy-4">

                <div class="col col-12 p-4 d-flex flex-column justify-content-center align-items-center gy-5">
                    <h4 class=" w-100">Product Type</h4>
                    <select id="prods" class=" form-select w-100 m-3" aria-label="Default select example"
                        onchange="des()">
                        <option value="0" selected>Select Product</option>
                        <option value="1">Ice Cream Rolls</option>
                        <option value="2">Waffle Bowls</option>
                        <option value="3">Cone Rolls</option>
                        <option value="4">Banana Split</option>
                        <option value="5">To-Go Bowls</option>
                        <option value="6">Puppy Rolls</option>
                    </select>



                </div>
                <div class="col more-info p-4 w-100">
                    <div id="prohe" class="col d-flex flex-row justify-content-between ">
                        <h4>Product Information</h4>
                        <div class="flechas">
                            <button class="btn" onclick="showLess()">
                                <img class="up" src="./img/upload.png" alt="">
                            </button>
                            <button class="btn" onclick="showMore()">
                                <img class="ima" src="./img/down-arrow (2).png" alt="">
                            </button>
                        </div>

                    </div>
                    <div id="pi" class="d-none col">

                        <div id="icr" class="d-none icr">
                            <h5 class="text-start mt-4">Ice Cream Rolls</h5>
                            <p class="text-start ms-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Temporibus
                                quidem perspiciatis illo doloremque error, voluptas placeat animi nesciunt maxime sequi
                                optio alias a officia tenetur illum dolorum totam assumenda cumque?</p>
                        </div>
                        <div id="wb" class="d-none icr">
                            <h5 class="text-start mt-4">Waffle Bowls</h5>
                            <p class="text-start ms-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Temporibus
                                quidem perspiciatis illo doloremque error, voluptas placeat animi nesciunt maxime sequi
                                optio alias a officia tenetur illum dolorum totam assumenda cumque?</p>
                        </div>
                        <div id="cr" class="d-none icr">
                            <h5 class="text-start mt-4">Cone Rolls</h5>
                            <p class="text-start ms-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Temporibus
                                quidem perspiciatis illo doloremque error, voluptas placeat animi nesciunt maxime sequi
                                optio alias a officia tenetur illum dolorum totam assumenda cumque?</p>
                        </div>
                        <div id="bs" class="d-none icr">
                            <h5 class="text-start mt-4">Banana Split</h5>
                            <p class="text-start ms-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Temporibus
                                quidem perspiciatis illo doloremque error, voluptas placeat animi nesciunt maxime sequi
                                optio alias a officia tenetur illum dolorum totam assumenda cumque?</p>
                        </div>
                        <div id="tgb" class="d-none icr">
                            <h5 class="text-start mt-4">To-Go Bowls</h5>
                            <p class="text-start ms-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Temporibus
                                quidem perspiciatis illo doloremque error, voluptas placeat animi nesciunt maxime
                                sequi
                                optio alias a officia tenetur illum dolorum totam assumenda cumque?</p>
                        </div>
                        <div id="pr" class="d-none icr">
                            <h5 class="text-start mt-4">Puppy Rolls</h5>
                            <p class="text-start ms-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Temporibus
                                quidem perspiciatis illo doloremque error, voluptas placeat animi nesciunt maxime sequi
                                optio alias a officia tenetur illum dolorum totam assumenda cumque?</p>
                        </div>

                    </div>
                </div>
                <div class="col d-flex align-items-center justify-content-center">
                    <form class="d-flex flex-column justify-content-center" action="" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="op" id="op">
                            <div class="text-center error text-danger"><?php echo $error['option']; ?></div>
                        </div>
                        <button class="btn btn-dark rounded-3 btn-lg" type="submit" name="option">

                            Continue

                        </button>
                    </form>
                </div>
            </div>
            <div id="d" class="nuevo col d-flex justify-content-center gy-5">
                <p>Press button to add product to order</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script>
    function productType() {
        if (document.getElementById("produ").classList.contains("d-none")) {
            document.getElementById("produ").classList.remove("d-none");
            document.getElementById("d").classList.add("d-none");


        } else {
            document.getElementById("produ").classList.add("d-none");
            document.getElementById("d").classList.remove("d-none");


        }
    }

    function showMore() {
        document.getElementById("pi").classList.remove("d-none");
        document.getElementById("prohe").classList.add("border-bottom");
        document.getElementById("prohe").classList.add("border-2");

        // selected product
        selectedElement = document.querySelector('#prods');
        output = selectedElement.value;

        if (output === "1") {
            document.getElementById("icr").classList.remove("d-none");
            document.getElementById("wb").classList.add("d-none");
            document.getElementById("cr").classList.add("d-none");
            document.getElementById("bs").classList.add("d-none");
            document.getElementById("tgb").classList.add("d-none");
            document.getElementById("pr").classList.add("d-none");



        } else if (output === "2") {
            document.getElementById("icr").classList.add("d-none");
            document.getElementById("wb").classList.remove("d-none");
            document.getElementById("cr").classList.add("d-none");
            document.getElementById("bs").classList.add("d-none");
            document.getElementById("tgb").classList.add("d-none");
            document.getElementById("pr").classList.add("d-none");


        } else if (output === "3") {
            document.getElementById("icr").classList.add("d-none");
            document.getElementById("wb").classList.add("d-none");
            document.getElementById("cr").classList.remove("d-none");
            document.getElementById("bs").classList.add("d-none");
            document.getElementById("tgb").classList.add("d-none");
            document.getElementById("pr").classList.add("d-none");

        } else if (output === "4") {
            document.getElementById("icr").classList.add("d-none");
            document.getElementById("wb").classList.add("d-none");
            document.getElementById("cr").classList.add("d-none");
            document.getElementById("bs").classList.remove("d-none");
            document.getElementById("tgb").classList.add("d-none");
            document.getElementById("pr").classList.add("d-none");


        } else if (output === "5") {
            document.getElementById("icr").classList.add("d-none");
            document.getElementById("wb").classList.add("d-none");
            document.getElementById("cr").classList.add("d-none");
            document.getElementById("bs").classList.add("d-none");
            document.getElementById("tgb").classList.remove("d-none");
            document.getElementById("pr").classList.add("d-none");


        } else if (output === "6") {
            document.getElementById("icr").classList.add("d-none");
            document.getElementById("wb").classList.add("d-none");
            document.getElementById("cr").classList.add("d-none");
            document.getElementById("bs").classList.add("d-none");
            document.getElementById("tgb").classList.add("d-none");
            document.getElementById("pr").classList.remove("d-none");
        } else if (output === "0") {
            document.getElementById("icr").classList.add("d-none");
            document.getElementById("wb").classList.add("d-none");
            document.getElementById("cr").classList.add("d-none");
            document.getElementById("bs").classList.add("d-none");
            document.getElementById("tgb").classList.add("d-none");
            document.getElementById("pr").classList.add("d-none");
        }
        // document.querySelector('.output').textContent = output;
    }

    function showLess() {
        document.getElementById("pi").classList.add("d-none");
        document.getElementById("prohe").classList.remove("border-bottom");
        document.getElementById("prohe").classList.remove("border-2");

    }

    function des() {
        selectedElement = document.querySelector('#prods');
        output = selectedElement.value;

        if (output === "1") {
            document.getElementById("icr").classList.remove("d-none");
            document.getElementById("wb").classList.add("d-none");
            document.getElementById("cr").classList.add("d-none");
            document.getElementById("bs").classList.add("d-none");
            document.getElementById("tgb").classList.add("d-none");
            document.getElementById("pr").classList.add("d-none");

            document.getElementById("op").setAttribute("value", "Ice Cream Rolls");



        } else if (output === "2") {
            document.getElementById("icr").classList.add("d-none");
            document.getElementById("wb").classList.remove("d-none");
            document.getElementById("cr").classList.add("d-none");
            document.getElementById("bs").classList.add("d-none");
            document.getElementById("tgb").classList.add("d-none");
            document.getElementById("pr").classList.add("d-none");


            document.getElementById("op").setAttribute("value", "Waffle Rolls");


        } else if (output === "3") {
            document.getElementById("icr").classList.add("d-none");
            document.getElementById("wb").classList.add("d-none");
            document.getElementById("cr").classList.remove("d-none");
            document.getElementById("bs").classList.add("d-none");
            document.getElementById("tgb").classList.add("d-none");
            document.getElementById("pr").classList.add("d-none");

            document.getElementById("op").setAttribute("value", "Cone Rolls");


        } else if (output === "4") {
            document.getElementById("icr").classList.add("d-none");
            document.getElementById("wb").classList.add("d-none");
            document.getElementById("cr").classList.add("d-none");
            document.getElementById("bs").classList.remove("d-none");
            document.getElementById("tgb").classList.add("d-none");
            document.getElementById("pr").classList.add("d-none");

            document.getElementById("op").setAttribute("value", "Banana Split");



        } else if (output === "5") {
            document.getElementById("icr").classList.add("d-none");
            document.getElementById("wb").classList.add("d-none");
            document.getElementById("cr").classList.add("d-none");
            document.getElementById("bs").classList.add("d-none");
            document.getElementById("tgb").classList.remove("d-none");
            document.getElementById("pr").classList.add("d-none");

            document.getElementById("op").setAttribute("value", "To-Go Bowls");


        } else if (output === "6") {
            document.getElementById("icr").classList.add("d-none");
            document.getElementById("wb").classList.add("d-none");
            document.getElementById("cr").classList.add("d-none");
            document.getElementById("bs").classList.add("d-none");
            document.getElementById("tgb").classList.add("d-none");
            document.getElementById("pr").classList.remove("d-none");

            document.getElementById("op").setAttribute("value", "Puppy Rolls");

        } else if (output === "0") {
            document.getElementById("icr").classList.add("d-none");
            document.getElementById("wb").classList.add("d-none");
            document.getElementById("cr").classList.add("d-none");
            document.getElementById("bs").classList.add("d-none");
            document.getElementById("tgb").classList.add("d-none");
            document.getElementById("pr").classList.add("d-none");

            document.getElementById("op").setAttribute("value", "");

        }

    }
    </script>
</body>


</html>