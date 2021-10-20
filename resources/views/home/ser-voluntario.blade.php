<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../public/css/style.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <title>Nur Tech</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
    </style>

    <style>

        body {
            font-family: 'Nunito', sans-serif;
        }

        /* Encabezado */
        .encabezado {
            background-color: rgb(153, 50, 204) ;
            text-align: left;
            margin-left: 2%;
            text-size-adjust: 15%;
            box-shadow: black;
            flex-wrap: nowrap;
            height:250px;
            width:1300px;
            border-radius: 1%;
        }

        .encabezado h1 {
           font-family: 'Nunito', sans-serif;
           color:rgb(0, 0, 0);
           font-size: 300%;
           text-decoration-style: white;
           position:relative;
           left:50px;
        }

        .encabezado p {
          font-family: 'Nunito', sans-serif;
          color: whitesmoke;
          text-align: left;
          margin-left: 5em;
          text-decoration: black;
          position: relative;
          bottom: 40px;
        }

        .encabezado img {
            position: relative;
            left: 970px;
            bottom: 220px;
            width: 245px;
            height: 225px;
            border-radius: 5px;
        }
        
        /* Titulo Encabezado */

        .titulo-voluntarios h1 {
            position: relative;
            font-family: 'Nunito', sans-serif;
            left:420px;
            font-size: 30px;
        }

        /* Cuadros de Colaboradores */

        .voluntario-1 {
            position: relative;
            margin-left: 2%;
            width: 650px;
            height: 320px;
            box-shadow: black;
            background-color: rgb(218, 165, 32);
        }

       .voluntario-1 img {
           position: relative;
           width: 30%;
           left: 20px;
           top:  55px;
        }

       .voluntario-1 h2 {
           font-family: 'Nunito', sans-serif;
           font-size:200%;
           position: relative;
           bottom: 180px;
           left: 300px;
           color: rgb(75, 0, 130);
      }

      .voluntario-1 p {
          font-size: 100%;
          color: rgb(75, 0, 130);
          text-align: justify;
          position:relative;
          left:230px;
          bottom: 190px;
      }

      .voluntario-2 {
            position: relative;
            left:653px;
            bottom:320px;
            margin-left: 2%;
            width: 650px;
            height: 320px;
            box-shadow: black;
            background-color: rgb(128, 128, 128);
      }
       .voluntario-2 img {
           position: relative;
           width: 30%;
           left: 20px;
           top:  55px;
      }

       .voluntario-2 h2 {
           font-family: 'Nunito', sans-serif;
           font-size:200%;
           position: relative;
           bottom: 175px;
           left: 300px;
           color: white;
      }

      .voluntario-2 p {
          font-size: 100%;
          color: white;
          text-align: justify;
          position:relative;
          left:230px;
          bottom: 190px;
      }

     .voluntario-3 {
        position: relative;
        margin-left: 2%;
         width: 650px;
        height: 320px;
        box-shadow: black;
        bottom: 310px;
        background-color: rgb(218, 112, 214);
     }

    .voluntario-3 img {
        position: relative;
        width: 30%;
        left: 20px;
        top:  55px;
     }

    .voluntario-3 h2 {
         font-family: 'Nunito', sans-serif;
         font-size:200%;
         position: relative;
         bottom: 175px;
         left: 300px;
         color: rgb(25, 25, 112);
     }

    .voluntario-3 p {
         font-size: 100%;
         color: rgb(25, 25, 112);
         text-align: justify;
         position:relative;
         left:230px;
         bottom: 190px;
     }

     .voluntario-4 {
         position: relative;
         left:653px;
         bottom:630px;
         margin-left: 2%;
         width: 650px;
         height: 320px;
         box-shadow: black;
         background-color: rgb(255, 215, 0);
     }

     .voluntario-4 img {
         position: relative;
         width: 30%;
         left: 20px;
         top:  55px;

     }
     
    .voluntario-4 h2 {
         font-family: 'Nunito', sans-serif;
         font-size:200%;
         position: relative;
         bottom: 175px;
         left: 300px;
         color: rgb(138, 43, 226);
     }

    .voluntario-4 p {
        font-size: 100%;
        color: rgb(138, 43, 226);
        text-align: justify;
        position:relative;
        left:230px;
        bottom: 190px;
     }

  /*Imagen de Fondo */

    .imagen-fondo{
        position: relative;
        bottom: 590px;
        margin-left: 2%;
        width:1000em;
        height:100%;
        left:200px;
     }

  /*Quiero un voluntario */

    .quiero-voluntario h1{
        position: relative;
        font-family: 'Nunito', sans-serif;
        left:510px;
        bottom: 1050px;
        font-size: 30px;
        color:rgb(0, 0, 0);

     }

    .quiero-voluntario p{
       font-size: 125%;
       text-align: left;
       position:relative;
       bottom: 1030px;
       left:280px;
       color:rgb(0, 0, 0);
     }

    .quiero-voluntario button {
      position: relative;
      font-size: 100%;
      left:635px;
      bottom: 1000px;
      padding:0.99%;
    }
    </style>
