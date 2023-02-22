<?php

$conn = mysqli_connect('localhost', 'dlaboy', 'Diego', 'oasis', 3307);


if (!$conn) {
    echo 'Connection Error:';
}

$total = 0;



if (isset($_POST['su'])) {
    // if (!empty($_POST['primerI']) && !empty($_POST['segundoI']) && !empty($_POST['tercerI']) && !empty($_POST['prodname'])) {
    $prod = mysqli_real_escape_string($conn, $_POST['prodname']);

    $firstI = mysqli_real_escape_string($conn, $_POST['primerI']);
    $secondI = mysqli_real_escape_string($conn, $_POST['segundoI']);
    $thirdI = mysqli_real_escape_string($conn, $_POST['tercerI']);

    $ingredients = $firstI . "," . $secondI . "," . $thirdI;

    $firstT = mysqli_real_escape_string($conn, $_POST['primerT']);
    $secondT = mysqli_real_escape_string($conn, $_POST['segundoT']);
    $thirdT = mysqli_real_escape_string($conn, $_POST['tercerT']);

    $toppings = $firstT . "," . $secondT . "," . $thirdT;

    $quan = mysqli_real_escape_string($conn, $_POST['quan']);


    $n = "SELECT * FROM names";

    $results = mysqli_query($conn, $n);

    $nombres = mysqli_fetch_all($results, MYSQLI_ASSOC);

    mysqli_free_result($results);

    $name = "";

    foreach ($nombres as $nam) {
        $name = $nam['nom'];
    }

    // $sqls = "INSERT INTO comestibles(item, quantity) VALUES('$name', '$quantity')";
    $sql = "INSERT INTO currentorder(clients,idname,ingredients,toppings,qty,price) VALUES('$name','$prod','$ingredients','$toppings','$quan', '5.00' * '$quan')";


    if (mysqli_query($conn, $sql)) {
        // success
        header('Location: new-order.php');

        echo "Product Added Succesfully";
    } else {
        // error
        echo "Query Error: " . mysqli_error($conn);
    }
    // }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="./ice-cream-rolls.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;1,700&family=Raleway:wght@300;400;500;700&display=swap" rel="stylesheet" />

    <title>Document</title>
</head>

<body>
    <nav class="nave navbar navbar-expand navbar-dark bg-black w-100 d-flex align-items-center justify-content-between flex-column">
        <div class="col d-flex align-items-center justify-content-between w-100">
            <a href="./new-order.php">
                <img class="ima m-4" src="./img/left-arrow.png" alt="" />
            </a>
            <img class="logo" src="./img/logo1.png" alt="" />
            <a href="./shopping-cart.php">
                <img class="ima m-4" src="./img/shopping-cart(1).png" alt="" />

            </a>

        </div>
        <div class="col col-12 d-flex align-items-center justify-content-center gy-3 m-2">
            <h4 class="text-light">Product: Ice Cream Rolls</h4>
        </div>
    </nav>
    <div class="container d-flex justify-content-center">
        <div class="tab row d-flex flex-column rounded-4 p-3">
            <div class="col form-group">
                <div class="col gy-4 d-flex flex-row justify-content-between">
                    <div class="col">
                        <h5>Ingredients</h5>
                    </div>
                    <!-- <div class="col">
                        <button class="btn">
                            <h5>+</h5>
                        </button>
                        <button class="btn">
                            <h5>-</h5>
                        </button>
                    </div> -->
                </div>
                <div class="col d-flex align-items-center justify-content-center gy-4">
                    <div class="col col-8 ingre">
                        <div class="first d-flex flex-row">
                            <h5 class="w-25">1</h5>

                            <select class="form-select p-3" aria-label="Default select example" id="primeriso" onchange="ing('primeriso','primerI')">
                                <option>Select Ingredient</option>
                                <option>Nutella</option>
                                <option>Fresa</option>
                                <option>Oreo</option>
                            </select>
                        </div>
                        <div class="second mt-3 d-flex flex-row">
                            <h5 class="w-25">2</h5>

                            <select class="form-select p-3" aria-label="Default select example" id="segundiso" onchange="ing('segundiso','segundoI')">
                                <option>Select Ingredient</option>
                                <option>Nutella</option>
                                <option>Fresa</option>
                                <option>Oreo</option>
                            </select>
                        </div>
                        <div class="third mt-3 d-flex flex-row">
                            <h5 class="w-25">3</h5>

                            <select class="form-select p-3" aria-label="Default select example" id="terceriso" onchange="ing('terceriso','tercerI')">
                                <option>Select Ingredient</option>
                                <option>Nutella</option>
                                <option>Fresa</option>
                                <option>Oreo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col gy-4">
                    <h5>Toppings</h5>
                </div>
                <div class="col d-flex align-items-center justify-content-center gy-4">
                    <div class="col col-8 top">
                        <div class="first d-flex flex-row">
                            <h5 class="w-25 ">1</h5>
                            <select class="form-select p-3" aria-label="Default select example" id="firstT" onchange="ing('firstT','primerT')">
                                <option>Select Topping</option>
                                <option>Nutella</option>
                                <option>Fresa</option>
                                <option>Oreo</option>
                            </select>
                        </div>
                        <div class="second mt-3 d-flex flex-row">
                            <h5 class="w-25">2</h5>

                            <select class="form-select p-3" aria-label="Default select example" id="seconT" onchange="ing('seconT','segundoT')">
                                <option>Select Topping</option>
                                <option>Nutella</option>
                                <option>Fresa</option>
                                <option>Oreo</option>
                            </select>
                        </div>
                        <div class="third mt-3 d-flex flex-row">
                            <h5 class="w-25">3</h5>

                            <select class="form-select p-3" aria-label="Default select example" id="thirdT" onchange="ing('thirdT','tercerT')">
                                <option>Select Topping</option>
                                <option>Nutella</option>
                                <option>Fresa</option>
                                <option>Oreo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col gy-4">
                    <h5>Quantity</h5>
                </div>
                <div class="col d-flex align-items-center justify-content-center gy-4">
                    <div class="col col-7 quan">
                        <div class="d-flex flex-row justify-content-center">
                            <select class="form-select w-50" aria-label="Default select example" id="q" onchange="ing('q','quan')">
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col d-flex justify-content-center align-items-center gy-5">
                <form action="" method="POST">
                    <div class="form-group ">
                        <input type="hidden" id="prodname" name="prodname" value="Ice Cream Rolls" class="form-control">

                        <input type="hidden" id="primerI" name="primerI" class="form-control" />
                        <input type="hidden" id="segundoI" name="segundoI" class=" form-control" />
                        <input type="hidden" id="tercerI" name="tercerI" class="form-control" />

                        <input type="hidden" id="primerT" name="primerT" class="form-control" />
                        <input type="hidden" id="segundoT" name="segundoT" class=" form-control" />
                        <input type="hidden" id="tercerT" name="tercerT" class="form-control" />

                        <input type="hidden" id="quan" name="quan" class="form-control" />

                    </div>

                    <button type="submit" name="su" class="rosa p-3 btn btn-primary border-top-0 border-primary rounded-4 m-3">
                        Add to cart
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script>
        function ing(id, hiddenid) {
            // selectedIng = document.querySelector(id);
            // output = selectedIng.value;
            var ing = document.getElementById(id);

            if (ing.selectedIndex !== 0) {
                var text = ing.options[ing.selectedIndex].text;

                document.getElementById(hiddenid).value = text;

            } else {
                // var text = ing.options[ing.selectedIndex].text;

                document.getElementById(hiddenid).value = "";

            }
        }
    </script>
</body>

</html>