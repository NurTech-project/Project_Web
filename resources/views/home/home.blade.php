<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link class=" content-center bg-purple-500 py-4 px-64 font-serif uppercase text-sm rounded hover:bg-gray-200 hover:text-gray-800" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
      <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <title>views</title>
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
        <a href="{{url('/')}}" class="p-2 lg:px-4 md:mx-2 text-black rounded bg-yellow-400">Home</a>
        <a href="{{url('/home/quiero-computador')}}" class="p-2 lg:px-4 md:mx-2 text-black-600 rounded hover:bg-green-200 hover:text-black-700 transition-colors duration-300">El proyecto</a>
        <a href="{{url('/home/ser-voluntario')}}" class="p-2 lg:px-4 md:mx-2 text-black-600 rounded hover:bg-green-200 hover:text-black-700 transition-colors duration-300">Como ayudar</a>
        <a href="{{url('/home/quiero-computador')}}" class="p-2 lg:px-4 md:mx-2 text-black-600 rounded hover:bg-green-200 hover:text-black-700 transition-colors duration-300">Voluntarios</a>
        <a href="#" class="p-2 lg:px-4 md:mx-2 text-yellow-600 text-center border border-solid border-yellow-600 rounded hover:bg-black hover:text-yellow transition-colors duration-300 mt-1 md:mt-0 md:ml-1">Donar Ahora</a>
        <a href="#" class="p-2 lg:px-4 md:mx-2 text-yellow-600 text-center border border-solid border-yellow-600 rounded hover:bg-black hover:text-yellow transition-colors duration-300 mt-1 md:mt-0 md:ml-1">Donar Ahora</a>
      </div>
    </div>
  </nav>
  <!-- navigation bar ends here -->


  <br><br>
    <div class="lg-flex bg-cover bg-center  h-auto text-black py-36 px-10 object-fill" style="background-image: url(http://nur.yavirac.edu.ec/images/slide_4.png)">

      <div class="md:w-1/2">
       <p class="text-8xl font-serif text-center">NUR-TECH</p><br>
       <p class="text-2xl font-serif mb-10 leading-none text-center">DONANDO TU <b>COMPUTADORA</b> <br>
        AYUDARAS A UN ESTUDIANTE<br>
        MAS, A CONTINUAR <br>
        CON SUS ESTUDIOS <br>
       </p>
       <br><br>
        <b>
          <a class=" content-center bg-purple-500 py-4 px-64 font-serif uppercase text-sm rounded hover:bg-gray-200 hover:text-gray-800" href="{{ url('/register') }}" class=" content-center bg-purple-500 py-4 px-64 font-serif uppercase text-sm rounded hover:bg-gray-200 hover:text-gray-800">Donar Ahora</a>  
        </b>       
      </div>  
    </div>
    
        <section class="how-can-help what-we container">
            <ul class="lg:flex space-x-4">
              
              <li class="p-32 w-75 font-serif"> <span class="text-6xl "><b>¿QUÉ</b> 
                <br>
                <small>ES NUR TECH?</small></span>
                <hr>
                <br>
                <p >A causa del COVID 19, con el objetivo de precautelar la salud de estudiantes y docentes, las autoridades determinaron el cambio de modalidad educativa de 
                  presencial a virtual.  En consecuencia, muchas familias se enfrentaron a esta nueva situación no siempre contando con computadores en sus hogares.  </p>
                  
                <p><strong>NUR TECH </strong> es un proyecto que tiene como objetivo entregar computadores refaccionados a estudiantes de Institutos Tecnológicos Superiores de Quito y sus 
                  familias que al momento no disponen de equipos propios.</p> 
                
                <p>El proyecto es gestionado por un grupo de voluntarios que son docentes del IST Benito Juárez y activistas locales. </p>
                  <p>
                  Nuestro proceso tiene tres pasos: <strong>recolectar,acondicionar y entregar</strong>.  En el primer paso nos ponemos en contacto con las personas que desean donar equipos,
                  y se define una cita para recolectar el equipo a domicilio; como segundo paso todos los equipos son acondicionados:  se borran sus discos duros, se revisan los componentes, 
                  se cambian partes y piezas si hace falta.  Finalmente se hace la entrega del computador refaccionado en el domicilio del estudiante.</p>
                
                
              </li>
              
                <li> <img src="imagenes/dona.jpg" class="lg:flex  py-56 max-w-lg center " ></li>

            </ul>
        </section>
      
    
    
        <section class="h-50">
            <div class="font-serif text-center text-3xl py-12 bg-cover bg-center  h-auto text-black px-10 object-fill" style="background-image: url(https://www.ppt-backgrounds.net/thumbs/yellow-geometric-low-poly-graphic-presentation-backgrounds.jpg)" >
              <h2><strong>Buscamos</strong></h2><br>
              <h2>Computadores usados <b>o</b> partes y piezas </h2>
          </div>

        </section>
    
        
    <section class=" how-can-help">
      <div class="container font-serif">
        <ul class="lg:flex">
          <li class="p-32 "> <span class="text-6xl">¿Cómo <br><small>puedo ayudar?</small></span>
            <hr>
            <br>
            <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de 
              relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) 
              desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.</p>           
               <br>
              <button class="bg-transparent hover:bg-purple-700 text-black py-2 px-4 border hover:text-white border-purple-700 hover:border-transparent rounded">Quiero Participar</button>           
           
                 
          <li class=" p-20">
            <ul class="help-fea">
              <br>
              <li ><img src="imagenes\a.png" class="h-10 "> Dona un computador</li><br>
              <li ><img src="imagenes\b.png" class="h-10 "> Dona partes y piezas</li><br>
              <li ><img src="imagenes\c.png" class="h-10 "> Promueve el proyecto en tus redes</li> <br>         
              <li ><img src="imagenes\d.png" class="h-10 "> Hazte voluntario</li>              
            </ul>
          </li> 
          
        </ul>
      </div>
    </section>


    

    <section class="h-50 font-serif">
      <div class=" bg-purple-700 text-center text-3xl text-white py-12 ">
        <h2>La educación es uno de los factores que más influye en el avance <br>
          y progreso de personas y sociedades</h2>
        
        
    </div>
  </section>


  <div class="p-16 font-serif text-center"> <span class="text-6xl">¿Cómo funciona?</span>
    <hr>
  </div>
    <ul class="lg:flex  p-10 font-serif text-aling">       
        <li> <img src="imagenes\b.png" class="h-20 w-70" >
          <b><h4>Recolectar</h4></b>
          <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de 
            relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) 
            desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.</p>
          
        
        <li> <img src="imagenes\acondicionar.jpg" class="h-20 w-70" >
          <b><h4>Acondicionar</h4></b>
          <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de 
            relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) 
            desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.</p>
          
        
        
        <li> <img src="imagenes\entregar.jpg" class="h-20 w-70" >
          <b><h4>Entregar</h4></b>
          <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de 
            relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) 
            desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.</p>
         </li>
      </ul>
  
      <br><br>  

      

          <section class="h-50 font-serif">
            <div class=" text-center text-3xl py-12 bg-cover bg-center  h-auto text-black px-10 object-fill" style="background-image: url(https://www.ppt-backgrounds.net/thumbs/yellow-geometric-low-poly-graphic-presentation-backgrounds.jpg)" >
              <h1>10</h1>
              <h2>Estamos muy orgullosos de nuestros Amables<strong>Dontantes</strong></h2>
          </div>
        </section>
          
          <br><br>

          <div class="container">
            <center>
              <div>
                <img class="h-auto" src="/imagenes/donaciones.png" alt="" > 
              </div>
            </center>
          </div>
          <br>
          <hr>
          <br>
        <ul class="lg:flex p-10 font-serif">      

          <li class="p-10 w-auto "> <span class="text-4xl "><b>¡QUIERO</b> 
                <br>
                <small>DONAR!</small></span>
                
                <br>
          </li>

          
          <li class="text-center "> 
            <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de 
              relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) 
              desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen.</p>
          </li>
          
          
          <li>
            <br><br>
            <button class="bg-transparent hover:bg-purple-700 text-black border-2 hover:text-white border-purple-700 hover:border-transparent font-serif py-2 px-24 rounded "  > <a class=" content-center bg-purple-500 py-4 px-64 font-serif uppercase text-sm rounded hover:bg-gray-200 hover:text-gray-800" href="{{ url('/register') }}"> DONAR UN COMPUTADOR</a></button>
          </li>

          

        </ul>
        <!-- FOOTER -->
        
        <footer class="bg-green-400 py-2 md:py-4">
  <div class="container mx-auto px-4">
    <div class="sm:flex sm:flex-wrap sm:-mx-4 md:py-4">
      <div class="px-4 sm:w-1/2 md:w-1/4 xl:w-1/6">
        <h5 class="text-xl font-bold mb-6">PARTICIPA CON NOSOTROS</h5>
        <ul class="list-none footer-links">
          <li class="mb-2">
            <a href="#" class=" border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Dirección: Ambato y Garcia Moreno, Campus IST YAVIRAC</a>
          </li>
          <li class="mb-2">
            <a href="#" class=" border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Teléfono : (593) 999 705 620</a>
          </li>
          <li class="mb-2">
            <a href="#" class=" border-solid border-transparent hover:border-purple-800 hover:text-purple-800">Email : probayo@yavirac.edu.ec</a>
          </li>
        </ul>
      </div>
      <div class="px-4 sm:w-1/2 md:w-1/4 xl:w-1/6 mt-8 sm:mt-0">
        <h5 class="text-xl font-bold mb-6">LINKS DE INTERES</h5>
        <ul class="list-none footer-links">
          <li class="mb-2">
            <a href="http://yavirac.edu.ec/" class="border-b border-solid border-transparent hover:border-purple-800 hover:text-purple-800">ITS YAVIRAC</a>
          </li>
        </ul>
      </div>
      
      <div class="px-4 mt-4 sm:w-1/3 xl:w-1/6 sm:mx-auto xl:mt-0 xl:ml-auto">
        <h5 class="text-xl font-bold mb-6 sm:text-center xl:text-left">Stay connected</h5>
        <div class="flex sm:justify-center xl:justify-start">
          <a href="https://www.facebook.com/profile.php?id=100068516903329" class="w-8 h-8 border border-2 border-gray-400 rounded-full text-center py-1 text-gray-600 hover:text-white hover:bg-blue-600 hover:border-blue-600">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="https://twitter.com/nurtech_project?lang=es" class="w-8 h-8 border border-2 border-gray-400 rounded-full text-center py-1 ml-2 text-gray-600 hover:text-white hover:bg-blue-400 hover:border-blue-400">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="https://www.instagram.com/nurtech_project/" class="w-8 h-8 border border-2 border-gray-400 rounded-full text-center py-1 ml-2 text-gray-600 hover:text-white hover:bg-red-600 hover:border-red-600">
            <i class="fab fa-discord"></i>
          </a>
        </div>
      </div>
    </div>

    
  </div>
</footer>
       
 <!-- FOOTER -->
    
    </body>

</html>