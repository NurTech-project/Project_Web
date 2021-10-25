<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    
       
    <div id="whoobe-1yakq" class="bg-white text-base w-5/6 md:w-1/2 lg:w-1/3 rounded-lg shadow m-auto -brown-400 border border-t-8 border-b-8 border-black mt-20 flex flex-col">
        <div id="whoobe-pa28x" class="p-4 flex flex-col">
            <h3 type="element" class="text-4xl text-center" id="whoobe-ozjao">Codigo de Verificacion <strong>NUR TECH</strong></h3>
            <p type="element" class="my-4" id="whoobe-dvhrz">Por favor confirma el codigo que se envio a tu correo electronico.Para ello simplemente debes colocar tu correo y el codigo aqui:</p>
            
         <form action="{{route('verify')}}" method="POST">
        @csrf 
        @method ('POST')
        <br><hr>
            <div type="hidden" class="mt-4" id="whoobe-avqbm" name="confirmed"> Email</div>
            <input  type="text" class="p-1 w-full border-gray-200"  placeholder="Tu email aquí" name="email">
            <br><hr>
            <div  class="mt-4" id="whoobe-avqbm">Código</div>
            <input type="text"  class="p-1 w-full border-gray-200" placeholder="Tu código aquí" name="confirmation_code">
            <br><hr>    <br><br>
            <button type="submit" class="bg-yellow-300 p-2 lg:px-4 md:mx-2 text-black-600 rounded hover:bg-purple-400 hover:text-white transition-colors duration-300" id="whoobe-wkfvm">Confirmar</button>
            @if(Session::has('mensaje'))
            {{Session::get('mensaje')}}
            @endif
        </div>
    </div>
    </form>
       
    
</body>
</html>