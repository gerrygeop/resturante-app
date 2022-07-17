<x-guest-layout>

   <div class="container w-full px-5 py-6 mx-auto">
      <div class="grid lg:grid-cols-4 gap-y-6">

         @foreach ($menus as $menu)
            <div class="max-w-xs mx-4 mb-2 pb-2 overflow-hidden border rounded-lg shadow-lg">
               <img class="w-full h-48 object-cover" src="{{ Storage::url($menu->image) }}" alt="{{ $menu->name }}" />

               <div class="px-6 py-4">

                  <div class="flex">
                     @foreach ($menu->categories as $category)
                        <span class="px-2 py-0.5 text-sm bg-red-500 rounded-lg text-red-50">
                           {{ $category->name }}
                        </span>
                     @endforeach
                  </div>

                  <h4 class="my-2 text-xl font-semibold tracking-tight text-green-600 uppercase">
                     {{ $menu->name }}
                  </h4>

                  <p class="leading-normal text-gray-700">
                     {{ $menu->description }}
                  </p>
               </div>
               <div class="flex items-center justify-between px-4">
                  <span class="text-lg text-green-600">${{ $menu->price }}</span>
               </div>
            </div>
         @endforeach

      </div>
   </div>

</x-guest-layout>
