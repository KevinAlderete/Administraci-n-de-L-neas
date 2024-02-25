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
            Perfil
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
        <div class="flex items-center justify-between pb-2">
          <div>
            <h2 class="font-semibold text-white uppercase">Administracion de Perfil</h2>
          </div>
          
        </div>
  
  
        <div class="overflow-y-hidden m-auto w-full flex justify-center items-center">
          
          <div class="card  min-w-sm bg-gray-800  rounded-lg transition-shadow shadow-xl hover:shadow-xl min-w-max">
            <!---->
            <div class="w-full card__media"><img src="{{ asset('img/tajoo.jpg') }}" alt="Tajo" class="h-36 w-96 rounded-t-lg"></div>
              <div class="  card__media--aside "></div>
              <div class="flex items-center p-4">
                <div class="relative flex flex-col items-center w-full">
                  <div
                    class="h-32 w-32 md rounded-full relative avatar  items-end justify-end min-w-max -top-16 flex bg-purple-200 text-purple-100 row-start-1 row-end-3 text-purple-650 ring-1 ring-white">
                    <img class="h-32 w-32 md rounded-full relative" src="{{ asset('uploads/avatars').'/'.$user->avatar }}" alt="Avatar">
                    <div class="absolute"></div>
                  </div>
                  <div class="flex flex-col space-y-1 justify-center items-center -mt-12 w-full">
                    <span class="text-md whitespace-nowrap text-gray-100 font-semibold">{{$user->name}}</span><span class="text-md whitespace-nowrap text-gray-300">{{$user->email}}</span>
                    
                    <div class="py-2 flex space-x-2">
                      <x-second-button :href="route('admin.users.show', $user->id)  ">
                        Editar
                      </x-second-button>
                    </div>
                  </div>
                </div>
              </div>
              <!---->
            </div>
          
          </div>          
        </div>
    </div>                  
  
      
  </x-admin-layout>
  