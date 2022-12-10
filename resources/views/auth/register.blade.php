<!DOCTYPE html>
<html lang="es" translate="no">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @livewireStyles
    @laravelPWA
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

</head>

<body class="p-0">
    <main x-cloak x-init
        class="w-full max-w-md mx-auto min-h-screen rounded-lg flex flex-col items-center justify-center relative shadow-lg border ">
        <div
            class="w-96 mx-2 pt-20 pb-16 rounded-lg shadow-xl border bg-gray-50 relative flex flex-col justify-center items-center">
            <div class="absolute top-6 left-0 w-full text-center py-1 ">
                <span class="text-gray-400 font-bold text-xl  ">MI<b class="text-gray-800 text-4xl">PROFE</b><b
                        class="">APP</b></span>
            </div>
            <div class="w-full">
                <form action="{{ route('create_acount') }}" method="POST"
                    class="flex flex-col space-y-4 justify-center items-center w-full mx-auto max-w-[20rem]">
                    @csrf
                    <h1 class="font-semibold text-xl text-center uppercase leading-6">Crea una cuenta gratuita</h1>
                    <x-input validate="name" placeholder="Ingrese su Nombre Completo..." icon="ri-user-line"
                        name="name" id="name" type="text" value="{{ old('name') }}"></x-input>
                    <x-input validtate="phone" placeholder="Ingrese su Nº. de Teléfono..." icon="ri-phone-line"
                        name="phone" id="phone" type="tel" value="{{ old('phone') }}"></x-input>
                    <x-input validate="email" placeholder="Ingrese su Correo..." icon="ri-mail-line" name="email"
                        type="email" id="email" value="{{ old('email') }}"></x-input>
                    <x-select validate="university_id" data-placeholder="Seleccione su universidad" class="select2"
                        name="university_id" id="university" icon="ri-building-2-line">

                        @foreach ($universities as $id => $univ)
                            @if (old('university_id') == $id)
                                <option value="{{ $id }}" selected>{{ $univ }}</option>
                            @else
                                <option value="{{ $id }}">{{ $univ }}</option>
                            @endif
                        @endforeach
                    </x-select>
                    <x-input validate="username" placeholder=" Ingrese su Nombre de Usuario..." icon="ri-admin-line"
                        name="username" id="username" type="text" value="{{ old('username') }}"></x-input>

                    <x-input validate="password" autcomplete="new-password" placeholder="Ingrese su Contraseña..."
                        type="password" icon="ri-lock-2-line" name="password" id="password"></x-input>
                    <x-input autcomplete="new-password" placeholder="Confirme su Contraseña..." type="password"
                        icon="ri-lock-2-line" name="password_confirmation" id="password_confirmation"></x-input>


                    <div class="flex justify-center w-full">
                        <x-button class="w-full uppercase  font-semibold py-1 bg-cyan-600 text-white">
                            Registrarse
                        </x-button>
                    </div>
                    <div>
                        <label for="terms" class="flex items-center">
                            <x-input validate="terms" type="checkbox" name="terms" id="terms"
                                class="rounded-full h-4 w-4 text-cyan-600">
                                <span class="ml-2 text-sm text-gray-600">Acepto los <a href="#"
                                        class="text-cyan-600">Términos y Condiciones</a></span>
                            </x-input>

                        </label>
                    </div>
                    <div class="py-1 flex justify-end w-full text-xs space-x-2 items-center">
                        <span>¿Ya tienes una cuenta? </span>
                        <a href="{{ route('login') }}" class=" text-gray-500 hover:text-gray-700">
                            <span class="text-blue-600 underline font-bold uppercase">Inicia Sesión</span>
                        </a>
                    </div>
                </form>
            </div>


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
    </main>

    <script src="//unpkg.com/alpinejs" defer></script>

    @livewireScripts


</body>

</html>
