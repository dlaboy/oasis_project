<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/monitor_app/style.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&family=Josefin+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;1,700&family=Raleway:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <title>Document</title>
</head>

<body class="bo">
    <nav class="nav-bar ">
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center bg-dark logo-section"><img class="logo" src="./img/logo2.png" alt=""></div>
        </div>
    </nav>
    <div class="container conta">
        <div class="row row-cols-1 bg-white rounded-3 fecha">
            <div class=" col  d-flex justify-content-center align-items-center flex-column">
                <form action="" class="d-flex flex-column align-items-center">
                    <label class="text-secondary p-3 text-center" for="">
                        <h2>Introduzca la fecha de hoy</h2>
                    </label>
                    <div class="input-group  d-flex justify-content-center ">
                        <select class="custom-select p-4 rounded-3 border-0 number" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <option value="1">01</option>
                            <option value="2">02</option>
                            <option value="3">03</option>
                        </select>
                        <select class="custom-select p-4 rounded-3 border-0 number" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <option value="1">01</option>
                            <option value="2">02</option>
                            <option value="3">03</option>
                        </select>
                        <select class="custom-select p-4 rounded-3 border-0 number" id="inputGroupSelect01">
                            <option selected>Choose...</option>
                            <option value="1">2022</option>
                            <option value="2">2021</option>
                            <option value="3">2020</option>
                        </select>
                    </div>
                </form>
                <a href="/monitor_app/logged.php">
                    <input type="button" class="btn btn-warning w-25 p-3" value="Continuar">
                </a>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

</html>