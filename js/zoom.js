function mostrarZoom(event, src) {
    var zoom = document.createElement("img");
    zoom.setAttribute("src", src);
    zoom.setAttribute("style", "position: absolute; top: " + event.clientY + "px; left: " + event.clientX + "px; width: 500px; height: 500px;");
    document.body.appendChild(zoom);
    zoom.style.visibility = "visible";
}

document.addEventListener("mousemove", function(event) {
    var zoom = document.querySelector("img[src='" + event.target.src + "']");
    if (zoom) {
        zoom.style.top = (event.clientY + 50) + "px";
        zoom.style.left = (event.clientX + 50) + "px";
    }
});

document.addEventListener("mouseout", function(event) {
    var zoom = document.querySelector("img[src='" + event.target.src + "']");
    if (zoom) {
        zoom.parentNode.removeChild(zoom);
    }
});