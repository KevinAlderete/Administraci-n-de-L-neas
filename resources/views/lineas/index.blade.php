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
            Líneas
          </a>
        </li>
      </ul>
      <div class="flex">
        <div class=''>        
          <form method="GET" class="overflow-hidden rounded-lg border bg-gray-700 border-gray-600 shadow-md">
              <div class="shadow flex">
                  <input class="w-full rounded bg-gray-700 text-gray-100 p-2 border-none" name="search" value="{{ request()->get('search') }}" type="text" placeholder="Buscar...">
                  <button type="submit" class="w-auto flex justify-end items-center text-gray-100 text-blue p-2 hover:text-gray-300 hover:font-bold">
                      <svg xmlns="http://www.w3.org/2000/svg" 
                      width="16" height="16" fill="currentColor" 
                      class="bi bi-search" viewBox="0 0 16 16"> <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/> </svg>
                  </button>
              </div>
          </form>
        </div>
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
                          <h2 class="font-semibold text-white uppercase">Administración de lineas</h2>
                        </div>
                        <div class="flex items-center gap-10 justify-between">
                          <div class=" ">
                            <x-second-button :href=" route('lineas.create') ">
                              Añadir
                            </x-second-button>
                          </div>
                        </div>
                      </div>
                      <div class="overflow-y-hidden w-full m-auto shadow-lg rounded-lg bg-gray-800">
                        <div class="overflow-x-auto rounded-lg">
                          <table class="w-full">
                            <thead>
                              <tr class="text-left text-sm font-semibold uppercase tracking-widest text-white">
                                <th class="px-5 py-3">Línea</th>
                                <th class="px-5 py-3">Tipo</th>
                                <th class="px-5 py-3">Plan</th>
                                <th class="px-5 py-3">Precio</th>
                                <th class="px-5 py-3">SIM</th>
                                <th class="px-5 py-3">Sede</th>
                                <th class="px-5 py-3">Estado</th>
  
                                <th class="px-5 py-3">Acción</th>
                              </tr>
                            </thead>
                            <tbody class="text-gray-200">
                              @foreach ($lineas as $linea)
                              <tr class="border-t-2 border-gray-600">
                                <td class="px-5 py-5 text-sm">
                                  <p class="whitespace-no-wrap">{{ $linea->linea }}</p>
                                </td>
                                <td class="px-5 py-5 text-sm">
                                  <div class="flex items-center">
                                    <div class="">
                                      <p class="whitespace-no-wrap">{{ $linea->tipo }}</p>
                                    </div>
                                  </div>
                                </td>
                                <td class="px-5 py-5 text-sm">
                                  <div class="flex items-center">
                                    <div class="">
                                      <p class="whitespace-no-wrap">{{ $linea->plan }}</p>
                                    </div>
                                  </div>
                                </td>
                                <td class="px-5 py-5 text-sm">
                                    <div class="flex items-center">
                                      <div class="">
                                        <p class="whitespace-no-wrap">{{ $linea->precio }}</p>
                                      </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 text-sm">
                                    <div class="flex items-center">
                                      <div class="">
                                        <p class="whitespace-no-wrap">{{ $linea->sim }}</p>
                                      </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 text-sm">
                                  <div class="flex items-center">
                                    <div class="">
                                      <p class="whitespace-no-wrap">{{ $linea->sede }}</p>
                                    </div>
                                  </div>
                              </td>
                                <td class="px-5 py-5 text-sm">
                                    <div class="flex items-center">
                                      <div class="">
                                        @if ($linea->estado == 'Asignada')
                                          <p class="whitespace-no-wrap px-2 py-1 font-semibold leading-tight text-green-700 bg-green-200 rounded-md">{{ $linea->estado }}</p>  
                                        @endif
                                        @if ($linea->estado == 'Libre')
                                          <p class="whitespace-no-wrap px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-200 rounded-md">{{ $linea->estado }}</p>  
                                        @endif
                                        @if ($linea->estado == 'Cambio de titularidad')
                                          <p class="whitespace-no-wrap px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-200 rounded-md">{{ $linea->estado }}</p>  
                                        @endif
                                        @if ($linea->estado == 'Préstamo')
                                          <p class="whitespace-no-wrap px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-200 rounded-md">{{ $linea->estado }}</p>  
                                        @endif
                                      </div>
                                    </div>
                                </td>
                                <td>
                                  <div class="flex gap-4">
                                    <a href="{{ route('lineas.edit', $linea->id) }}" class="hover:text-blue-600 text-white">Editar</a>
                                    
                                    <form class="hover:text-red-500 boton-eliminar" method="POST" action="{{ route('lineas.destroy', $linea->id) }}">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit">
                                          Eliminar
                                      </button>
                                    </form>
                                    
                                  </div>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        <div class="mx-4 border-b border-sky-900"></div>
                        <div class=" rounded-lg bg-gray-800 px-5 py-5">
                          {{ $lineas->links() }}
                        </div>
                      </div>
                  </div>                  
  
      
  </x-admin-layout>
  