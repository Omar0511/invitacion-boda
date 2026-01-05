<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nuestra Boda - Jim / Verónica</title>

  <!-- Ayuda a que cargue más rápido -->
  <link rel="prefetch" href="index.php" as="document" />
  <link rel="prefetch" href="/img" as="image" />

  <!-- La descripción debe tener un máximo de 165 carácteres -->
  <meta name="description" content="Invitación digital para nuestra boda..." />

  <!-- Ayuda a que el enlace sea oficial -->
  <!-- <link rel="canonical" href="https://nuestra-boda-omar-y-noemi.site" /> -->

  <!-- Agregar icono en el navegador, primero en DESKTOP y después en Móvil -->
  <link rel="icon" href="img/diamond.svg" />
  <link rel="apple-touch" href="img/diamond.svg" />

  <!-- Cambia el color de la barra de navegación en móvil -->
  <meta name="theme-color" content="#d1ada1" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap"
    rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap"
    rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

  <!-- Creación de una tarjeta para compartir -->
  <meta property="og:title" content="Nuestra Boda - Jim / Verónica" />
  <meta property="og:description" content="Invitación Digital " />
  <meta property="og:image" content="img/sesion12.jpeg" />
  <!-- <meta property="og:url" content="https://nuestra-boda-omar-y-noemi.site" /> -->
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="@JimYVero" />

  <!-- Cargar el CSS lo más rápido y mayor perfomance -->
  <link rel="preload" href="css/normalize.css" as="style" />
  <link rel="preload" href="css/styles.css" as="style" />

  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="css/normalize.css" />
</head>

<body>
  <header class="header contenedor sombra">
    <div class="imagen"></div>
  </header>

  <main class="contenedor-principal contenedor sombra">
    <h2>Faltan:</h2>

    <section class="fechas">
      <div class="contenedor-fechas">
        <div class="campo-fecha">
          <p id="dias"></p>
          <span>días</span>
        </div>

        <div class="campo-fecha">
          <p id="horas"></p>
          <span>horas</span>
        </div>

        <div class="campo-fecha">
          <p id="minutos"></p>
          <span>minutos</span>
        </div>

        <div class="campo-fecha">
          <p id="segundos"></p>
          <span>segundos</span>
        </div>
      </div>
    </section>

    <section class="contenedor-espera">
      <div class="contenedor-fecha-boda">
        <div class="campo-fecha-boda">
          <p>Sábado</p>
        </div>

        <div class="campo-fecha-boda">
          <p>24</p>
        </div>

        <div class="campo-fecha-boda">
          <p>Enero</p>
        </div>
      </div>
    </section>

    <section class="ceremonia">
      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#000000"
        stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
        <path d="M3 21l18 0" />
        <path d="M10 21v-4a2 2 0 0 1 4 0v4" />
        <path d="M10 5l4 0" />
        <path d="M12 3l0 5" />
        <path d="M6 21v-7m-2 2l8 -8l8 8m-2 -2v7" />
      </svg>

      <h4>Ceremonía</h4>

      <p>19:00 - <span>Templo del Santo Cura de Ars</span></p>

      <a href="https://www.google.com/maps/place/Monte+Aconcagua+1235,+Postes+Cuates,+44350+Guadalajara,+Jal./@20.6915753,-103.3208271,17z/data=!4m6!3m5!1s0x8428b1a27c80c20b:0x94d43b4d85e8a977!8m2!3d20.6917145!4d-103.3208555!16s%2Fg%2F11rp388myp?entry=ttu&g_ep=EgoyMDI1MTIwOS4wIKXMDSoASAFQAw%3D%3D"
        target="_blank">Como llegar</a>
    </section>

    <section class="fiesta">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
        <path
          d="M155.6 81.3C163 67 179.9 60.4 195 65.9L320 111.5L445 65.9C460.1 60.4 477 67 484.4 81.3L563.2 234.2C592 290 573.5 356.5 524.7 390.8L556 477L597 462C613.6 456 632 464.5 638 481.1C644 497.7 635.5 516.1 618.9 522.1C571.5 539.4 524.1 556.6 476.7 573.9C460.1 580 441.7 571.4 435.7 554.8C429.7 538.2 438.2 519.8 454.8 513.8L495.8 498.8L464.5 412.6C405.1 417.8 348.3 378.7 334.5 317.4L319.9 252.7L305.3 317.4C291.5 378.7 234.7 417.8 175.3 412.6L144 498.8L185 513.8C201.6 519.9 210.2 538.2 204.1 554.8C198 571.4 179.7 580 163.1 573.9C115.7 556.6 68.3 539.3 20.9 522.1C4.3 516-4.3 497.7 1.8 481.1C7.9 464.5 26.3 456 42.9 462L83.9 477L115.2 390.8C66.5 356.5 48.1 290 76.9 234.2L155.6 81.3zM199.6 135.7L172.4 188.5L261.6 221L274.7 163.1L199.6 135.7zM440.5 135.7L365.4 163.1L378.5 221L467.7 188.5L440.5 135.7z" />
      </svg>

      <h4>Fiesta</h4>

      <p>21:00 - <span>Salón Prehispanix</span></p>

      <a href="https://maps.app.goo.gl/JTgqAsWQrVX5CF3b9?g_st=aw" target="_blank">Como llegar</a>
    </section>
  </main>

  <section class="contenedor sombra contenedor-confirma">
    <div class="lugar">
      <h3>20:00 Hs</h3>

      <p>Confirma tu asistencia</p>

      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
        <!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
        <path
          d="M248 320L248 138.2C223.5 158.7 208 189.6 208 224L208 320L248 320zM296 320L344 320L344 114.6C336.3 112.9 328.2 112 320 112C311.8 112 303.7 112.9 296 114.6L296 320zM392 138.2L392 320L432 320L432 224C432 189.6 416.5 158.8 392 138.2zM128 320L160 320L160 224C160 135.6 231.6 64 320 64C408.4 64 480 135.6 480 224L480 320L512 320C529.7 320 544 334.3 544 352L544 416C544 433.7 529.7 448 512 448L512 544C512 561.7 497.7 576 480 576C462.3 576 448 561.7 448 544L448 448L192 448L192 544C192 561.7 177.7 576 160 576C142.3 576 128 561.7 128 544L128 448C110.3 448 96 433.7 96 416L96 352C96 334.3 110.3 320 128 320z" />
      </svg>
    </div>
  </section>

  <script src="js/contador.js"></script>
</body>

</html>