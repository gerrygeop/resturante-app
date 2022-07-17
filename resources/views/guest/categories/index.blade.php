<x-guest-layout>

   <div class="container w-full px-5 py-6 mx-auto">
      <div class="grid lg:grid-cols-4 gap-y-6">

         @foreach ($categories as $category)
            <div class="max-w-xs mx-4 mb-2 overflow-hidden rounded-lg shadow-lg">
               <img class="w-full h-48 object-cover" src="{{ Storage::url($category->image) }}"
                  alt="{{ $category->name }}" />
               <div class="px-6 py-4">
                  <a href="{{ route('guest.categories.show', $category) }}">
                     <h4
                        class="text-xl font-semibold tracking-tight text-green-600 hover:text-green-500 hover:underline uppercase">
                        {{ $category->name }}
                     </h4>
                  </a>
               </div>
            </div>
         @endforeach

      </div>
   </div>

</x-guest-layout>
