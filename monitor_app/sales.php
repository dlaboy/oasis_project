<?php

$conn = mysqli_connect('localhost', 'dlaboy', 'Diego', 'oasis', 3307);


if (!$conn) {
    echo 'Connection Error:';
}

$sql = "SELECT * FROM past_orders";

$result = mysqli_query($conn, $sql);

$past_orders =  mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

$cash_totalito = 0;
$ath_totalito = 0;
$qty_total = 0;

foreach ($past_orders as $p) {
    $ath_totalito += $p['total_payout'];
    $qty_total += $p['qty'];
}

$totalito = $cash_totalito + $ath_totalito;

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/monitor_app/sales.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Homemade+Apple&family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;1,700&family=Raleway:wght@300;400;500;700&display=swap"
        rel="stylesheet" />
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
    <div class="container conta d-flex flex-column bg-white mt-5 rounded-3">
        <div class="row d-flex flex-row h-75">
            <div class="col d-flex flex-row">
                <div class="col">
                    <h3 class="p-3">Venta Cash</h3>
                    <h3 class="p-3">Venta Ath</h3>
                    <h3 class="p-3">Total</h3>
                </div>
                <div class="col">
                    <input class="m-3 rounded-3 p-1 border-0 bg-secondary-subtle" type="text" id="VC" value="" />
                    <input class="mt-4 ms-3 rounded-3 p-1 border-0 bg-secondary-subtle" type="text" id="VA"
                        value="$<?php echo $ath_totalito ?>.00" />
                    <input class="mt-5 ms-3 rounded-3 p-1 border-0 bg-secondary-subtle" type="text" id="T"
                        value="$<?php echo $totalito ?>.00" />
                </div>
            </div>
            <div class="col">
                <div class="col">
                    <div class="col d-flex flex-row">
                        <h3 class="p-4 w-100">Helados Vendidos</h3>
                        <input class="m-4 rounded-3 p-1 w-25 border-0 bg-secondary-subtle" type="number" id="VC"
                            value="<?php echo $qty_total ?>" />
                        <button class="btn"><img src="./" alt="" /></button>
                    </div>
                    <div class="prods d-flex flex-column align-items-end w-100">
                        <div class="col icr d-flex flex-row">
                            <h6 class="p-3 w-100 text-center">Ice Cream Rolls</h6>
                            <input class="m-3 rounded-3 p-1 w-25 border-0 bg-secondary-subtle" type="number" id="VC" />
                        </div>
                        <div class="col wb d-flex flex-row">
                            <h6 class="p-3 w-100 text-center">Waffle Bowls</h6>
                            <input class="m-3 rounded-3 p-1 w-25 border-0 bg-secondary-subtle" type="number" id="VC" />
                        </div>
                        <div class="col pr d-flex flex-row">
                            <h6 class="p-3 w-100 text-center">Puppy Rolls</h6>
                            <input class="m-3 rounded-3 p-1 w-25 border-0 bg-secondary-subtle" type="number" id="VC" />
                        </div>
                    </div>
                    <div class="col d-flex flex-row">
                        <h3 class="p-4 w-100">Bebidas</h3>
                        <input class="m-4 rounded-3 p-1 w-25 border-0 bg-secondary-subtle" type="number" id="VC" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <button class="btn btn-warning p-3">Someter Informe</button>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

</html>