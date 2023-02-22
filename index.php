<?php

$conn = mysqli_connect('localhost', 'dlaboy', 'Diego', 'oasis', 3307);


if (!$conn) {
    echo 'Connection Error:';
}


$errors = array('nombre' => '');
$name = "";


if (isset($_POST['submit'])) {
    if (empty($_POST['nombre'])) {

        $errors['nombre'] = 'A name is required <br />';
    } else {
        $name = $_POST['nombre'];

        if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
            $errors['nombre'] = 'Item name must be letters and spaces only';
        } // echo

        htmlspecialchars($_POST['nombre']);
    }
    if (array_filter($errors)) {
        echo "There are errors";
    } else {
        header("Location: http://localhost/orders/new-order.php");

        $name = htmlspecialchars($_POST['nombre']);

        $sqld = "DELETE FROM names";

        if (mysqli_query($conn, $sqld)) {
            // success
            echo "Item Added Succesfully";
        } else {
            // error
            echo "Query Error: " . mysqli_error($conn);
        }
        $sql = "INSERT INTO names(nom) VALUES('$name')";

        if (mysqli_query($conn, $sql)) {
            // success
            header("Location: http://localhost/orders/new-order.php");
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="./style.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Homemade+Apple&family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;1,700&family=Raleway:wght@300;400;500;700&display=swap"
        rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <nav class="nave navbar navbar-expand navbar-dark bg-black w-100 d-flex align-items-center justify-content-center">
        <img class="logo" src="./img/logo1.png" alt="">
    </nav>
    <div class="container conta ">

        <div class="row welcome mt-5 rounded-4 d-flex flex-column">
            <div class="col d-flex flex-column align-items-center justify-content-center">
                <h1>Bienvenidos</h1>
                <p>Introduce un nombre y presiona para continuar</p>
                <form method="POST" action="" class="d-flex flex-row justify-content-center">
                    <div class="form-group w-100 d-flex flex-column justify-content-center">
                        <input value="" type="text" class="form-control w-100 p-2" placeholder="Juan del Pueblo"
                            name="nombre" id="n">
                        <div class="text-light bg-danger"><?php echo $errors['nombre'] ?></div>
                    </div>
                    <button class="btn" type="submit" name="submit"><img class="ima" src="./img/right-arrow(1).png"
                            alt=""></button>
                </form>
            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

</body>

</html>