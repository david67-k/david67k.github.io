<?php


// confirmar sesion

session_start();


if (!isset($_SESSION['loggedin'])) {

    header('Location: index.html');
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .navtop {
            background-color: #333;
            height: 60px;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            box-sizing: border-box;
        }

        .navtop h1 {
            color: white;
            margin: 0;
        }

        .navtop a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .navtop a:hover {
            color: #ddd;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            margin: 0 0 20px 0;
            font-size: 24px;
        }

        .content p {
            font-size: 18px;
            margin: 0;
        }
    </style>
</head>

<body class="loggedin">
    <nav class="navtop">
        <h1 style="color:white;">Sistema de Login Básico ConfiguroWeb</h1>
        <a href="perfil.php" style="color:white;"><i class="fas fa-user-circle"></i>Informción de Usuario</a>
        <a href="cerrar-sesion.php" style="color:white;"><i class="fas fa-sign-out-alt"></i>Cerrar Sesión</a>
        <a href="carrito_compra.php" style="color: white;"><i class="fa-solid fa-cart-shopping"></i> "></i>carrito de compra</a>
    </nav>

    <div class="content">
        <h2>Página de Inicio</h2>
        <p>Hola de nuevo, <?= $_SESSION['name'] ?> !!!</p>
    </div>
</body>

</html>