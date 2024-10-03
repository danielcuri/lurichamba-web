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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
            position: relative;
        }

        #contador {
            font-size: 60px;
            margin-bottom: 20px;
            color: #007bff;
            font-weight: bold;
        }

        .loading-container {
            position: relative;
            display: inline-block;
            margin-bottom: 20px;
        }

        .loading {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #007bff;
            border-radius: 50%;
            width: 120px;
            height: 120px;
            animation: spin 2s linear infinite;
        }

        .loading-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            color: #007bff;
            font-weight: bold;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
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

        #participanteActual {
            margin-top: 20px;
            font-size: 24px;
            color: #ff6347;
            font-weight: bold;
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

        <div class="loading-container">
            <div class="loading"></div>
            <div class="loading-leaf">
                <svg width="360" height="360" viewBox="0 0 360 360" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="countdown-v2__svg" style="color: #D20E80;">
                    <circle opacity="0.08" cx="179.998" cy="179.578" r="162.018" stroke="currentColor"
                        stroke-width="35" stroke-linejoin="round" stroke-dasharray="8 30"></circle>
                </svg>
            </div> <!-- Nuevo div para el segundo efecto -->

            <div class="loading-text" id="contador">20</div>
        </div>

        <div id="participanteActual"></div>
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
        const participanteActualElement = document.getElementById('participanteActual');
        const confetiContainer = document.querySelector('.confeti-container');

        const participantes = ['T-100', 'T-800', 'T-650', 'T-620', 'T-798', 'T-777'];
        let intervaloConteo;
        let intervaloSeleccion;
        let tiempoRestante = 20;
        let velocidadSeleccion = 0.01;

        btnIniciar.addEventListener('click', iniciarConteo);
        btnCerrarModal.addEventListener('click', cerrarModal);

        function iniciarConteo() {
            btnIniciar.disabled = true;
            resultado.style.display = 'none';
            tiempoRestante = 20;
            contador.textContent = tiempoRestante;
            participanteActualElement.textContent = '';
            velocidadSeleccion = 0.01;

            clearInterval(intervaloConteo);
            clearInterval(intervaloSeleccion);

            intervaloConteo = setInterval(actualizarConteo, 1000);
            seleccionarParticipante();
        }

        function actualizarConteo() {
            tiempoRestante--;
            contador.textContent = tiempoRestante;

            if (tiempoRestante <= 0) {
                clearInterval(intervaloConteo);
                clearInterval(intervaloSeleccion);
                mostrarGanador();
            }
        }

        function seleccionarParticipante() {
            intervaloSeleccion = setInterval(() => {
                const participanteActual = participantes[Math.floor(Math.random() * participantes.length)];
                participanteActualElement.textContent = participanteActual;

                if (tiempoRestante > 0) {
                    clearInterval(intervaloSeleccion);
                    velocidadSeleccion += 3; // Incrementa el tiempo entre selecciones
                    seleccionarParticipante();
                }
            }, velocidadSeleccion);
        }

        function mostrarGanador() {
            ganador.textContent = participanteActualElement.textContent;
            resultado.classList.add('show');
            crearConfeti();
        }

        function cerrarModal() {
            resultado.classList.remove('show');
            limpiarConfeti();
            btnIniciar.disabled = false;
            contador.textContent = 20;
            participanteActualElement.textContent = '';
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
