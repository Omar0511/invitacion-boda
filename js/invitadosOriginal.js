document.getElementById("formulario").addEventListener("submit", function (e) {
  e.preventDefault(); // Prevenir el envío tradicional del formulario

  // Obtener el valor del campo 'nombre' y convertirlo a mayúsculas
  const nombreInput = document.getElementById("nombre");
  const nombre = nombreInput.value.toUpperCase(); // Convertir a mayúsculas

  // Crear un objeto FormData para enviar los datos
  const formData = new FormData();
  formData.append("nombre", nombre);

  // Enviar los datos al archivo invitados.php mediante Fetch API
  fetch("./php/invitados.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      // Mostrar la respuesta usando SweetAlert
      if (data.error) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: data.message,
        });
      } else {
        const detalles = data.detalles;
        let confirmacionHTML = `
                <h1>${detalles.nombre}</h1>
                <h3>Boletos:</h3>
                <h2>Adultos: ${detalles.adultos} </h2>
                <h2 id="campoNinos">Niños: ${detalles.niños} </h2>
                <h2>Mesa: ${detalles.mesa} </h2>
            `;

        // Verificar si ya ha confirmado
        if (data.confirmado) {
          Swal.fire({
            icon: "success",
            title: "Ya confirmaste",
            html: confirmacionHTML,
          });
          nombreInput.value = "";
        } else {
          // Mostrar formulario de confirmación si no ha confirmado
          Swal.fire({
            icon: "success",
            title: data.message,
            html:
              confirmacionHTML +
              `
                        <form class="formulario-boletos" id="formularioBoletos" method="POST">
                            <h2>Confirma tus boletos</h2>
                            <input type="hidden" id="nombre" name="nombre" value="${detalles.nombre}">
                            <input type="number" id="adultos" name="adultos" min="0" max="${detalles.adultos}" value="${detalles.adultos}">
                            <input type="number" id="niños" name="niños" min="0" max="${detalles.niños}" value="${detalles.niños}">
                            <input type="submit" id="confirmarBoletos" name="confirmarBoletos" value="Confirmar">
                        </form>
                    `,
            confirmButtonText: "Salir sin Confirmar...", // Aquí cambias el texto del botón
            didOpen: () => {
              // Ocultar el campo de niños si no tiene asignados
              if (detalles.niños == 0) {
                document.getElementById("campoNinos").style.display = "none";
                document.getElementById("niños").style.display = "none";
              }

              // Validar el formulario de boletos al enviarse
              document
                .getElementById("formularioBoletos")
                .addEventListener("submit", function (e) {
                  e.preventDefault(); // Prevenir el envío del formulario de boletos

                  const adultosIngresados = parseInt(
                    document.getElementById("adultos").value
                  );
                  const ninosIngresados = parseInt(
                    document.getElementById("niños").value
                  );

                  // Validar que no se seleccionen más boletos de los permitidos
                  if (
                    adultosIngresados > detalles.adultos ||
                    ninosIngresados > detalles.niños
                  ) {
                    Swal.fire({
                      icon: "error",
                      title: "Error",
                      text: "No puedes asignar más boletos de los disponibles.",
                    });
                  } else {
                    // Crear un objeto FormData para enviar los datos
                    const formDataBoletos = new FormData();
                    formDataBoletos.append(
                      "nombre",
                      document.getElementById("nombre").value.toUpperCase()
                    );
                    formDataBoletos.append("adultos", adultosIngresados);
                    formDataBoletos.append("niños", ninosIngresados);

                    // Enviar los datos al archivo invitadosUpdate.php mediante Fetch API
                    fetch("./php/invitadosUpdate.php", {
                      method: "POST",
                      body: formDataBoletos,
                    })
                      .then((response) => response.json())
                      .then((data) => {
                        if (data.error) {
                          Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: data.message,
                          });
                        } else {
                          Swal.fire({
                            icon: "success",
                            title: "Boletos Confirmados!",
                            text: "Los boletos han sido confirmados correctamente.",
                          });

                          // Limpiar el campo de entrada del nombre
                          nombreInput.value = "";
                        }
                      })
                      .catch((error) => {
                        console.error("Error:", error);
                        Swal.fire({
                          icon: "error",
                          title: "Error",
                          text: "Hubo un problema con la solicitud.",
                        });
                      });
                  }
                });
            },
          });
        }
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      // Mostrar alerta de error general
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Hubo un problema con la solicitud.",
      });
    });
});
