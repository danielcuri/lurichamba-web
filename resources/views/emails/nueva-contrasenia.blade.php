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

            <h3>NUEVA CONTRASEÑA LURICHAMBA MDSJL</h3>
        </div>
        <p>¡Hola!</p>


        <p>DE LA WEB LURICHAMBA MDSJL LE REMITIMOS SU NUEVA CONTRASEÑA: {{ $contrasenia }}</p>

        <p>Para comenzar, te invitamos a visitar nuestro sitio web:</p>
        <p><a href="{{ route('portal-login.index') }}">lurichamba.munisjl.gob.pe/</a></p>


        <div class="footer">
            <p>Gracias por unirte a nosotros,</p>         
        </div>
    </div>
</body>

</html>
