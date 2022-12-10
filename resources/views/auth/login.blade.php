<!DOCTYPE html>
<html lang="es" translate="no">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @laravelPWA
</head>

<body class="p-0">
    <main x-cloak x-init
        class="w-full max-w-md mx-auto h-screen rounded-lg flex flex-col items-center justify-center relative shadow-lg border ">
        <div
            class="w-96 mx-2 h-96 rounded-lg shadow-xl border bg-gray-50 relative flex flex-col justify-center items-center">
            <div class="absolute top-6 left-0 w-full text-center py-1 ">
                <span class="text-gray-400 font-bold text-xl  ">MI<b class="text-gray-800 text-4xl">PROFE</b><b
                        class="">APP</b></span>
            </div>
            <form action="{{route('access')}}" method="POST" class=" flex flex-col space-y-4 justify-center items-center w-full max-w-[20rem]">
                @csrf
                <h1 class="font-semibold text-xl text-center capitalize leading-6">inicia sesión</h1>
                <x-input validate="username" name="username" id="username" placeholder="Nombre de Usuario..."  value="{{ old('username') }}" icon="ri-admin-line"></x-input>
                <x-input validate="password" placeholder="Ingrese su Contraseña..." type="password" name="password" id="password" icon="ri-lock-2-line"></x-input>
             
                <div class="flex justify-center w-full">
                    <x-button class="w-full uppercase  font-semibold py-1 bg-cyan-600 text-white">
                        Acceder
                    </x-button>
                </div>
                <div class="py-1 flex justify-end w-full text-xs space-x-2 items-center">
                    <span>¿Aún no tienes una cuenta? </span>
                    <a href="{{ route('register') }}" class=" text-gray-500 hover:text-gray-700">
                        <span class="text-blue-600 underline font-bold uppercase">Crea una</span>
                    </a>
                </div>
            </form>

            <div
                class="w-16 h-16 bg-pink-300 rounded-l-full  rounded-br-full rounded-r-none rounded-b-full absolute top-0 right-0  ">
            </div>
            <div
                class="w-16 h-16 bg-pink-300 rounded-r-full  rounded-tl-full rounded-l-none rounded-t-full absolute bottom-0 left-0  ">
            </div>
        </div>
        <div class="w-24 h-24 bg-cyan-300 rounded-t-3xl rounded-r-full absolute top-0 left-0  "></div>
        <div class="w-24 h-24 bg-cyan-300 rounded-b-3xl  rounded-l-full absolute bottom-0 right-0  ">
        </div>
        <a href="{{route('prueba')}}">Prueba</a>
    </main>

    <script src="//unpkg.com/alpinejs" defer></script>
    @livewireScripts
</body>

</html>
