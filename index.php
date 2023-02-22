<?php

$conn = mysqli_connect('us-cdbr-east-06.cleardb.net', 'bfd1f7041bffd2', '61e5b9f6', 'heroku_67a0787f2e5b2d6');

if (!$conn) {
    echo 'Connection Error:';
}

// to get data from database
// 1. Construct Query
// 2. Make Query
// 3. Fetch results

// $comestibles = "";
// $noncomestibles = "";

if (isset($_POST['siu'])) {
    if (!empty($_POST['i'])) {
        $item = mysqli_real_escape_string($conn, $_POST['i']);

        $sqlSearched = "SELECT * FROM comestibles WHERE item = '$item'";
        $sql1 = 'SELECT * FROM noncomestibles ORDER BY quantity ASC';


        $search = mysqli_query($conn, $sqlSearched);
        $result1 = mysqli_query($conn, $sql1);


        $comestibles = mysqli_fetch_all($search, MYSQLI_ASSOC);
        $noncomestibles = mysqli_fetch_all($result1, MYSQLI_ASSOC);


        mysqli_free_result($search);
        mysqli_free_result($result1);


        // if ($search) {
        //     // success

        //     header('Location:index.php');
        // } else {
        //     // error
        //     echo "Query Error: " . mysqli_error($conn);
        // }
    } else {
        $sql = "SELECT * FROM comestibles ORDER BY quantity ASC";
        $sql11 = 'SELECT * FROM noncomestibles ORDER BY quantity ASC';

        // make query & get result
        $result = mysqli_query($conn, $sql);
        $result1 = mysqli_query($conn, $sql11);



        // fetch the resulting rows as an array 
        $comestibles = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $noncomestibles = mysqli_fetch_all($result1, MYSQLI_ASSOC);


        // free result from memory 
        mysqli_free_result($result);
        mysqli_free_result($result1);
    }
} elseif (isset($_POST['siu2'])) {
    if (!empty($_POST['i2'])) {
        $item = mysqli_real_escape_string($conn, $_POST['i2']);

        $sqlSearched = "SELECT * FROM noncomestibles WHERE item = '$item'";
        $sql1 = 'SELECT * FROM comestibles ORDER BY quantity ASC';


        $search = mysqli_query($conn, $sqlSearched);
        $result1 = mysqli_query($conn, $sql1);


        $comestibles = mysqli_fetch_all($result1, MYSQLI_ASSOC);
        $noncomestibles = mysqli_fetch_all($search, MYSQLI_ASSOC);


        mysqli_free_result($search);
        mysqli_free_result($result1);


        // if ($search) {
        //     // success

        //     header('Location:index.php');
        // } else {
        //     // error
        //     echo "Query Error: " . mysqli_error($conn);
        // }
    } else {
        $sql = "SELECT * FROM comestibles ORDER BY quantity ASC";
        $sql1 = 'SELECT * FROM noncomestibles ORDER BY quantity ASC';

        // make query & get result
        $result = mysqli_query($conn, $sql);
        $result1 = mysqli_query($conn, $sql1);



        // fetch the resulting rows as an array 
        $comestibles = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $noncomestibles = mysqli_fetch_all($result1, MYSQLI_ASSOC);


        // free result from memory 
        mysqli_free_result($result);
        mysqli_free_result($result1);
    }
} else {
    $sql = "SELECT * FROM comestibles ORDER BY quantity ASC";
    $sql11 = 'SELECT * FROM noncomestibles ORDER BY quantity ASC';

    // make query & get result
    $result = mysqli_query($conn, $sql);
    $result1 = mysqli_query($conn, $sql11);



    // fetch the resulting rows as an array 
    $comestibles = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $noncomestibles = mysqli_fetch_all($result1, MYSQLI_ASSOC);


    // free result from memory 
    mysqli_free_result($result);
    mysqli_free_result($result1);
}
// Write query for all items


// close connection 
// mysqli_close($conn);

// print_r($comestibles);

$errors = array('name' => '', 'quantity' => '');
$errors1 = array('name1' => '', 'quantity1' => '');
$name = "";
$quantity = "";
$name1 = "";
$quantity1 = "";
// $success = "";
// $success1 = "";



