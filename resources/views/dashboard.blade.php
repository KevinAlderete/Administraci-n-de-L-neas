<x-admin-layout>
    <div class="mb-4 flex p-4 sm:p-0 sm:m-8 flex-wrap bg-gray-800 sm:bg-transparent shadow-md sm:shadow-none justify-between">
        
      <ul class="flex items-center">
        <li class="inline-flex items-center">
          <a href="#" class="text-gray-600 hover:text-blue-500">
          <svg class="w-5 h-auto fill-current mx-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/></svg>
          </a>
      
          <svg class="w-5 h-auto fill-current mx-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6-6-6z"/></svg>
        </li>
      
        <li class="inline-flex items-center">
          <a href="#" class=" hover:text-sky-500 text-sky-400">
            Dashboard
          </a>
        </li>
      </ul>
      <div class="flex">
        <div class=" w-10  flex items-center">
          <!-- open icon -->
          <div x-on:click="open = !open" class="sidebar overflow-hidden grid place-items-center text-gray-300 cursor-pointer">
              <div x-show="open" class=" text-gray-50">
                <svg class="h-10 w-10" fill="currentColor" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" d="M8.5 14.5h7m-11-3h11m-7-3h7m-11-3h11"/>
                </svg>
              </div>    
                
                <!-- close icon -->
              
              <div x-show="!open" class=" hover:text-gray-50" >
                <svg class="h-10 w-10" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M4.5 13.5A.5.5 0 015 13h10a.5.5 0 010 1H5a.5.5 0 01-.5-.5zm0-4A.5.5 0 015 9h10a.5.5 0 010 1H5a.5.5 0 01-.5-.5zm0-4A.5.5 0 015 5h10a.5.5 0 010 1H5a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
                  </svg>
              </div>
                
          </div>
        </div>
        <div class="flex items-center text-gray-300 hover:text-gray-50">
          <a href="{{ route('admin.users.profile') }}">
            <img src="{{ asset('uploads/avatars').'/'.$user->avatar }}" alt="" class="h-9 w-9 rounded-full">
          </a>
        </div>
      </div>
    </div>
  
    
    <div class="mx-10 flex flex-col">
        <div class="bg-gray-900 rounded-lg pb-4 flex flex-col sm:grid sm:grid-cols-2 gap-4 xl:grid-cols-3">
            <div class="bg-gray-800 text-white rounded-2xl p-5 flex flex-row justify-between">
                <div class="flex flex-col gap-1">
                    <span class="text-lg">Líneas</span>
                    <span class="font-bold text-2xl">{{ $lineas }}</span>
                    <a href="{{ route('lineas.index') }}" class=" text-gray-300 text-base hover:underline transition-all hover:text-white">Ver detalles</a>
                </div>
                <div class="flex items-center">
                    <div class="bg-green-500 flex p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                    </div>
                </div>
            </div> 
            
            <div class="bg-gray-800 text-white rounded-2xl p-5 flex flex-row justify-between">
                <div class="flex flex-col gap-1">
                    <span class="text-lg">Personal</span>
                    <span class="font-bold text-2xl">{{ $personals }}</span>
                    <a href="{{ route('personal.index') }}" class=" text-gray-300 text-base hover:underline transition-all hover:text-white">Ver detalles</a>
                </div>
                <div class="flex items-center">
                    <div class="bg-green-500 flex p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                        </svg> 
                    </div>
                </div>
            </div>
            <div class="bg-gray-800 text-white rounded-2xl p-5 flex flex-row justify-between">
                <div class="flex flex-col gap-1">
                    <span class="text-lg">Líneas asignadas</span>
                    <span class="font-bold text-2xl">{{ $gestionLineas }}</span>
                    <a href="{{ route('gestionLineas.index') }}" class=" text-gray-300 text-base hover:underline transition-all hover:text-white">Ver detalles</a>
                </div>
                <div class="flex items-center">
                    <div class="bg-green-500 flex p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                        </svg> 
                    </div>
                </div>
            </div>
        </div> 

        {{-- charts --}}
        <div class="flex flex-col md:grid md:grid-cols-2 gap-4">
            <div class="flex flex-col gap-4">
                <div class="overflow-hidden flex justify-center rounded-lg bg-gray-800 shadow-lg p-4">
                    <canvas id="myChartLine"></canvas>
                </div>
                <div class="overflow-hidden justify-center flex rounded-lg bg-gray-800 shadow-lg p-4">
                    <canvas id="myChartLine2"></canvas>
                </div>
            </div>
            <div class="overflow-hidden flex  justify-centerrounded-lg bg-gray-800  shadow-lg p-4">
                <canvas id="myChart"></canvas>
            </div>
            
        </div>
    </div>                  
    @section('scripts')
    <script>
        const ctx = document.getElementById('myChart');
    
        new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Líneas', 'Líneas Asignadas'],
            datasets: [{
                data: [{{$lineas}}, {{$gestionLineas}}],
                borderWidth: 2,
                backgroundColor: ['rgb(249, 115, 22)', 'rgb(255, 205, 86)'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Total de líneas X Líneas asignadas'
            }
            }
        }
        });
    </script>
    <script>
        
        var labels =  {{ Js::from($labels) }};
       
        var countExpedientes =  {{ Js::from($data) }};
        
        const line = document.getElementById('myChartLine');


        new Chart(line, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'N° Líneas',
                    data: countExpedientes,
                    borderWidth: 3,
                    borderColor: 'rgb(249, 115, 22, 0.8)',
                    backgroundColor: 'rgb(249, 115, 22, 0.2)',
                    fill: true
                }
            ],
            },
            options: {
                responsive: true,
                plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Resumen de Líneas'
                }
                }
            },
        });
    </script>
    <script>
            
        var labels1 =  {{ Js::from($labels1) }};
        var countCaso =  {{ Js::from($data2) }};
        const line2 = document.getElementById('myChartLine2');

        new Chart(line2, {
            type: 'line',
            data: {
                labels: labels1,
                datasets: [{
                    label: 'N° de Personal',
                    data: countCaso,
                    borderWidth: 3,
                    borderColor: 'rgb(34, 197, 94, 0.8)',
                    backgroundColor: 'rgb(34, 197, 94, 0.2)',
                    fill: true
                }
            ],
            },
            options: {
                responsive: true,
                plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Resumen del Personal'
                }
                }
            },
        });
    </script>
    @endsection
  </x-admin-layout>
  