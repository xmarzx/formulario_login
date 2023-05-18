with(document.restablecer_contrasena){
    onsubmit = function(e){
        e.preventDefault();
        ok = true;    
        if(ok && contrasena.value!= contrasena_conf.value){
            ok=false;
            contrasena_conf.focus();
            document.querySelector('span').style.display = 'block'; // Mostrar el span
        } else {
            document.querySelector('span').style.display = 'none'; // Ocultar el span si las contraseñas coinciden
        }
        if(ok){ submit(); }
    }
}