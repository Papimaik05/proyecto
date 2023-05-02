var radios = document.querySelectorAll('input[type="radio"][name="experiencia"]');
    radios.forEach(function(radio){
        radio.addEventListener('click', function(){
            document.getElementById("nombre").value = this.getAttribute("data-nombre");
            document.getElementById("descripcion").value = this.getAttribute("data-descripcion");
            document.getElementById("puntos").value = this.getAttribute("data-puntos");
            document.getElementById("precio").value = this.getAttribute("data-precio");
            document.getElementById("imagen").value = this.getAttribute("data-imagen");
        });
    });

    var radios = document.querySelectorAll('input[type="radio"][name="usuario"]');
    radios.forEach(function(radio){
        radio.addEventListener('click', function(){
            document.getElementById("email").value = this.getAttribute("data-email");
            document.getElementById("puntos").value = this.getAttribute("data-puntos");
        });
    });
    var radios = document.querySelectorAll('input[type="radio"][name="producto"]');
    radios.forEach(function(radio){
        radio.addEventListener('click', function(){
            document.getElementById("nombre").value = this.getAttribute("data-nombre");
            document.getElementById("descripcion").value = this.getAttribute("data-descripcion");
            document.getElementById("unidades").value = this.getAttribute("data-unidades");
            document.getElementById("precio").value = this.getAttribute("data-precio");
            document.getElementById("imagen").value = this.getAttribute("data-imagen");
        });
    });

    

