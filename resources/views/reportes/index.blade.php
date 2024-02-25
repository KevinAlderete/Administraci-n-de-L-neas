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
            Reporte de línea
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
                      <div class="flex items-center flex-wrap justify-between pb-2">
                        <div>
                          <h2 class="font-semibold text-white uppercase">Reporte de lineas</h2>
                        </div>
                        <div class="flex items-center gap-10 justify-between">
                          <form  action="{{route('reportes.report')}}" method ="POST">
                            @csrf
                            @method('POST')
                            <div class="flex flex-wrap gap-3 text-white">
                              <label for="date" class="flex justify-center items-center">Del:</label>
                              <div>
                                <input type="date" class="bg-gray-700 rounded-lg border-gray-500" name="fromDate" id="fromDate">
                              </div>
                              <label for="date" class="flex justify-center items-center">A:</label>
                              <div>
                                <input type="date" class="bg-gray-700 rounded-lg border-gray-500" name="toDate" id="toDate">
                              </div>
                              <button type="submit" class="hover:text-gray-300 bg-sky-600 px-2 rounded-lg hover:bg-sky-500" name="search" title="Filtrar">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 010 3m0-3a1.5 1.5 0 000 3m0 9.75V10.5" />
                                </svg>                                
                              </button>
                              
                            </div>
                          </form>
                        </div>
                      </div>
                      <div class="overflow-y-hidden w-full m-auto shadow-lg rounded-lg bg-gray-800">
                        <div class="overflow-x-auto rounded-lg">
                          <table class="w-full" id="example">
                            <thead>
                              <tr class="text-left text-sm font-semibold uppercase tracking-widest text-white">
                                <th class="px-5 py-3">Personal</th>
                                <th class="px-5 py-3">Tipo</th>
                                <th class="px-5 py-3">Plan</th>
                                <th class="px-5 py-3">Precio</th>
                                <th class="px-5 py-3">Número</th>
                                <th class="px-5 py-3">Sede</th>
                                <th class="px-5 py-3">Observación</th>
  
                                <th class="px-5 py-3">Fecha</th>
                              </tr>
                            </thead>
                            <tbody class="text-gray-200">
                              @foreach ($query as $gestionLinea)
                              <tr class="border-t-2 border-gray-600">
                                <td class="px-5 py-5 text-sm">
                                  <p class="whitespace-no-wrap">{{ $gestionLinea->personal->nombre }}</p>
                                </td>
                                <td class="px-5 py-5 text-sm">
                                  <div class="flex items-center">
                                    <div class="">
                                      <p class="whitespace-no-wrap">{{ $gestionLinea->linea->tipo }}</p>
                                    </div>
                                  </div>
                                </td>
                                <td class="px-5 py-5 text-sm">
                                  <div class="flex items-center">
                                    <div class="">
                                      <p class="whitespace-no-wrap">{{ $gestionLinea->linea->plan }}</p>
                                    </div>
                                  </div>
                                </td>
                                <td class="px-5 py-5 text-sm">
                                    <div class="flex items-center">
                                      <div class="">
                                        <p class="whitespace-no-wrap">{{ $gestionLinea->linea->precio }}</p>
                                      </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 text-sm">
                                    <div class="flex items-center">
                                      <div class="">
                                        <p class="whitespace-no-wrap">{{ $gestionLinea->linea->linea }}</p>
                                      </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 text-sm">
                                  <div class="flex items-center">
                                    <div class="">
                                      <p class="whitespace-no-wrap">{{ $gestionLinea->linea->sede }}</p>
                                    </div>
                                  </div>
                                </td>
                                <td class="px-5 py-5 text-sm">
                                    <div class="flex items-center">
                                        <div class="">
                                          <p class="whitespace-no-wrap">{{ $gestionLinea->observacion }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex items-center">
                                        <div class="">
                                          <p class="whitespace-no-wrap">{{ $gestionLinea->created_at->format('d-m-Y') }}</p>
                                        </div>
                                    </div>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        <div class="mx-4 border-b border-sky-900"></div>
                        <div class=" rounded-lg bg-gray-800 px-5 py-5">
                          {{ $query->links() }}
                        </div>
                      </div>
                  </div>                  
  
      
  </x-admin-layout>
  