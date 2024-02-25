<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" sizes="76x76" href="{{ asset('img/Logo-lineas-l.png') }}" />
    <title>KA Líneas</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/chartjs/chartjs.min.js') }}"></script>

    <!-- for export -->
    <link href="{{ asset('css/dataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{-- style --}}
    <style>
        @layer components {
            .sidebar {
                transition: all .4s ease-in-out;
            }
        }
    </style>
</head>

<body class="font-sans antialiased">
    @if (Session::has('message'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-start',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ Session::get('message') }}'
            })
        </script>
    @endif
    @if (Session::has('messageAlert'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-start',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: '{{ Session::get('messageAlert') }}'
            })
        </script>
    @endif
    <main class="min-h-screen flex bg-gray-900" x-data="{ open: false }">
        <div class="shadow-2xl rounded-lg ml-1 sidebar fixed min-h-screen z-10 overflow-hidden  bg-gray-800 "
            x-bind:class="open ? 'w-56' : 'w-0 sm:w-[3.30rem]'">
            <div class="flex h-screen flex-col justify-between pt-2 pb-6">
                <div class="flex flex-col justify-between h-full">
                    <div class="w-max py-2.5">
                        <img src="{{ asset('img/logo-lineas.png') }}" class="" alt="">
                    </div>

                    {{-- <div class="min-w-max">
                  <img src="{{ asset('uploads/avatars').'/'.Auth::user()->avatar}}" alt="" class="ml-14 h-24 w-2h-24 rounded-full">
                  <span class="ml-20 text-white">{{ Auth::user()->name }}</span>
                </div> --}}

                    <ul class="mt-6 space-y-2 tracking-wide">
                        <li class="min-w-max">
                            <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                                </svg>
                                <span class="group-hover:text-gray-400">Dashboard</span>
                            </x-nav-link>
                        </li>
                        @role('admin|jefe|empleado')
                            <li class="min-w-max">
                                <x-nav-link href="{{ route('reportes.index') }}" :active="request()->routeIs('reportes.index')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                    </svg>
                                    <span class="group-hover:text-gray-400">Reportes</span>
                                </x-nav-link>
                            </li>
                        @endrole
                        @role('admin|jefe')
                            <li class="min-w-max">
                                <x-nav-link href="{{ route('gestionLineas.index') }}" :active="request()->routeIs(
                                    'gestionLineas.index',
                                    'gestionLineas.create',
                                    'gestionLineas.edit',
                                )">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                    </svg>
                                    <span class="group-hover:text-gray-400">Gestión de Línea</span>
                                </x-nav-link>
                            </li>
                            <li class="min-w-max">
                                <x-nav-link href="{{ route('lineas.index') }}" :active="request()->routeIs('lineas.index', 'lineas.create', 'lineas.edit')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                    </svg>


                                    <span class="group-hover:text-gray-400">Líneas</span>
                                </x-nav-link>
                            </li>
                            <li class="min-w-max">
                                <x-nav-link href="{{ route('personal.index') }}" :active="request()->routeIs('personal.index', 'personal.create', 'personal.edit')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                                    </svg>
                                    <span class="group-hover:text-gray-400">Personal</span>
                                </x-nav-link>
                            </li>
                        @endrole
                        @role('admin')
                            <li class="min-w-max">
                                <x-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs(
                                    'admin.users.index',
                                    'admin.users.create',
                                    'admin.users.show',
                                )">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                    </svg>
                                    <span class="group-hover:text-gray-400">Usuarios</span>
                                </x-nav-link>
                            </li>
                        @endrole

                    </ul>

                    <div class="w-max -mb-3">
                        <form method="POST" action="{{ route('logout') }}">

                            @csrf
                            <x-nav-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.636 5.636a9 9 0 1012.728 0M12 3v9" />
                                </svg>

                                <span class="group-hover:text-gray-400">Cerrar sesión</span>
                            </x-nav-link>
                        </form>
                    </div>
                </div>

            </div>

        </div>

        <div class="flex  sm:pl-[3.30rem] flex-col w-full">
            {{ $slot }}
        </div>
    </main>

    @yield('scripts')

    <script type="text/javascript" async>
        $('.boton-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡No podrás recuperar esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(34 197 94)',
                cancelButtonColor: 'rgb(239 68 68)',
                confirmButtonText: '¡Sí, bórralo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
    <!-- for export all -->
    <script src="{{ asset('js/dataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- export Scripts -->
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [{
                        extend: 'copy'
                    },
                    {
                        extend: 'csv',
                        title: 'Reporte'
                    },
                    {
                        extend: 'excel',
                        title: 'Reporte'
                    },
                    {
                        extend: 'pdf',
                        title: 'Reporte'
                    },

                    {
                        extend: 'print',
                        customize: function(win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]
            });
        });
    </script>

</body>

</html>
