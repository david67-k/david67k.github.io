<?php

session_start();


if (!isset($_SESSION['loggedin'])) {

    header('Location: index.html');
    exit;
}


$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'login-php';


$conexion = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_error()) {


    exit('Fallo en la conexión de MySQL:' . mysqli_connect_error());
}

$stmt = $conexion->prepare('SELECT password, email FROM accounts WHERE id = ?');


$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Usuario</title>
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

        table {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background: white;
        }

        table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        table tr:nth-child(even) {
            background: #f9f9f9;
        }

        table tr:nth-child(odd) {
            background: #fff;
        }

        table tr:hover {
            background: #f1f1f1;
        }

        table td:first-child {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>

<body class="loggedin">
    <nav class="navtop">
        <h1 style="color:white;">Sistema de Login Básico ConfiguroWeb</h1>
        <a href="inicio.php" style="color:white;">Inicio</a>
        <a href="cerrar-sesion.php" style="color:white;"><i class="fas fa-sign-out-alt"></i>Cerrar Sesion</a>
    </nav>
    <div class="content">

        <h2>Información del Usuario</h2>
        <div>
            <p>
                La siguiente es la información registrada de tu cuenta
            </p>
            <table>
                <tr>
                    <td>Usuario:</td>
                    <td><?= $_SESSION['name'] ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?= $email ?></td>
                </tr>
            </table>
        </div>
    </div>
    </nav>
</body>
</html>