<?php

$conn = mysqli_connect('localhost', 'dlaboy', 'Diego', 'oasis', 3307);


if (!$conn) {
    echo 'Connection Error:';
}

$sql = "SELECT * FROM currentorder";

$result = mysqli_query($conn, $sql);

$itemsincart =  mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);


if (isset($_POST['delete'])) {
    $id_to_delete  = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM currentorder WHERE id = $id_to_delete";

    if (mysqli_query($conn, $sql)) {
        // success
        header('Location: http://localhost/monitor_app/current.php');
    } else {
        // failure
        echo "Query Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['next_order'])) {
    // data for past_orders
    $id = mysqli_real_escape_string($conn, $_POST['i']);
    $client = mysqli_real_escape_string($conn, $_POST['client']);
    $q = mysqli_real_escape_string($conn, $_POST['t_qty']);
    $t = mysqli_real_escape_string($conn, $_POST['t']);

    // data for details
    $typ = mysqli_real_escape_string($conn, $_POST['type']);
    $ings = mysqli_real_escape_string($conn, $_POST['ings']);
    $tops = mysqli_real_escape_string($conn, $_POST['tops']);
    $qtyy = mysqli_real_escape_string($conn, $_POST['qty']);
    $p = mysqli_real_escape_string($conn, $_POST['price']);


    $past = "INSERT INTO past_orders(idp,client_name,qty,total_payout,payment_method,to_go) VALUES('$id','$client','$q','$t','ATH','No')";
    $details = "INSERT INTO details(clients, idname, ingredients, toppings, qty, price) VALUES('$client','$typ','$ings','$tops','$qtyy','$p')";
    $delete = "DELETE FROM currentorder";


    if (mysqli_query($conn, $past) && mysqli_query($conn, $details) && mysqli_query($conn, $delete)) {
        // success
        header('Location: http://localhost/monitor_app/past.php');
    } else {
        // error
        echo "Query Error: " . mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/monitor_app/current.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;1,700&family=Raleway:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <title>Document</title>
</head>

<body class="bo">
    <nav class="nav-bar nav-section">
        <div class="row bg-dark">
            <div class="col d-flex justify-content-center align-items-center">
                <img class="logo" src="./img/logo2.png" alt="" />
            </div>
            <div class="col d-flex flex-row justify-content-evenly align-items-center">
                <a href="/monitor_app/current.php" class="nav-link text-decoration-none text-light"> Current Orders</a>
                <a href="/monitor_app/past.php" class="nav-link text-decoration-none text-light">Past Orders</a>
                <a href="/monitor_app/sales.php" class="nav-link text-decoration-none text-light">Sales</a>
                <a href="/inventory2/" class="nav-link text-decoration-none text-light">Inventory</a>
            </div>
        </div>
    </nav>
    <div class="container conta mt-5">
        <div class="row bg-white rounded-3 d-flex flex-column shadow p-3">
            <div class="col  text-center">
                <h2 class="text-secondary-emphasis">Current Order</h2>
            </div>
            <div class="col w-100 ">
                <?php $counter = 0 ?>
                <?php $client_name = "" ?>
                <?php foreach ($itemsincart as $item) { ?>
                    <h4 class="ms-4 text-secondary-emphasis">Name: <?php echo $item['clients'] ?></h4>
                    <?php $client_name = $item['clients'] ?>

                    <?php $counter += 1 ?>
                    <?php if ($counter == 1) { ?>
                        <?php break ?>
                    <?php } ?>

                <?php } ?>
                <table class="table table-hover text-secondary-emphasis m-2 ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Type</th>
                            <th scope="col">Ingredients</th>
                            <th scope="col">Toppings</th>

                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0 ?>
                        <?php $total_quantity = 0 ?>
                        <?php $id = 0 ?>
                        <?php foreach ($itemsincart as $item) { ?>
                            <tr>
                                <td class="p-4"><?php echo htmlspecialchars(($item['id'])); ?></td>
                                <td class="p-4"><?php echo htmlspecialchars(($item['idname'])); ?></td>
                                <td class="p-4"><?php echo htmlspecialchars(($item['ingredients'])); ?></td>
                                <td class="p-4"><?php echo htmlspecialchars(($item['toppings'])); ?></td>
                                <td class="p-4"><?php echo htmlspecialchars(($item['qty'])); ?></td>
                                <td class="p-4">$<?php echo htmlspecialchars(($item['price'])); ?></td>
                                <td>
                                    <form action="current.php" method="POST">
                                        <input type="hidden" name="id_to_delete" value="<?php echo $item['id'] ?>">
                                        <button class="btn" type="submit" name="delete" value="delete">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                                <!-- Data for details table -->
                                <?php $type = $item['idname'] ?>
                                <?php $ingredients = $item['ingredients'] ?>
                                <?php $toppings = $item['toppings'] ?>
                                <?php $qty = $item['qty'] ?>
                                <?php $price  = $item['price'] ?>

                                <!-- Data for past_orders table -->
                                <?php $total += $item['price'] ?>
                                <?php $total_quantity += $item['qty'] ?>
                                <?php $id = $item['id'] ?>
                            </tr>
                        <?php } ?>



                    </tbody>
                </table>
            </div>
            <div class="col ms-5 m-2">
                <p class="text-secondary-emphasis m-3">To Go: No</p>
                <p class="text-secondary-emphasis m-3">Metodo Pago: ATH</p>
            </div>
            <div class="col d-flex justify-content-between mb-4">
                <button class="btn btn-dark ms-4 p-3">Previous Order</button>
                <button id="opc" class="btn btn-warning" onclick="order_C_P()">Order Pending</button>


                <form action="current.php" method="POST">
                    <!-- Data for details table -->
                    <input type="hidden" name="typ" value="<?php echo $type ?>">
                    <input type="hidden" name="ings" value="<?php echo $ingredients ?>">
                    <input type="hidden" name="tops" value="<?php echo $toppings ?>">
                    <input type="hidden" name="qty" value="<?php echo $qty ?>">
                    <input type="hidden" name="price" value="<?php echo $price ?>">

                    <!-- Data for past_orders table -->
                    <input type="hidden" name="i" value="<?php echo $id ?>">
                    <input type="hidden" name="client" value="<?php echo $client_name ?>">
                    <input type="hidden" name="t_qty" value="<?php echo $total_quantity ?>">
                    <input type="hidden" name="t" value="<?php echo $total ?>">
                    <input type="hidden" value="ATH">
                    <input type="hidden" value="Yes">

                    <button type="submit" id="next" class="btn btn-dark me-4 p-3" disabled name="next_order">Next
                        Order</button>
                </form>



            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script>
    function order_C_P() {
        if (document.getElementById("opc").classList.contains("btn-warning")) {
            document.getElementById("opc").classList.remove("btn-warning");
            document.getElementById("opc").classList.add("btn-success");
            document.getElementById("opc").innerHTML = "Order Completed";
            document.getElementById("next").removeAttribute("disabled");
        } else if (document.getElementById("opc").classList.contains("btn-success")) {
            document.getElementById("opc").classList.remove("btn-success");
            document.getElementById("opc").classList.add("btn-warning");
            document.getElementById("opc").innerHTML = "Order Pending";
            document.getElementById("next").setAttribute("disabled", "True");

        }
    }
</script>

</html>