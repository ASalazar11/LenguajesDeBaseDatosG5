document.addEventListener("DOMContentLoaded", () => {
  const $boton = document.querySelector("#capturar"); // Accede al botón de captura

  $boton.addEventListener("click", () => {
    const $elementoParaCapturar = document.querySelector("form"); // Captura solo el formulario

    // Captura una captura de pantalla del formulario y crea una imagen
    html2canvas($elementoParaCapturar).then(canvas => {
      // Crea un elemento de imagen y establece el contenido de la captura de pantalla
      const $imagenCapturada = new Image();
      $imagenCapturada.src = canvas.toDataURL("image/png");

      // Crea un elemento <a> para simular la descarga
      const $enlaceDescarga = document.createElement("a");
      $enlaceDescarga.href = $imagenCapturada.src;
      $enlaceDescarga.download = "FORMULARIO.png"; // Cambia el nombre del archivo según tus preferencias
      $enlaceDescarga.style.display = "none"; // Oculta el enlace

      // Agrega el enlace de descarga al DOM y haz clic en él para descargar la imagen
      document.body.appendChild($enlaceDescarga);
      $enlaceDescarga.click();
      document.body.removeChild($enlaceDescarga);

      console.log("Imagen del formulario descargada automáticamente");
    });
  });
});