</head>

<body>
    
<!-- Encabezado -->
<section>
    

    <div class="encabezado">

            <h1>NUR TECH </h1>
            <p> NUR TECH es un proyecto que tiene como objetivo
                entregar computadores refaccionados a estudiantes de Institutos </p>
            <p> Tecnológicos Superiores de Quito y sus familias que al momento no disponen de equipos propios
                ,tu puedes </p>
            <p> ayudar a esta causa uniendote a nosotros como voluntario, donando equipos o piezas que no utilizes. </p>
            <img src="../imagenes/Imagen1.jpg" alt="">
    </div>
</section>

<!-- Voluntarios -->
<section>
    <div class="titulo-voluntarios">
    <h1> VOLUNTARIOS DENTRO DE NUR TECH </h1>
    </div>
</section>


<!-- Sección Colaboradores -->
<section class="voluntario-1">
   <table>
      <img src="../imagenes/Avatar.png" alt="">
       <h2> Paco Alcacer </h2>
        <b> <p> Donante recurrente,colaborador de la institución ayuda<br> 
        constantemente en lo que puede , dono diez equipos <br>
        completamente funcionales, y a armar con piezas otras <br> 
        maquinas que se encontraban en mal estado. </p></b>
   </table>
</section>

<section class="voluntario-2">
   <table>
     <img src="../imagenes/Avatar.png" alt="">
     <h2> Luis Mendoza </h2>
     <b> <p> Gerente de la empresa Innovando es un gran <br>
     colaborador aporto al proyecto un gran número de <br> 
     partes y equipos para donar. </p> </b>
  </table>
</section>
    
<section class="voluntario-3">
           <table>
               <img src="../imagenes/Avatar.png" alt="">
               <h2> Gonzalo Gallo </h2>
               <b> <p> Administrador encargado de almacenar los equipos <br>
               que llegan a nuestras manos, posteriormente procede <br>
               a asignar el computador a un Técnico para su revision. </p> </b>
           </table>
</section>

<section class="voluntario-4">
     <table>
        <img src="../imagenes/Avatar.png" alt="">
         <h2> Javier Hernandez </h2>
         <b><p> Dueño de Incorporer.Inc ayudo en la distribucion de <br>
         mas de cien equipos de segunda mano para su futuro <br>
         reacondicionamiento y reparación. </p></b>
     </table>
</section>

<!--Imagen de Fondo -->
<section>
 <div class="imagen-fondo">
 <img src="../imagenes/background.jpg" alt="">
 </div>
</section>

<section>
<div class="quiero-voluntario">
  <table>
     <b> <h1> ¡QUIERO SER VOLUNTARIO!</h1></b>
        <b><p>Para ser voluntario y formar parte de este gran proyecto de apoyo para jovenes estudiantes <br>
         solamente hace falta tener voluntad de ayudar y comunicarte con nosostros a traves del <br>
         siguiente formulario al cual podras acceder de forma inmediata pulsando el botón de inscripción <br> 
         que se encuentra en la parte inferior. </p> </br>
        
         <button > Inscripción </button>
</div> 
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