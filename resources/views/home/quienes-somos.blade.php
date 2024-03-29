<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Quienes-somos</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        <!-- Styles -->
        <style>
        </style>

        <style>
            * {
    margin: 0;
    padding: 0;
}
body {
    background-image: linear-gradient(rgba(255, 255, 255, 0.911), rgba(255, 255, 255, 0.911)), url("/imagenes/fondo.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    overflow-x: hidden;
    margin: 0;
    padding: 0;
    height: 100vh;
}
/* ------------------------- */
/* Separador */
/* ------------------------- */
#banner {
    width: 100%;
    max-height: 670px;
    position: absolute;
    overflow: hidden;
    margin-top: -5px;
    z-index: 99;
    background: #fff;
    background-size: cover;
}
#banner img {
    width: 100%;
}
.texto-encima {
    position: absolute;
    top: 160px;
    left: 1000px;
}
.centrado {
    position: absolute;
    margin-right: 5%;
    top: 35%;
    left: 50%;
    color: rgb(255, 255, 255);
    font-size: 40px;
    -webkit-text-stroke: 1.3px rgb(0, 0, 0);
    font-family: 'Noto Serif', serif;
}
/*
MISION
*/
.mision {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 100%;
    left: 5%;
    color: rgb(0, 0, 0);
    font-size: 33px;
    -webkit-text-stroke: 1px rgba(249, 250, 198, 0.651);
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
.parrafo {
    position: absolute;
    left: 10%;
    right: 40%;
    font-family: 'Noto Serif', serif;
}
.donacionimagen {
    position: absolute;
    top: 1%;
    left: 70%;
}
/* FRASE*/
.imagendos {
    position: absolute;
    top: 130%;
    height: 27%;
    width: 100%;
}
.frase1 {
    position: absolute;
    margin-right: 5%;
    top: 140%;
    left: 30%;
    color: rgb(10, 1, 58);
    font-size: 40px;
    -webkit-text-stroke: 0.5px #fff;
    font-family: 'Noto Serif', serif;
}
/*VISION*/
.vision {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 160%;
    left: 5%;
    color: rgb(0, 0, 0);
    font-size: 33px;
    -webkit-text-stroke: 1px rgba(249, 250, 198, 0.651);
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
.parrafo2 {
    position: absolute;
    left: 10%;
    right: 40%;
    font-family: 'Noto Serif', serif;
}
.reparacionimagen {
    position: absolute;
    top: 1%;
    left: 70%;
}
/* FRASE 2*/
.imagentres {
    position: absolute;
    top: 195%;
    height: 27%;
    width: 100%;
}
.frase2 {
    position: absolute;
    margin-right: 5%;
    top: 205%;
    left: 35%;
    color: rgb(10, 1, 58);
    font-size: 40px;
    -webkit-text-stroke: 0.5px #fff;
    font-family: 'Noto Serif', serif;
}
/* Donar*/
.donar {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 235%;
    left: 5%;
    color: rgb(0, 0, 0);
    font-size: 33px;
    -webkit-text-stroke: 1px rgba(249, 250, 198, 0.651);
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
.parrafo3 {
    position: absolute;
    left: 17%;
    right: 40%;
    font-family: 'Noto Serif', serif;
}
.btn {
    background: #B061DF;
    top: 240%;
    left: 70%;
    position: absolute;
    color: #fff;
    display: inline-block;
    font-size: 1.25em;
    margin: 20px;
    padding: 10px 20px;
    text-align: center;
    width: 200px;
    text-decoration: none;
    box-shadow: 5px 3px 0pc #373c3c;
}
.btn:hover {
    box-shadow: 0px 0px 0px;
    padding-top: 7px
}
/*PIE DE PAGINA*/
footer {
    position: relative;
    top: 280%;
}
        </style>
    </head>
    <body>
        <!-- navigation bar -->
<nav class="bg-yellow-300 py-2 md:py-4">
    <div class="container px-4 mx-auto md:flex md:items-center">

      <div class="flex justify-between items-center">
        <img src="imagenes/logo_menu.png" alt="">
        <button class="border border-solid border-gray-600 px-3 py-1 rounded text-gray-600 opacity-50 hover:opacity-75 md:hidden" id="navbar-toggle">
          <i class="fas fa-bars"></i>
        </button>
      </div>

      <div class="hidden md:flex flex-col md:flex-row md:ml-auto mt-3 md:mt-0" id="navbar-collapse">
        <a href="{{url('/')}}" class="p-2 lg:px-4 md:mx-2 text-black rounded bg-yellow-200">Home</a>
        <a href="{{url('/home/quienes-somos')}}" class="p-2 lg:px-4 md:mx-2 text-black-600 rounded hover:bg-purple-400 hover:text-white transition-colors duration-300">¿Quienes Somos?</a>
        <a href="{{url('/home/quiero-computador')}}" class="p-2 lg:px-4 md:mx-2 text-black-600 rounded hover:bg-purple-400 hover:text-white transition-colors duration-300">Quiero un Computador</a>
        <a href="{{url('/home/ser-voluntario')}}" class="p-2 lg:px-4 md:mx-2 text-black-600 rounded hover:bg-purple-400 hover:text-white transition-colors duration-300">Ser Voluntario</a>
        <a href="{{url('/historia/visitante')}}" class="p-2 lg:px-4 md:mx-2 text-black-600 rounded hover:bg-purple-400 hover:text-white transition-colors duration-300">Historias</a>
        <a href="{{url('/charla/visitante')}}" class="p-2 lg:px-4 md:mx-2 text-black-600 rounded hover:bg-purple-400 hover:text-white transition-colors duration-300">Charlas</a>
        <a href="{{url('/login')}}" class="p-2 lg:px-4 md:mx-2 text-black-600 text-center border border-solid border-purple-500 rounded hover:bg-purple-500 hover:text-white transition-colors duration-300 mt-1 md:mt-0 md:ml-1">Login</a>
        <a href="{{url('/register')}}" class="p-2 lg:px-4 md:mx-2 text-black-600 text-center border border-solid border-purple-500 rounded hover:bg-purple-500 hover:text-white transition-colors duration-300 mt-1 md:mt-0 md:ml-1">Register</a>
      </div>
    </div>
  </nav>
  <!-- navigation bar  -->
    <section>

        <div id="banner">
            <img class="imagenuno" src="/imagenes/img1.png">


            <center>
                
                <div class="centrado">Bienvenido a nuestro sitio en este lugar podrás ayudar a la comunidad con tus donaciones o en caso de necesitar aquí te donaremos un equipo</div>
            </center>
        </div>
        <div class="mision">
            Misión
            <center>
                <p class="parrafo">Nuestra misión es dar una segunda oportunidad a equipos que las personas ya no utilizan para darles mantenimiento y donárselos a gente que lo necesite</p>
                <img class="donacionimagen" src="/imagenes/impulsan-donacion-de-equipos-electricos-imagen-1-_20200920101938-2000x2000.jpg" width="300" height="200">
            </center>

        </div>
        <div>
            <img class="imagendos" src="/imagenes/call-out-bg.jpg" >
            <div class="card">
                <div class="frase1">Una donación es un paso al progreso</div>
            </div>
        </div>

        <div class="vision">
            Visión
            <center>
                <p class="parrafo2">Nuestra visión es que los computadores o partes de equipos que unas personas no necesitan para nosotros con un poco de mantenimiento son útiles para otras</p>
                <img class="reparacionimagen" src="/imagenes/mantenimiento-y-reparacion-de-laptop-corporacionti.jpg" width="300" height="200">
            </center>

        </div>

        <div>
            <img class="imagentres" src="/imagenes/call-out-bg.jpg">
            <div class="card2">
                <div class="frase2">Cada donación es una ayuda</div>
            </div>
        </div>

        <div class="donar">
            ! QUIERO DONAR¡
            <center>
                <p class="parrafo3">Para donar da clic en el siguiente botón que te dirigirá a una pestaña para donar gracias por donar y visítanos pronto</p>

            </center>

        </div>
        <a href="{{url('/register')}}" class="btn">
        Donar ahora
    </a>

    </section>
   <!-- FOOTER -->

   <footer class="bg-black py-2 md:py-4">
  <div class="text-center container mx-auto px-4">
    <div class="sm:center sm:flex-wrap sm:-mx-4 md:py-4">
      <div class="px-4 ">
        <h5 class="text-xl text-gray-400 font-bold mb-6">PARTICIPA CON NOSOTROS</h5>
        <ul class="list-none footer-links">
          <li class="mb-2">
            <a href="#" class=" text-gray-400 border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Dirección: Ambato y Garcia Moreno, Campus IST YAVIRAC</a>
          </li>
          <li class="mb-2">
            <a href="#" class=" text-gray-400 border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Teléfono : (593) 999 705 620</a>
          </li>
          <li class="mb-2">
            <a href="#" class=" text-gray-400 border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Email : probayo@yavirac.edu.ec</a>
          </li>
          <li class="mb-2">
            <a href="http://yavirac.edu.ec/" class="text-gray-400 border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">ITS YAVIRAC</a>
          </li>

        </ul>
      </div>


      </nav>
      <div class="flex justify-center mt-8 space-x-6">
            <a href="https://www.facebook.com/profile.php?id=100068516903329" class="text-blue-600 hover:text-yellow-500">
                <span class="sr-only">Facebook</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                </svg>
            </a>
            <a href="https://www.instagram.com/nurtech_project/" class="text-purple-400 hover:text-yellow-500">
                <span class="sr-only">Instagram</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                </svg>
            </a>
            <a href="https://twitter.com/nurtech_project?lang=es" class="text-blue-400 hover:text-yellow-500">
                <span class="sr-only">Twitter</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                </svg>
            </a>

            <a href="https://www.youtube.com/channel/UCfqxcWb8HtyS45iCdJYz1eA" class="text-red-600 hover:text-yellow-500">
                <span class="sr-only">YouTube</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M19.05,8.362c0,-0.062 0,-0.125 -0.063,-0.187l0,-0.063c-0.187,-0.562
                     -0.687,-0.937 -1.312,-0.937l0.125,0c0,0 -2.438,-0.375 -5.75,-0.375c-3.25,0
                     -5.75,0.375 -5.75,0.375l0.125,0c-0.625,0 -1.125,0.375
                     -1.313,0.937l0,0.063c0,0.062 0,0.125 -0.062,0.187c-0.063,0.625 -0.25,1.938
                     -0.25,3.438c0,1.5 0.187,2.812 0.25,3.437c0,0.063 0,0.125
                     0.062,0.188l0,0.062c0.188,0.563 0.688,0.938 1.313,0.938l-0.125,0c0,0
                     2.437,0.375 5.75,0.375c3.25,0 5.75,-0.375 5.75,-0.375l-0.125,0c0.625,0
                     1.125,-0.375 1.312,-0.938l0,-0.062c0,-0.063 0,-0.125
                     0.063,-0.188c0.062,-0.625 0.25,-1.937 0.25,-3.437c0,-1.5 -0.125,-2.813
                     -0.25,-3.438Zm-4.634,3.927l-3.201,2.315c-0.068,0.068 -0.137,0.068
                     -0.205,0.068c-0.068,0 -0.136,0 -0.204,-0.068c-0.136,-0.068 -0.204,-0.204
                     -0.204,-0.34l0,-4.631c0,-0.136 0.068,-0.273 0.204,-0.341c0.136,-0.068
                     0.272,-0.068 0.409,0l3.201,2.316c0.068,0.068 0.136,0.204
                     0.136,0.34c0.068,0.136 0,0.273 -0.136,0.341Z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
        <p class="mt-8 text-base leading-6 text-center text-gray-400">
            © 2021 PROYECTO NUR TECH.
        </p>
    </div>
</section>

  </div>
</footer>

 <!-- FOOTER -->


</body>

</html>