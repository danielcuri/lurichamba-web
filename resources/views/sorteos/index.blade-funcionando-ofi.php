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
            background-color: #f5f5f5;
        }

        .container {
            width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        #contador {
            font-size: 60px;
            margin-bottom: 20px;
            color: #007bff;
            font-weight: bold;
        }

        #btnIniciar {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        #resultado {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            height: 200px;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            border-radius: 10px;
        }

        #resultado.show {
            display: block;
        }

        #btnCerrarModal {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
        }

        #ganador {
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
        }

        .confeti-container {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .confeti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: red;
            border-radius: 50%;
            animation: caer 2s linear infinite;
        }

        @keyframes caer {
            to {
                transform: translateY(200px) rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Contador con Sorteo Aleatorio</h1>

        <div id="contador">20</div>
        <button id="btnIniciar">Iniciar</button>

        <div id="resultado" class="modal">
            <h2>¡Felicidades!</h2>
            <p id="ganador"></p>
            <button id="btnCerrarModal">Cerrar</button>

            <div class="confeti-container"></div>
        </div>
    </div>

    <script>
        const contador = document.getElementById('contador');
        const btnIniciar = document.getElementById('btnIniciar');
        const resultado = document.getElementById('resultado');
        const ganador = document.getElementById('ganador');
        const btnCerrarModal = document.getElementById('btnCerrarModal');
        const confetiContainer = document.querySelector('.confeti-container');

        const participantes = ['T-100', 'T-800', 'T-650', 'T-620', 'T-798', 'T-777', 'T-654', 'T-456', 'T-965', 'T-321'];
        let intervalo;
        let participanteActual = '';

        btnIniciar.addEventListener('click', iniciarConteo);
        btnCerrarModal.addEventListener('click', cerrarModal);

        function iniciarConteo() {
            btnIniciar.disabled = true;
            resultado.style.display = 'none';

            let numeroActual = parseInt(contador.textContent);

            intervalo = setInterval(() => {
                numeroActual--;
                participanteActual = participantes[Math.floor(Math.random() * participantes.length)];
                contador.textContent = `${numeroActual} - ${participanteActual}`;

                if (numeroActual === 0) {
                    clearInterval(intervalo);
                    mostrarGanador();
                }
            }, 1000);
        }

        function mostrarGanador() {
            ganador.textContent = participanteActual;
            resultado.classList.add('show');
            crearConfeti();
        }

        function cerrarModal() {
            resultado.classList.remove('show');
            limpiarConfeti();
            btnIniciar.disabled = false;
            contador.textContent = 20;
        }

        function crearConfeti() {
            for (let i = 0; i < 50; i++) {
                const confeti = document.createElement('div');
                confeti.classList.add('confeti');
                confeti.style.left = random(0, 100) + '%';
                confeti.style.backgroundColor = randomColor();
                confeti.style.animationDuration = random(2, 5) + 's';
                confetiContainer.appendChild(confeti);
            }
        }

        function limpiarConfeti() {
            confetiContainer.innerHTML = '';
        }

        function random(min, max) {
            return Math.random() * (max - min) + min;
        }

        function randomColor() {
            const colors = ['#f00', '#0f0', '#00f', '#ff0', '#0ff', '#f0f'];
            return colors[Math.floor(Math.random() * colors.length)];
        }
    </script>
</body>

</html>
