
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charlas</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
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
  <div class="bg-purple-700 h-72 mt-12 flex">
        <div class="flex-1">
            <div>
            <br>
            <br>
            <h1 class="ml-56 text-white text-4xl">Nur-Tech</h1>
            </div>
            <div class="border-b-4 border-yellow-400 mt-4 mb-4 ml-56 mr-80">

            </div>
            <div class="flex-1">
                <h1 class="ml-56 text-white">
                        El proyecto es gestionado por un grupo de voluntarios que son
                        docentes del IST Benito Juárez y activistas locales con el objetivo de dar una mejor experiencia 
                        hemos recolectado historias que te motivaran a seguirnos y participar con nosotros
                </h1><br>
            </div>
        </div>
        <div class="flex-1">
           <img src="../imagenes/historias.jpg" alt="" width="450" class="ml-44 pt-4 pb-4">
        </div>
    </div>
<!-- component -->
<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
        <div class="w-full text-center pb-8">
            <svg class="mx-auto" width="48" height="42" viewBox="0 0 48 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.6153 19.154H10.1537C9.38437 19.154 8.73037 18.8849 8.19185 18.3463C7.65363 17.8078 7.38417 17.154 7.38417 16.3845V15.4619C7.38417 13.4233 8.10546 11.6831 9.54795 10.2406C10.9903 8.79859 12.7309 8.0773 14.7693 8.0773H16.6153C17.1152 8.0773 17.5477 7.89453 17.9133 7.52929C18.2786 7.16384 18.4613 6.73131 18.4613 6.23128V2.53864C18.4613 2.03872 18.2785 1.60578 17.9133 1.24034C17.5478 0.875398 17.1153 0.692322 16.6153 0.692322H14.7693C12.7691 0.692322 10.8608 1.08212 9.04327 1.86059C7.22595 2.63958 5.65404 3.69257 4.32694 5.01967C2.99994 6.34616 1.94726 7.91817 1.16837 9.7357C0.389491 11.553 0 13.4618 0 15.4618V35.769C0 37.3083 0.538216 38.6152 1.61515 39.6926C2.69219 40.7693 4.00019 41.3076 5.53856 41.3076H16.616C18.1542 41.3076 19.4618 40.7693 20.539 39.6926C21.6157 38.6152 22.1542 37.3083 22.1542 35.769V24.6926C22.1542 23.1536 21.6157 21.8466 20.5383 20.7692C19.4616 19.6925 18.1535 19.154 16.6153 19.154Z" fill="#2865E9"/>
                <path d="M46.3856 20.7692C45.309 19.6925 44.0013 19.154 42.4626 19.154H36.0011C35.2322 19.154 34.5776 18.8849 34.04 18.3463C33.5012 17.8078 33.2323 17.154 33.2323 16.3845V15.4619C33.2323 13.4233 33.9536 11.6831 35.3954 10.2406C36.8372 8.79859 38.5777 8.0773 40.6171 8.0773H42.4627C42.9627 8.0773 43.3955 7.89453 43.7608 7.52929C44.1258 7.16384 44.3092 6.73131 44.3092 6.23128V2.53864C44.3092 2.03872 44.1259 1.60578 43.7608 1.24034C43.3956 0.875398 42.9628 0.692322 42.4627 0.692322H40.6171C38.6158 0.692322 36.7079 1.08212 34.8899 1.86059C33.0729 2.63958 31.5015 3.69257 30.1744 5.01967C28.8473 6.34616 27.7941 7.91817 27.0155 9.7357C26.2368 11.553 25.8468 13.4618 25.8468 15.4618V35.769C25.8468 37.3083 26.3855 38.6152 27.4622 39.6926C28.5389 40.7693 29.8466 41.3076 31.3852 41.3076H42.462C44.0006 41.3076 45.3082 40.7693 46.3849 39.6926C47.4623 38.6152 47.9999 37.3083 47.9999 35.769V24.6926C48 23.1535 47.4623 21.8466 46.3856 20.7692Z" fill="#2865E9"/>
            </svg>
        
            <h1 class="font-bold text-3xl md:text-4xl lg:text-5xl font-heading text-gray-900 pb-2">
                Charlas
            </h1>
        </div>
        <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-6 ">
        @foreach($charlas as $charla)
            <div class="bg-white rounded-lg p-6 shadow-lg">
                
                <div class="flex items-center space-x-6 mb-4 ">
                <iframe width="560" height="315" src="{{$charla->link_video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div>
                    <p class="text-black-400 leading-loose font-normal text-base text-justify">{{$charla->descripcion}}</p>
                </div>
               
            </div>
            @endforeach
            </div>
        </div>
    </section>

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