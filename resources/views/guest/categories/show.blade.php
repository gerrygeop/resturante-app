<x-guest-layout>

   <div class="container w-full px-5 py-6 mx-auto">
      <div class="grid lg:grid-cols-4 gap-y-6">

         @foreach ($category->menus as $menu)
            <div class="max-w-xs mx-4 mb-2 pb-4 border overflow-hidden rounded-lg shadow-lg">
               <img class="w-full h-48" src="{{ Storage::url($menu->image) }}" alt="{{ $menu->name }}" />

               <div class="px-6 py-2">
                  <span class="px-2 py-0.5 text-xs bg-red-500 rounded-lg text-red-50">
                     {{ $category->name }}
                  </span>

                  <h4 class="my-2 text-xl font-semibold tracking-tight text-green-600 uppercase">
                     {{ $menu->name }}
                  </h4>

                  <p class="leading-normal text-gray-700">
                     {{ $menu->description }}
                  </p>
               </div>

               <div class="flex items-center justify-between px-6">
                  <span class="text-lg text-green-600">${{ $menu->price }}</span>
               </div>
            </div>
         @endforeach

      </div>
   </div>

</x-guest-layout>
