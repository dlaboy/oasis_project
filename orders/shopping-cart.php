<?php
$conn = mysqli_connect('localhost', 'dlaboy', 'Diego', 'oasis', 3307);


if (!$conn) {
    echo 'Connection Error:';
}

$sql = "SELECT idname, ingredients, toppings, qty, price FROM currentorder";
$sql1 = "SELECT nom FROM names";

$result = mysqli_query($conn, $sql);
$resultn = mysqli_query($conn, $sql1);



$itemsincart =  mysqli_fetch_all($result, MYSQLI_ASSOC);
$nam =  mysqli_fetch_all($resultn, MYSQLI_ASSOC);


mysqli_free_result($result);
mysqli_free_result($resultn);

// $sqld = "DELETE FROM currentorder";

// if (mysqli_query($conn, $sqld)) {
//     echo "Items deleted";
// } else {
//     echo "Query Error";
// }

// $delete = "True";

// if ($delete == "True") {
//     $sqld = "DELETE FROM currentorder";

//     if (mysqli_query($conn, $sqld)) {
//         echo "Items deleted";
//     } else {
//         echo "Query Error";
//     }
// }







// if (isset($_POST['sub_or'])) {
//     $name_p = mysqli_real_escape_string($conn, $_POST['name_p']);

//     $sql = "INSERT INTO orders_pending() VALUES('$name_p')";



//     if (mysqli_query($conn, $sql)) {
//         // success
//         header('Location: http://localhost/orders/');
//         echo "Item Added Succesfully";
//     } else {
//         // error
//         echo "Query Error: " . mysqli_error($conn);
//     }
// }






// $sqlp = "INSERT INTO currentorder (price) SELECT price FROM availprods";

// $result = mysqli_query($conn, $sqlp);


// $sqlp = "SELECT idname,price FROM availprods WHERE idname = idname";
// $resultp = mysqli_query($conn, $sqlp);
// $priceofitems = mysqli_fetch_all($resultp, MYSQLI_ASSOC);
// mysqli_free_result($resultp);








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
    <link rel="stylesheet" href="./shopping-cart.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Homemade+Apple&family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;1,700&family=Raleway:wght@300;400;500;700&display=swap"
        rel="stylesheet">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>


    <nav class="nave navbar navbar-expand navbar-dark bg-black w-100 d-flex align-items-center justify-content-between">

        <a href="./new-order.php">
            <img class="ima m-3" src="./img/left-arrow.png" alt="">
        </a>
        <img class="logo" src="./img/logo1.png" alt="">
        <img class="ima m-4" src="" alt="">
    </nav>
    <div class="container d-flex justify-content-center">
        <div id="order-payed"
            class=" tab d-flex align-items-center justify-content-center d-none row rounded-4 p-3 text-center">
            <img class="payed" src="./img/check.png" alt="">
            <h2>Pago Completado</h2>
        </div>
        <div id="sc" class=" tab row d-flex flex-column rounded-4 p-3">

            <div class=" col d-flex justify-content-center gy-3">
                <table class="table table-hover w-100 text-center">
                    <thead>
                        <tr>
                            <th scope="col">
                                <h3>Item</h3>
                            </th>
                            <th scope="col">
                                <h3>Qty</h3>
                            </th>
                            <th scope="col">
                                <h3>Price</h3>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0.00; ?>
                        <?php foreach ($itemsincart as $item) { ?>

                        <tr>
                            <td><?php echo htmlspecialchars(($item['idname'])); ?></td>
                            <td><?php echo htmlspecialchars(($item['qty'])); ?></td>
                            <td><?php echo htmlspecialchars(($item['price'])); ?></td>

                            <?php $total +=  $item['price'] ?>

                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
            <div class="col d-flex justify-content-end gy-5">
                <h3>Total: $ <?php echo number_format($total, 2); ?></h3>
            </div>
            <!-- border-bottom border-3 -->
            <div class="col gy-5 p-3" id="proc">

                <?php foreach ($nam as $n) { ?>


                <input type="hidden" id="n" name="nombreoNo" value="<?php echo $n['nom'] ?>">

                <?php } ?>




                <?php foreach ($itemsincart as $i) { ?>

                <div>
                    <input type="hidden" name="is" value="<?php echo $i['ingredients'] ?>">

                    <input type="hidden" name="ts" value="<?php echo $i['toppings'] ?>">

                    <input type="hidden" name="q" value="<?php echo $i['qty'] ?>">
                </div>


                <?php } ?>

                <button class="btn btn-dark w-100 p-3" onclick="dis()">Proceed to
                    Checkout</button>

            </div>
            <div class=" d-none col gy-3" id="pay">
                <p>Choose payment method</p>


                <div id="ATHMovil_Checkout_Button" type=" submit" name="isName?"></div>



            </div>
            <!-- <div class="d-none col" id="completed">
                        <h2>Pago completado</h2>
                    </div> -->
        </div>

    </div>

    <script>
    function dis() {
        if (!document.getElementById("proc").classList.contains("border-bottom") && !document.getElementById("proc")
            .classList.contains("border-3")) {
            document.getElementById("proc").classList.add("border-bottom")
            document.getElementById("proc").classList.add("border-3")

        } else {
            document.getElementById("proc").classList.remove("border-bottom")
            document.getElementById("proc").classList.remove("border-3")

        }
        if (!document.getElementById("pay").classList.contains("d-none")) {
            document.getElementById("pay").classList.add("d-none")
        } else {
            document.getElementById("pay").classList.remove("d-none")

        }


    }
    </script>
    <script type="text/javascript">
    ATHM_Checkout = {

        env: 'sandbox',
        // publicToken: '95421b0db5e2477947795d59fd02b931353bca42',
        publicToken: 'sandboxtoken01875617264',



        timeout: 600,

        theme: 'btn',
        lang: 'es',




        // total: <?php echo $total ?>,
        total: 1,


        items: [<?php foreach ($itemsincart as $item) { ?> {
                "name": "<?php echo htmlspecialchars(($item['idname'])) ?>",
                "description": "This is a description.",
                "quantity": <?php echo htmlspecialchars(($item['qty'])) ?>,
                // "price": <?php echo htmlspecialchars(($item['price'])) ?>,
                "price": 1,


                "tax": "0.00",
                "metadata": "metadata test"

            },
            <?php } ?>
        ],






        metadata1: "metadata1 test",
        metadata2: "metadata2 test",







        onCompletedPayment: function(response) {
            //Handle response: for now, delete current order table

            document.getElementById("sc").classList.add("d-none");
            document.getElementById("order-payed").classList.remove("d-none");







        },

        onCancelledPayment: function(response) {
            //Handle response
            console.log("Pago cancelado");
        },

        onExpiredPayment: function(response) {
            //Handle response
            console.log("Pago expirado");


        },

    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>



</html>
<script src="https://www.athmovil.com/api/js/v3/athmovilV3.js"></script>