if (isset($_POST['increment'])) {
    // ob_start();

    $id_to_increment  = mysqli_real_escape_string($conn, $_POST['id_to_increment']);


    $sqli = "UPDATE comestibles SET quantity = quantity +'1' WHERE id = $id_to_increment";


    $increment = mysqli_query($conn, $sqli);

    if ($increment) {
        // success

        header('Location: https://oasis-i2.herokuapp.com/');
        // echo "Item Added Succesfully";
    } else {
        // error
        echo "Query Error: " . mysqli_error($conn);
    }
}
if (isset($_POST['increment1'])) {
    $id_to_increment1  = mysqli_real_escape_string($conn, $_POST['id_to_increment1']);


    $sql = "UPDATE noncomestibles SET quantity = quantity +'1' WHERE id = $id_to_increment1";

    if (mysqli_query($conn, $sql)) {
        // success
        header('Location: https://oasis-i2.herokuapp.com/');

        // echo "Item Added Succesfully";
    } else {
        // error
        echo "Query Error: " . mysqli_error($conn);
    }
}
if (isset($_POST['decrement'])) {
    $id_to_increment  = mysqli_real_escape_string($conn, $_POST['id_to_increment']);


    $sql = "UPDATE comestibles SET quantity = quantity -'1' WHERE id = $id_to_increment";

    if (mysqli_query($conn, $sql)) {
        // success
        header('Location: https://oasis-i2.herokuapp.com/');
        // echo "Item Added Succesfully";
    } else {
        // error
        echo "Query Error: " . mysqli_error($conn);
    }
}
if (isset($_POST['decrement1'])) {
    $id_to_increment1  = mysqli_real_escape_string($conn, $_POST['id_to_increment1']);


    $sql = "UPDATE noncomestibles SET quantity = quantity -'1' WHERE id = $id_to_increment1";

    if (mysqli_query($conn, $sql)) {
        // success
        header('Location: https://oasis-i2.herokuapp.com/');

        // echo "Item Added Succesfully";
    } else {
        // error
        echo "Query Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['delete'])) {
    $id_to_delete  = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM comestibles WHERE id = $id_to_delete";

    if (mysqli_query($conn, $sql)) {
        // success
        header('Location: https://oasis-i2.herokuapp.com/');
    } else {
        // failure
        echo "Query Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['delete1'])) {
    $id_to_delete1  = mysqli_real_escape_string($conn, $_POST['id_to_delete1']);

    $sql1 = "DELETE FROM noncomestibles WHERE id = $id_to_delete1";

    if (mysqli_query($conn, $sql1)) {
        // success
        header('Location: https://oasis-i2.herokuapp.com/');
    } else {
        // failure
        echo "Query Error: " . mysqli_error($conn);
    }
}

if (isset($_POST['submit'])) { // check item name

    if (empty($_POST['name'])) {
        $errors['name'] = 'An item name is required <br />';
    } else {
        $name = $_POST['name'];

        if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
            $errors['name'] = 'Item name must be letters and spaces only';
        } // echo

        htmlspecialchars($_POST['name']);
    }
    if (empty($_POST['quantity'])) {
        $errors['quantity'] = 'An quantity is required <br />';
    } else {
        $quantity = $_POST['quantity'];
        if (!filter_var($quantity, FILTER_VALIDATE_INT)) {
            $errors['quantity'] = 'Value must be a number <br />';
        }
    }
    if (array_filter($errors)) {
        echo 'There are errors';
    } else {
        // $success = 'Item added';
        // OJO
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

        // create sql

        $sqls = "INSERT INTO comestibles(item, quantity) VALUES('$name', '$quantity')";

        // save to db and check

        if (mysqli_query($conn, $sqls)) {
            // success
            header('Location: https://oasis-i2.herokuapp.com/');

            echo "Item Added Succesfully";
        } else {
            // error
            echo "Query Error: " . mysqli_error($conn);
        }
    }
}
if (isset($_POST['submit1'])) { // check item quantity
    if (empty($_POST['name1'])) {
        $errors1['name1'] = 'An item name is required <br />';
    } else {
        $name1 = $_POST['name1'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $name1)) {
            $errors1['name1'] = 'Item name must be letters and spaces only';
        }
    }
    if (empty($_POST['quantity1'])) {
        $errors1['quantity1'] = 'An quantity is required<br />';
    } else { // echo htmlspecialchars($_POST['quantity1']); $quantity1 =
        $quantity1 = $_POST['quantity1'];
        if (!filter_var($quantity1, FILTER_VALIDATE_INT)) {
            $errors1['quantity1'] = 'Value must be a number <br />';
        }
    }
    if (array_filter($errors1)) {
        echo 'There are errors';
    } else {
        // echo 'Item added';
        // OJO
        $name1 = mysqli_real_escape_string($conn, $_POST['name1']);
        $quantity1 = mysqli_real_escape_string($conn, $_POST['quantity1']);

        // create sql

        $sql1 = "INSERT INTO noncomestibles(item, quantity) VALUES('$name1', '$quantity1')";

        // save to db and check

        if (mysqli_query($conn, $sql1)) {
            // success
            header('Location: https://oasis-i2.herokuapp.com/');
            echo "Item Added Succesfully";
        } else {
            // error
            echo "Query Error: " . mysqli_error($conn);
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />


    <link rel="stylesheet" href="./style.css" />

    <!-- <script>
        // Check that service workers are supported
        if ("serviceWorker" in navigator) {
            // Use the window load event to keep the page load performant

            window.addEventListener("load", () => {
                navigator.serviceWorker.register("./sw.js");
            });
        }
    </script> -->


    <title>Document</title>
</head>

<body>
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
    <div class="content container mt-4">
        <div class="rowa row shadow rounded-4 p-3">
            <div class="comestib d-flex flex-md-row flex-column align-items-center justify-content-between w-100">
                <h2>Comestibles</h2>

                <div class="botones d-flex flex-md-row flex-column align-items-center justify-content-between w-100">
                    <div class="masMenos d-flex flex-row w-50 justify-content-center">
                        <button class="btn text-danger" id="less" onclick="showMore()"><img class="ima"
                                src="./img/down-arrow (2).png" alt=""></button>
                        <button class="btn text-info" id="more" onclick="showLess()"><img class="uploadArrow"
                                src="./img/upload.png" alt=""></button>
                    </div>
                    <div class="sbd d-flex flex-row align-items-center justify-content-between  w-100">


                        <form method="POST" action="index.php" class="d-flex flex-row form-inline my-2 my-lg-0 w-75">
                            <input name="i" class=" form-control " type="text" placeholder="Search">
                            <button name="siu" class=" btn btn-outline-success  " type="submit"><img class="ima"
                                    src="./img/lupa (1).png" alt=""></button>
                        </form>



                        <div class="dropdown">
                            <button class="btn btn-warning rounded-3 w-100 " type="button" data-bs-toggle="dropdown"
                                aria-expanded="true">
                                +
                            </button>
                            <div class="dropdown-menu formulario">
                                <form class="m-2" action="index.php" method="POST">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="" />
                                        <div class="text-danger"><?php echo $errors['name'] ?></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="text" class="form-control w-50" id="quantity" name="quantity"
                                            value="" />
                                        <div class="text-danger">
                                            <?php echo $errors['quantity'] ?>
                                        </div>
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <table id="t" class=" table table-hover">
                <thead>
                    <tr>
                        <th class="d-md-block d-none" scope="col">
                            <p>#</p>
                        </th>
                        <th scope="col" class="text-center">
                            <p>Name</p>
                        </th>
                        <th scope="col" class="text-center">
                            <p>Qty</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($comestibles as $comestible) { ?>

                    <tr>
                        <th class="d-md-flex d-none p-4" scope="row">
                            <?php echo htmlspecialchars(($comestible['id'])); ?>
                        </th>
                        <td class="text-center"><?php echo htmlspecialchars(($comestible['item'])); ?></td>
                        <td class="d-flex align-items-center p-3">
                            <div class="input-group d-flex align-items-center justify-content-end w-100">
                                <form action="index.php" method="POST">
                                    <input type="submit" value="-" name="decrement"
                                        class="rosas button-minus border  icon-shape icon-sm mx-1" data-field="quantity"
                                        onclick="decrement()" />
                                    <input type="hidden" name="id_to_increment" value="<?php echo $comestible['id'] ?>">
                                    <input id="q" type="text" disabled max="10" name="q"
                                        value="<?php echo htmlspecialchars(($comestible['quantity'])); ?>"
                                        class="border-0 text-center w-25" />
                                    <input type="submit" value="+" name="increment"
                                        class="rosas button-plus border  icon-shape icon-sm" data-field="quantity"
                                        onclick="increment()" />
                                </form>
                            </div>
                        </td>

                        <td>
                            <form action="index.php" method="POST">
                                <input type="hidden" name="id_to_delete" value="<?php echo $comestible['id'] ?>">
                                <button class="btn" type="submit" name="delete" value="delete">
                                    <img class="ima" src="./img/bin(1).png" alt="" />
                                </button>
                            </form>
                        </td>
                    </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
        <div class="rowa row shadow rounded-4 mt-4 p-3">
            <div class="non-comestib d-flex flex-md-row flex-column align-items-center justify-content-between w-10">
                <h2>No Comestibles</h2>

                <div class="botones d-flex flex-md-row flex-column align-items-center justify-content-between w-100">
                    <div class="masMenos d-flex flex-row w-50 justify-content-center">
                        <button class="btn text-danger" id="less1" onclick="showMore1()"><img class="ima"
                                src="./img/down-arrow (2).png" alt=""></button>
                        <button class="btn text-info" id="more1" onclick="showLess1()"><img class="uploadArrow"
                                src="./img/upload.png" alt=""></button>
                    </div>
                    <div class="sbd d-flex flex-row align-items-center justify-content-between  w-100">
                        <form method="POST" action="index.php" class="d-flex flex-row form-inline my-2 my-lg-0 w-75">
                            <input name="i2" class="form-control " type="text" placeholder="Search">
                            <button name="siu2" class="btn btn-outline-success " type="submit"><img class="ima"
                                    src="./img/lupa (1).png" alt=""></button>
                        </form>


                        <div class="dropdown">
                            <button class="btn btn-warning rounded-3" type="button" data-bs-toggle="dropdown"
                                aria-expanded="true">
                                +
                            </button>
                            <div class="dropdown-menu formulario">
                                <form class="m-2" action="index.php" method="POST">
                                    <div class="mb-3">
                                        <label for="name1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name1" value="" />
                                        <div class="text-danger"><?php echo $errors1['name1'] ?></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="quantity1" class="form-label">Quantity</label>
                                        <input type="text" class="form-control w-50" id="quantity1" name="quantity1"
                                            value="" />
                                        <div class="text-danger">
                                            <?php echo $errors1['quantity1'] ?>
                                        </div>
                                    </div>

                                    <button type="submit" name="submit1" class="btn btn-primary">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>


                </div>




            </div>
            <table id="nt" class=" table table-hover">
                <thead>
                    <tr>
                        <th class="d-md-block d-none" scope="col">
                            <p>#</p>
                        </th>
                        <th scope="col" class="text-center">
                            <p>Name</p>
                        </th>
                        <th scope="col" class="text-center">
                            <p>Qty</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($noncomestibles as $noncomestible) { ?>

                    <tr>
                        <th class="d-md-flex d-none p-4" scope="row">
                            <?php echo htmlspecialchars(($noncomestible['id'])); ?></th>
                        <td class="text-center"><?php echo htmlspecialchars(($noncomestible['item'])); ?></td>
                        <td class="d-flex align-items-center p-3">
                            <div class="input-group d-flex align-items-center justify-content-end w-100">
                                <form action="index.php" method="POST">
                                    <input type="submit" value="-" name="decrement1"
                                        class="rosas button-minus border  icon-shape icon-sm mx-1" data-field="quantity"
                                        onclick="decrement()" />
                                    <input type="hidden" name="id_to_increment1"
                                        value="<?php echo $noncomestible['id'] ?>">
                                    <input id="q" type="text" disabled max="10" name="q"
                                        value="<?php echo htmlspecialchars(($noncomestible['quantity'])); ?>"
                                        class="border-0 text-center w-25" />
                                    <input type="submit" value="+" name="increment1"
                                        class="rosas button-plus border  icon-shape icon-sm" data-field="quantity"
                                        onclick="increment()" />
                                </form>
                            </div>
                        </td>

                        <td>
                            <form action="index.php" method="POST">
                                <input type="hidden" name="id_to_delete1" value="<?php echo $noncomestible['id'] ?>">
                                <button class="btn" type="submit" name="delete1" value="delete">
                                    <img class="ima" src="./img/bin(1).png" alt="" />
                                </button>
                            </form>
                        </td>
                    </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
    function showMore1() {
        document.getElementById("nt").classList.remove("d-none");

    }

    function showMore() {
        document.getElementById("t").classList.remove("d-none");

    }

    function showLess1() {
        document.getElementById("nt").classList.add("d-none");


    }

    function showLess() {
        document.getElementById("t").classList.add("d-none");


    }

    function increment() {
        var e = document.getElementById("q").getAttribute("value");
        e++;

        document.getElementById("q").setAttribute("value", e);

        console.log(e);
    }

    function decrement() {
        var e = document.getElementById("q").getAttribute("value");

        if (e > 0) {
            e--;
        }
        document.getElementById("q").setAttribute("value", e);

        console.log(q);
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>