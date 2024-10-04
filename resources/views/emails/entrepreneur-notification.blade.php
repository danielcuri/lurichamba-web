<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correo de Recuperacion de Contraseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .footer {
            font-size: 0.8em;
            text-align: center;
            padding: 10px;
            background-color: #eee;
        }

        a {
            color: #007bff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">

            <h3>SOLICITUD PARA EMPRENDEDOR LURICHAMBA MDSJL</h3>
        </div>
        <p>Se ha recibido una nueva solicitud de registro en el sistema. A continuación, se detallan los datos del usuario:</p>
        <p>Nombre Completo: {{ $fullname }}</p>
        <p>Correo Electronico: {{ $email }}</p>
        <p>Numero Telefonico: {{ $cellphone }}</p>
        <p>Por favor, revise la solicitud y proceda según los protocolos establecidos. </p>
        <p>Saludos cordiales,</p>
      
    </div>
</body>

</html>
