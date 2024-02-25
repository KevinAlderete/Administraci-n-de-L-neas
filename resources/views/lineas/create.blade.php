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
        <li class="inline-flex items-center">
          <svg class="w-5 h-auto fill-current mx-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6-6-6z"/></svg>
        </li>
      
        <li class="inline-flex items-center">
          <a href="#" class=" hover:text-sky-500 text-sky-400">
            Crear
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
                          <h2 class="font-semibold text-white uppercase">Administración de líneas</h2>
                        </div>
                        <div class="flex items-center justify-between">
                          <div class="ml-10 space-x-8 lg:ml-40">
                            <x-second-button :href=" route('lineas.index') ">
                              Atras
                            </x-second-button>
                            
                          </div>
                        </div>
                      </div>
                      <div class="font-sans antialiased bg-grey-lightest">
                        <!-- Content -->
                        <div class="w-full bg-grey-lightest">
                          <div class="container mx-auto">
                            <div class="w-5/6 lg:w-1/2 mx-auto bg-gray-800 rounded-lg shadow">
                              <div class="py-4 text-white px-8 text-xl border-grey-lighter">
                                <span><strong>Registrar linea</strong></span>
                              </div>
                                  <form method="POST" action="{{ route('lineas.store') }}" class="py-4 px-8 shadow-xl rounded-b-xl">
                                    @csrf  
                                      <div class="mb-4">
                                          <label class="after:content-['*'] after:text-red-400 block text-gray-300 text-sm  mb-2" for="linea">Línea</label>
                                          <input class="appearance-none bg-gray-700 border-none text-sm rounded w-full py-2 px-3 text-gray-100" id="linea" name="linea" type="text" placeholder="Ingrese línea">
                                          @error('linea') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                      </div>
                                      <div class="mb-4">
                                        <label for="tipo" class="after:content-['*'] after:text-red-400 block text-gray-300 text-sm  mb-2">Tipo</label>
                                        <select name="tipo" id="tipo" class="appearance-none bg-gray-700 border-none text-sm rounded w-full py-2 px-3 text-gray-100">
                                            <option value="" selected disabled>Selecionar tipo</option>
                                            <option value="Modem">Modem</option>
                                            <option value="Usuario">Usuario</option>
                                        </select>
                                        @error('linea') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                      </div>
                                      <div class="mb-4">
                                          <label class="after:content-['*'] after:text-red-400 block text-gray-300 text-sm  mb-2" for="plan">Plan</label>
                                          <input class="appearance-none bg-gray-700 border-none text-sm rounded w-full py-2 px-3 text-gray-100" id="plan" name="plan" type="text" placeholder="Ingrese plan">
                                          @error('plan') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                      </div>
                                      <div class="mb-4">
                                        <label class="block text-gray-300 text-sm  mb-2" for="precio">Precio</label>
                                        <input class="appearance-none bg-gray-700 border-none text-sm rounded w-full py-2 px-3 text-gray-100" id="precio" name="precio" type="text" placeholder="Ingrese precio">
                                        @error('precio') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                      </div>
                                      <div class="mb-4">
                                        <label class="after:content-['*'] after:text-red-400 block text-gray-300 text-sm  mb-2" for="sim">SIM</label>
                                        <input class="appearance-none bg-gray-700 border-none text-sm rounded w-full py-2 px-3 text-gray-100" id="sim" name="sim" type="text" placeholder="Ingrese SIM">
                                        @error('sim') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                      </div>
                                      <div class="mb-4">
                                        <label for="sede" class="block text-gray-300 text-sm  mb-2">Sede</label>
                                        <select name="sede" id="sede" class="appearance-none bg-gray-700 border-none text-sm rounded w-full py-2 px-3 text-gray-100">
                                            <option value="" selected disabled>Selecionar sede</option>
                                            <option value="Lima">Lima</option>
                                            <option value="Huancayo">Huancayo</option>
                                            <option value="Tuctu">Tuctu</option>
                                            <option value="Kismillgs">Kismillgs</option>
                                            <option value="Truckshop">Truckshops</option>
                                            <option value="EPCM">EPCM</option>
                                        </select>
                                        @error('sede') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                      </div>
                                      <div class="mb-4">
                                        <label for="estado" class="after:content-['*'] after:text-red-400 block text-gray-300 text-sm  mb-2">Estado</label>
                                        <select name="estado" id="estado" class="appearance-none bg-gray-700 border-none text-sm rounded w-full py-2 px-3 text-gray-100">
                                            <option value="" selected disabled>Selecionar estado</option>
                                            <option value="Asignada">Asignada</option>
                                            <option value="Libre">Libre</option>
                                            <option value="Cambio de titularidad">Cambio de titularidad</option>
                                            <option value="Préstamo">Préstamo</option>
                                        </select>
                                        @error('estado') <span class="text-red-400 text-sm">{{ $message }}</span>@enderror
                                      </div>
                                      <div class="flex items-center justify-between mt-8">
                                          <x-primary-button>
                                              Crear
                                          </x-primary-button>
                                      </div>
                                  </form>
                                    
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                  
  
  </x-admin-layout>
  