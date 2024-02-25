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
          Roles
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
          {{-- <svg class="h-9 w-9 pb-1" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5 16s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H5zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
          </svg> --}}
        <img src="{{ asset('uploads/avatars').'/'.$user->avatar }}" alt="" class="h-9 w-9 rounded-full">
        </a>
      </div>
    </div>
  </div>


  <div class="mx-10 flex flex-col">
      <div class="flex items-center justify-between pb-2">
        <div>
          <h2 class="font-semibold text-white uppercase">Roles</h2>
        </div>
        <div class="flex items-center justify-between">
          <div class="ml-10 space-x-8 lg:ml-40">
            <x-second-button :href=" route('admin.users.index') ">
              Atras
            </x-second-button>
            
          </div>
        </div>
      </div>

                    <div class="overflow-y-hidden w-full m-auto shadow-lg rounded-lg bg-gray-800">
                      <div class="overflow-x-auto rounded-lg">
                        <table class="w-full">
                          <thead>
                            <tr class="text-left text-sm font-semibold uppercase tracking-widest text-white">
                              {{-- <th class="px-5 py-3">ID</th> --}}
                              <th class="px-5 py-3">Rol</th>
                              {{-- <th class="px-5 py-3">Acción</th> --}}
                            </tr>
                          </thead>
                          <tbody class="text-gray-200">
                            @foreach ($roles as $role)
                            <tr class="border-t-2 border-gray-600">
                              {{-- <td class="px-5 py-5 text-sm">
                                <p class="whitespace-no-wrap">{{ $role->id }}</p>
                              </td> --}}
                              <td class="  px-5 py-5 text-sm">
                                <div class="flex items-center">
                                  <div class="">
                                    <p class="whitespace-no-wrap">{{ $role->name }}</p>
                                  </div>
                                </div>
                              </td>
                              {{-- <td>
                                <div class="flex gap-4">
                                  <a href="{{ route('admin.roles.edit', $role->id) }}" class="hover:text-blue-600">Editar</a>
                                  <form class="hover:text-red-500 boton-eliminar" method="POST" action="{{ route('admin.roles.destroy', $role->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        Eliminar
                                    </button>
                                  </form>
                                </div>
                              </td> --}}
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
  </div>                  

    
</x-admin-layout>
