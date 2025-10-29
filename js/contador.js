function actualizarContador() {
  const ahora = new Date(); // Fecha y hora actuales
  const fechaObjetivo = new Date("2026-01-24T00:00:00"); // Fecha objetivo (en este caso, 31 de diciembre de 2024)
  const diferencia = fechaObjetivo - ahora; // Diferencia en milisegundos entre las fechas

  if (diferencia < 0) {
    // Si la fecha objetivo ya pasó, detenemos el contador
    clearInterval(intervalo);
    console.log("¡La fecha objetivo ha pasado!");
    return;
  }

  // Calcular días, horas, minutos y segundos restantes
  const dias = Math.floor(diferencia / (1000 * 60 * 60 * 24));
  const horas = Math.floor(
    (diferencia % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
  );
  const minutos = Math.floor((diferencia % (1000 * 60 * 60)) / (1000 * 60));
  const segundos = Math.floor((diferencia % (1000 * 60)) / 1000);

  // Mostrar el tiempo restante en la consola o en el DOM
  // console.log(`Tiempo restante: ${dias} días, ${horas} horas, ${minutos} minutos, ${segundos} segundos`);

  // mostrar en el DOM
  // document.getElementById(
  //   "contador"
  // ).textContent = `${dias} días ${horas} horas ${minutos} minutos ${segundos} segundos`;

  document.getElementById("dias").textContent = dias;
  document.getElementById("horas").textContent = horas;
  document.getElementById("minutos").textContent = minutos;
  document.getElementById("segundos").textContent = segundos;
}

// Llamar a la función inicialmente para evitar un retraso en la visualización
actualizarContador();

// Actualizar el contador cada segundo (1000 milisegundos)
const intervalo = setInterval(actualizarContador, 1000);
