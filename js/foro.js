function mostrarFormRespuesta(id){
    var formulario = document.getElementById("formRespuesta" + id);
    formulario.style.display = "block";
}
function darMeGusta(idComentario) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "actualizarMeGusta.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
        var respuesta = xhr.responseText;
        var meGusta = parseInt(respuesta);
        console.log(respuesta);
        document.getElementById("contador-me-gusta-" + idComentario).innerHTML = meGusta;
        }
    };
    
    xhr.send("idComentario=" + idComentario);
}