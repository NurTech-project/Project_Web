<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </x-slot>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Rol -->
                <div>
                    <x-label for="role_id" :value="__('Rol')" />

                    <select id="role_id" name="role_id" class="form-control mb-2">
                    <option>------Seleccionar------</option>
                    @foreach($roles as $role)
                    <option value="{{$role->id}}">{{ $role->descripcion }}</option>
                    @endforeach
                </select>
                </div>

                <!-- Provincia -->
                <div>
                    <x-label for="provincia_id" :value="__('Provincia')" />

                    <select id="provincia_id" name="provincia_id" class="form-control mb-2">
                    <option>------Seleccionar------</option>
                    @foreach($provincias as $provincia)
                    <option value="{{ $provincia->id }}" name="provincia_id">{{ $provincia->descripcion }}</option>
                    @endforeach
                </select>

                </div>

                    <!-- Cantón -->
                <div>
                    <x-label for="canton_id" :value="__('Cantón')" />

                    <select id="canton_id" name="canton_id" class="form-control mb-2"></select>
                    <!--<option>------Seleccionar------</option>
                    @foreach($cantones as $canton)
                    <option value="{{ $canton->cantonId }}" name="canton_id">{{ $canton->cantonDescripcion }}</option>
                    @endforeach-->
                
                </div>

                <!-- Name -->
                <div>
                    <x-label for="nombre" :value="__('Nombre')" />

                    <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus />
                </div>

                <!-- Apeliido -->
                <div>
                    <x-label for="apellido" :value="__('Apellido')" />

                    <x-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')" required autofocus />
                </div>

                <!-Celular -->
                <div>
                    <x-label for="celular" :value="__('Celular')" />

                    <x-input id="celular" class="block mt-1 w-full" type="text" name="celular" :value="old('celular')" required autofocus />
                </div>

                <!-- Dirección -->
                <div>
                    <x-label for="direccion" :value="__('Dirección')" />

                    <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('¿Ya te registraste?') }}
                    </a>

                    <x-button class="ml-4">
                        {{ __('Registrarse') }}
                    </x-button>
                </div>
            </form>
            <script>
                const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
                document.getElementById('provincia_id').addEventListener('change',(e)=>{
                    fetch('cantones',{
                        method : 'POST',
                        body: JSON.stringify({texto : e.target.value}),
                        headers:{
                            'Content-Type': 'application/json',
                            "X-CSRF-Token": csrfToken
                        }
                    }).then(response =>{
                        return response.json()
                    }).then( data =>{
                        var opciones ="<option value=''>-----Seleccionar-------</option>";
                        for (let i in data.lista) {
                        opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].descripcion+'</option>';
                        }
                        document.getElementById("canton_id").innerHTML = opciones;
                    }).catch(error =>console.error(error));
                })
            </script>
        </x-auth-card>
    </x-guest-layout>
</body>
</html>
