<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Ser Voluntario </title>
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
                <a href="{{url('/login')}}" class="p-2 lg:px-4 md:mx-2 text-black-600 text-center border border-solid border-purple-500 rounded hover:bg-purple-500 hover:text-white transition-colors duration-300 mt-1 md:mt-0 md:ml-1">Login</a>
                <a href="{{url('/register')}}" class="p-2 lg:px-4 md:mx-2 text-black-600 text-center border border-solid border-purple-500 rounded hover:bg-purple-500 hover:text-white transition-colors duration-300 mt-1 md:mt-0 md:ml-1">Register</a>
              </div>
            </div>
          </nav>
          <!-- navigation bar  -->
        
        
        <!-- Encabezado -->
            <div class="bg-purple-700 mt-12 lg:flex">
                <div class="flex-1">
                    <div>
                    <br>
                    <br>
                    <h1 class="ml-56 text-black text-6xl text-center">NUR-TECH</h1>
                    </div>
                  
                    <div class="flex-1">
                        <br>
                        <h1 class="ml-56 text-white text-2xl md:text-center">
                    Es un proyecto que tiene como objetivo entregar 
                    computadores refaccionados a estudiantes de Institutos
                    Tecnológicos Superiores de Quito y sus familias que 
                    al momento no disponen de equipos propios. 
                        </h1><br>
                    </div>
                </div>
                <div class="flex-1" >
                   <img src="../imagenes/Imagen1.jpg" alt="" width="450" class="ml-44 pt-7 pb-7">
                </div>
            </div>
          <!-- Encabezado -->
        
        <!-- Voluntarios -->
        <br>
        <br>
        <section class="h-50">
            <div class=" text-center text-3xl py-12 bg-cover bg-center  h-auto text-black px-10 object-fill" >
              <b><h2>VOLUNTARIOS DENTRO DE NUR TECH</h2></b>
          </div>
        </section>
        <!-- Voluntarios -->
        
        <!-- Sección Colaboradores -->

<section class="container px-6 py-4 mx-auto">
    <div class="grid gap-6 mb-8 md:grid-cols-1 lg:grid-cols-2">
      <!-- Card 1 -->
      <div class="flex items-center p-4 bg-yellow-400 rounded-lg shadow-sm dark:bg-gray-800">
          <img alt="mountain" class="w-32 rounded-md " src="../imagenes/Avatar.png" />
           <div id="body" class="flex flex-col ml-5">
              <h4 id="name" class="text-xl font-semibold mb-2">Juan Cruz</h4>
              <p id="job" class="text-gray-800 mt-2">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
           </div>
      </div>
      <!-- Card 2 -->
      <div class="flex items-center p-4 bg-gray-300  rounded-lg shadow-sm dark:bg-gray-800">
             <img alt="mountain" class="w-32 rounded-md " src="../imagenes/Avatar.png" />
           <div id="body" class="flex flex-col ml-5">
              <h4 id="name" class="text-xl font-semibold mb-2">Juan Cruz</h4>
              <p id="job" class="text-gray-800 mt-2">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
           </div>
      </div>
      <!-- Card 3 -->
      <div class="flex items-center p-4 bg-red-200  rounded-lg shadow-sm dark:bg-gray-800">
              <img alt="mountain" class="w-32 rounded-md " src="../imagenes/Avatar.png" />
           <div id="body" class="flex flex-col ml-5">
              <h4 id="name" class="text-xl font-semibold mb-2">Juan Cruz</h4>
              <p id="job" class="text-gray-800 mt-2">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
           </div>
      </div>
      <!-- Card 4 -->
      <div class="flex items-center p-4 bg-yellow-200  rounded-lg shadow-sm dark:bg-gray-800">
         <img alt="mountain" class="w-32 rounded-md " src="../imagenes/Avatar.png" />
           <div id="body" class="flex flex-col ml-5">
              <h4 id="name" class="text-xl font-semibold mb-2">Juan Cruz</h4>
              <p id="job" class="text-gray-800 mt-2">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
           </div>
      </div>
    </div>
  </section>
    <!-- Sección Colaboradores -->
        
        
        <!--Quiero ser Voluntario -->

        <div class="w-full bg-cover bg-center" style="height:32rem; background-image: url(https://p4.wallpaperbetter.com/wallpaper/324/285/270/polygonal-triangles-shades-yellow-wallpaper-preview.jpg);">
            <div class="flex items-center justify-center h-full w-full ">
                <div class="text-center">
                    <h1 class="text-black text-4xl font-semibold uppercase pb-20">¡QUIERO SER VOLUNTARIO! </h1>
                    <p class="text-2xl pb-10">Para ser voluntario y formar parte de este gran proyecto de apoyo para jovenes estudiantes 
                        solamente hace falta tener voluntad de ayudar y comunicarte con nosostros a traves del 
                        siguiente formulario al cual podras acceder de forma inmediata pulsando el botón de inscripción que se encuentra en la parte inferior.</p>
                   <a href="{{url('/register')}}"><button class="mt-4 px-10 py-5 bg-purple-600 text-white text-sm uppercase font-medium rounded hover:bg-red-600">Inscripción</button></a>
                </div>
            </div>
        </div>

        <!--Quiero ser Voluntario -->
    
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
          </div>
        </footer>
        
        
</body>
</html>