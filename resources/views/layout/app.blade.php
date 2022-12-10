<!DOCTYPE html>
<html lang="es" translate="no">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @laravelPWA
</head>
<body class="p-0 ">
    <div class="absolute top-0 right-0 bottom-0 left-0 bg-transparent  flex items-end pb-12 justify-center hidden" id="divLoader">
        <span class="ri-loader-5-line ri-2x animate-spin"></span>
     </div>
    <main class="w-full max-w-[480px] mx-auto h-screen rounded-lg  shadow-lg border relative">
        
        <nav class="top-0  sticky z-20 w-full max-w-md px-2 py-1 flex items-center justify-between bg-cyan-300">
           <div class="flex items-center">
            <span class="text-gray-400 font-bold text-sm  flex items-center ">MI<b class="text-gray-700 text-2xl">PROFE</b><b
                class="">APP</b></span>
           </div>
            <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="{{avatar(auth()->user()->name)}}" alt="">
        </nav>
        <section class="m-0 px-0 pb-12">
           {{$slot}}
        </section>

        <nav class="fixed bottom-0 z-20 w-full max-w-[476px] py-2 shadow border border-gray-100 select-none bg-gray-50">
            <div class="flex space-x-4 justify-around ">
                <x-menu-item text="Inicio"></x-menu-item>
                <x-menu-item icon="ri-group-fill" text="Profesores"></x-menu-item>
                <x-menu-item icon="ri-briefcase-fill" text="Materias"></x-menu-item>
                <x-menu-item icon="ri-building-2-fill" text="Sedes"></x-menu-item>
            </div>
        </nav>
        
    </main>

    <script src="//unpkg.com/alpinejs" defer></script>
    @livewireScripts
    <script>
        window.addEventListener('beforeunload', function (e) {
            document.getElementById('divLoader').classList.remove('hidden');
        });
    </script>
</body>
</html>