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
          Usuarios
        </a>
      </li>
      <li class="inline-flex items-center">
        <svg class="w-5 h-auto fill-current mx-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6-6-6z"/></svg>
      </li>
    
      <li class="inline-flex items-center">
        <a href="#" class=" hover:text-sky-500 text-sky-400">
          Actualizar
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
          <img src="{{ asset('uploads/avatars').'/'.$userid->avatar }}" alt="" class="h-9 w-9 rounded-full">
        </a>
      </div>
    </div>
  </div>
  
  
                <div class="mx-10 flex flex-col">
                    <div class="flex items-center flex-wrap justify-between pb-2">
                      <div>
                        <h2 class="font-semibold text-white uppercase">Administración de usuarios</h2>
                      </div>
                      <div class="flex items-center justify-between">
                        @role('admin')
                        <div class="ml-10 space-x-8 lg:ml-40">
                          <x-second-button :href=" route('admin.users.index') ">
                            Atras
                          </x-second-button>
                        </div>
                        @endrole
                        @role('empleado|jefe')
                        <div class="ml-10 space-x-8 lg:ml-40">
                            <x-second-button :href=" route('admin.users.profile') ">
                              Atras
                            </x-second-button>
                        </div>
                        @endrole
                      </div>
                    </div>
                    <div class="font-sans antialiased bg-grey-lightest">
                      <!-- Content -->
                      <div class="w-full bg-grey-lightest">
                        <div class="container mx-auto">
                          <div class="w-5/6 lg:w-1/2 mx-auto bg-gray-800 rounded-lg shadow">
                            <div class="py-4 text-white px-8 text-xl border-grey-lighter">
                              <span><strong>Actualizar usuario</strong></span>
                            </div>
                                <form method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data" class="py-4 px-8  rounded-b-xl">
                                  @csrf  
                                  @method('PUT')
                                    <div class="mb-4">
                                        <label class="after:content-['*'] after:text-red-400 block text-gray-300 text-sm  mb-2" for="name">Foto de perfil</label>
                                        <input value="{{ $user->avatar }}" class="appearance-none cursor-pointer bg-gray-700 border-none text-sm rounded w-full py-2 px-3 text-gray-100" id="avatar" name="avatar" type="file">
                                        @error('avatar') <span class="text-red-400 tppearance-none border rounded wext-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="after:content-['*'] after:text-red-400 block text-gray-300 text-sm  mb-2" for="name">Nombre</label>
                                        <input value="{{ $user->name }}" class="appearance-none bg-gray-700 border-none text-sm rounded w-full py-2 px-3 text-gray-100" id="name" name="name" type="text" placeholder="Ingrese nombre">
                                        @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="after:content-['*'] after:text-red-400 block text-gray-300 text-sm  mb-2" for="email">Correo</label>
                                        <input value="{{ $user->email }}" class="appearance-none bg-gray-700 border-none text-sm rounded w-full py-2 px-3 text-gray-100" id="email" name="email" type="email" placeholder="Ingrese correo">
                                        @error('email') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-300 text-sm  mb-2" for="password">Contraseña</label>
                                        <input class="appearance-none bg-gray-700 border-none text-sm rounded w-full py-2 px-3 text-gray-100" id="password" name="password" type="password" placeholder="Ingrese una contraseña">
                                        @error('password') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="flex items-center justify-between mt-8">
                                        <x-primary-button>
                                            Actualizar
                                        </x-primary-button>
                                    </div>
                                </form>
                                @role('admin')
                                @if ($user->id != 1)
                                <div class="w-full flex flex-col gap-1 py-4 px-8">
                                    <div class="relative z-0 w-full group">
                                        
                      
                                        <div>
                                            <form method="POST" class="flex gap-3 flex-row" action="{{ route('admin.users.roles', $user->id) }}">
                                                @csrf
                                                <div class="relative z-0 w-full group">
                                                    <label for="role" class="block text-gray-300 text-sm  mb-2">Roles</label>
                                                    <select id="role" name="role" autocomplete="roles" class="appearance-none bg-gray-700 border-none text-sm rounded w-full py-2 px-3 text-gray-100">
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('role') 
                                                        <span class="text-red-400 text-sm">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="sm:col-span-6 mt-7 ">
                                                  <x-primary-button>
                                                    Asignar
                                                  </x-primary-button>
                                                </div>
                                            </form>  
                                        </div>
        
                                        <div class="flex gap-3 mb-4 flex-wrap">
                                            @if ($user->roles)
                                                @foreach ($user->roles as $user_role)
                                                <form method="POST" action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}" class="boton-eliminar mt-4">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-200 hover:bg-red-500 hover:scale-105 hover:text-red-200 rounded-md">
                                                        {{ $user_role->name }} 
                                                    </button>
                                                </form>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    

                                </div>
                                @endif
                                @endrole
      
                                  
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>                  

</x-admin-layout>
