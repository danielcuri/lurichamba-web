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
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        #contador {
            font-size: 60px;
            margin-bottom: 20px;
            color: #007bff;
            font-weight: bold;
            animation: pulsate 1s infinite;
        }

        @keyframes pulsate {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
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

    {{-- <style>
        .lds-roller,
        .lds-roller div,
        .lds-roller div:after {
            box-sizing: border-box;
        }

        .lds-roller {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }

        .lds-roller div {
            animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            transform-origin: 40px 40px;
        }

        .lds-roller div:after {
            content: " ";
            display: block;
            position: absolute;
            width: 7.2px;
            height: 7.2px;
            border-radius: 50%;
            background: currentColor;
            margin: -3.6px 0 0 -3.6px;
        }

        .lds-roller div:nth-child(1) {
            animation-delay: -0.036s;
        }

        .lds-roller div:nth-child(1):after {
            top: 62.62742px;
            left: 62.62742px;
        }

        .lds-roller div:nth-child(2) {
            animation-delay: -0.072s;
        }

        .lds-roller div:nth-child(2):after {
            top: 67.71281px;
            left: 56px;
        }

        .lds-roller div:nth-child(3) {
            animation-delay: -0.108s;
        }

        .lds-roller div:nth-child(3):after {
            top: 70.90963px;
            left: 48.28221px;
        }

        .lds-roller div:nth-child(4) {
            animation-delay: -0.144s;
        }

        .lds-roller div:nth-child(4):after {
            top: 72px;
            left: 40px;
        }

        .lds-roller div:nth-child(5) {
            animation-delay: -0.18s;
        }

        .lds-roller div:nth-child(5):after {
            top: 70.90963px;
            left: 31.71779px;
        }

        .lds-roller div:nth-child(6) {
            animation-delay: -0.216s;
        }

        .lds-roller div:nth-child(6):after {
            top: 67.71281px;
            left: 24px;
        }

        .lds-roller div:nth-child(7) {
            animation-delay: -0.252s;
        }

        .lds-roller div:nth-child(7):after {
            top: 62.62742px;
            left: 17.37258px;
        }

        .lds-roller div:nth-child(8) {
            animation-delay: -0.288s;
        }

        .lds-roller div:nth-child(8):after {
            top: 56px;
            left: 12.28719px;
        }

        @keyframes lds-roller {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style> --}}
</head>

<body>
    <div class="container">

        {{-- <div class="lds-roller">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div> --}}
        <h1>Contador con Sorteo Aleatorio</h1>

        <div id="contador">20</div>
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
            resultado.style = '';

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
