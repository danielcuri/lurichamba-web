<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador con Sorteo Aleatorio</title>

    <style>
        body {
            font-family: sans-serif;
            text-align: center;
        }

        .container {
            width: 500px;
            margin: 0 auto;
        }

        #contador {
            font-size: 40px;
            margin-bottom: 20px;
        }

        #btnIniciar {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        #resultado {
            margin-top: 20px;
        }

        #lista {
            list-style: none;
            padding: 0;
        }

        #lista li {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Contador con Sorteo Aleatorio</h1>

        <div id="contador">5</div>
        <button id="btnIniciar">Iniciar</button>

        <div id="resultado">
            <h2>Resultado del Sorteo:</h2>
            <p id="ganador"></p>
        </div>

        <ul id="lista">
            <li>Participante 1</li>
            <li>Participante 2</li>
            <li>Participante 3</li>
            <li>Participante 4</li>
            <li>Participante 5</li>
        </ul>
    </div>


    <script>
        const contador = document.getElementById('contador');
        const btnIniciar = document.getElementById('btnIniciar');
        const resultado = document.getElementById('resultado');
        const ganador = document.getElementById('ganador');
        const lista = document.getElementById('lista');

        let participantes = [...lista.querySelectorAll('li')].map(li => li.textContent); // Obtener lista de participantes
        let intervalo;

        btnIniciar.addEventListener('click', iniciarConteo);

        function iniciarConteo() {
            btnIniciar.disabled = true; // Deshabilitar el botón
            resultado.style.display = 'none'; // Ocultar el resultado

            let numeroActual = parseInt(contador.textContent); // Obtener el número actual

            intervalo = setInterval(() => {
                numeroActual--;
                contador.textContent = numeroActual;

                if (numeroActual === 0) {
                    clearInterval(intervalo); // Detener el intervalo
                    seleccionarGanador();
                }
            }, 1000); // Actualizar el contador cada segundo
        }

        function seleccionarGanador() {
            const indiceGanador = Math.floor(Math.random() * participantes.length); // Obtener índice aleatorio
            const participanteGanador = participantes[indiceGanador];

            ganador.textContent = participanteGanador; // Mostrar el ganador
            resultado.style.display = 'block'; // Mostrar el resultado
        }
    </script>


</body>

</html>
