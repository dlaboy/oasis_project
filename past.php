<?php

$conn = mysqli_connect('localhost', 'dlaboy', 'Diego', 'oasis', 3307);


if (!$conn) {
    echo 'Connection Error:';
}

$sql = "SELECT * FROM past_orders";

$result = mysqli_query($conn, $sql);

$past_orders =  mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

if (isset($_POST['delete'])) {
    $id_to_delete  = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM past_orders WHERE idp = $id_to_delete";

    if (mysqli_query($conn, $sql)) {
        // success
        header('Location: http://localhost/monitor_app/past.php');
    } else {
        // failure
        echo "Query Error: " . mysqli_error($conn);
    }
}

$errors = "";

if (isset($_POST['look'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name_to_look']);

    $sqlp = "SELECT * FROM details WHERE clients = '$name'";

    $resultp = mysqli_query($conn, $sqlp);

    $more_info = mysqli_fetch_all($resultp, MYSQLI_ASSOC);

    mysqli_free_result($resultp);
} else {
    $errors = "Press Search Button";
}







?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/monitor_app/past.css" />

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
                <a href="/monitor_app/current.php" class="nav-link text-decoration-none text-light">
                    Current Orders</a>
                <a href="/monitor_app/past.php" class="nav-link text-decoration-none text-light">Past Orders</a>
                <a href="/monitor_app/sales.php" class="nav-link text-decoration-none text-light">Sales</a>
                <a href="/inventory2/" class="nav-link text-decoration-none text-light">Inventory</a>
            </div>
        </div>
    </nav>
    <div class="container conta mt-5 ">
        <div class="row p-3 bg-white rounded-3 d-flex flex-column shadow">
            <div class="col ">
                <h2 class="text-secondary-emphasis text-center">Past Orders</h2>
            </div>

            <div class="col w-100">
                <table class="table table-hover text-secondary-emphasis m-2">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Total Payout</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">To Go</th>
                            <th scope="col">More Info(Press Search First) </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $totalito = 0 ?>
                        <?php foreach ($past_orders as $p) { ?>
                            <tr>
                                <td class="p-4">
                                    <?php echo htmlspecialchars($p['client_name']) ?>
                                </td>
                                <td class="p-4"><?php echo htmlspecialchars($p['qty']) ?></td>
                                <td class="p-4">
                                    $<?php echo htmlspecialchars($p['total_payout']) ?>.00
                                </td>
                                <td class="p-4">
                                    <?php echo htmlspecialchars($p['payment_method']) ?>
                                </td>

                                <td class="p-4"><?php echo htmlspecialchars($p['to_go']) ?></td>
                                <td class="p-4 ">
                                    <input name="err" id="err" type="hidden" value="<?php echo $errors ?>">
                                    <form action="past.php" method="POST">
                                        <input type="hidden" name="name_to_look" value="<?php echo $p['client_name'] ?>">



                                        <!-- Example split danger button -->
                                        <div class="btn-group">
                                            <button name="look" type="submit" class="btn">Search</button>
                                            <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="visually-hidden">Toggle Dropdown</span>
                                            </button>
                                            <ul class="opts dropdown-menu">
                                                <!-- <li>
                                                <div id="e_a" class="e_a">
                                                    <p>Press Search Button</p>
                                                </div>
                                            </li> -->
                                                <li>
                                                    <div class=" tab">
                                                        <table class=" table table-hover text-secondary-emphasis m-2 ">
                                                            <thead>
                                                                <th scope="col">Type</th>
                                                                <th scope="col">Ings</th>
                                                                <th scope="col">Tops</th>
                                                                <th scope="col">Qty</th>
                                                                <th scope="col">Price</th>
                                                            </thead>

                                                            <tbody>
                                                                <?php foreach ($more_info as $mi) { ?>
                                                                    <tr>
                                                                        <td><?php echo $mi['idname'] ?></td>
                                                                        <td><?php echo $mi['ingredients'] ?></td>
                                                                        <td><?php echo $mi['toppings'] ?></td>
                                                                        <td><?php echo $mi['qty'] ?></td>
                                                                        <td>$<?php echo $mi['price'] ?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                </td>
                                <td class="p-4">
                                    <form action="past.php" method="POST">
                                        <input type="hidden" name="id_to_delete" value="<?php echo $p['idp'] ?>" />
                                        <button class="btn" type="submit" name="delete" value="delete">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script>
    // if (document.getElementById("err").getAttribute("value") == "") {
    //     document.getElementById("e_a").classList.add("d-none")
    //     document.getElementById("tablee").classList.remove("d-none")
    // }
</script>

</html>