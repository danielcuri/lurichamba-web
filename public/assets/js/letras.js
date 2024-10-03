function soloLetrasTildesNombreCampo(e) {
    try {
        key = window.event ? e.which : e.keyCode;
        
        tecla = String.fromCharCode(key).toLowerCase();
        
        /*
         * 8 - backspace
         */
        especiales = [8];
        tecla_especial = false;
        for (var i in especiales) {
            if (key === especiales[i]) {
                tecla_especial = true;
                break;
            }
        }

        //Sólo se permite letras, tildes, ñ y espacio en blanco
        if (!/[a-zäëïöüáéíóúáéíóúâêîôûàèìòù\u00f1\u00d1\s]/.test(tecla) && !tecla_especial) {
            return false;
        }
    } catch (error) {
        console.log(error);
    }
}