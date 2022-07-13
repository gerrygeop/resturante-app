<x-dapur-layout>
   <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
         {{ __('Menus') }}
      </h2>
   </x-slot>

   <x-container>

      <div class="flex justify-end mb-4">
         <a href="{{ route('dapur.menus.create') }}" class="btn btn--primary">New Menu</a>
      </div>

      <x-table>
         <x-slot name="thead">
            <tr>
               <x-th>Name</x-th>
               <x-th>Image</x-th>
               <x-th>Price</x-th>
               <x-th>Description</x-th>
               <x-th>
                  <span class="sr-only">Edit</span>
               </x-th>
            </tr>
         </x-slot>

         @foreach ($menus as $menu)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
               <x-td class="text-slate-900">
                  {{ $menu->name }}
               </x-td>
               <x-td>
                  <img src="{{ Storage::url($menu->image) }}" alt="" class="w-12 h-12 rounded-md">
               </x-td>
               <x-td>
                  {{ $menu->price }}
               </x-td>
               <x-td>
                  {{ $menu->description }}
               </x-td>
               <x-td class="text-right">
                  <div class="flex items-center justify-end space-x-4">
                     <a href="{{ route('dapur.menus.edit', $menu) }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

                     <form action="{{ route('dapur.menus.destroy', $menu) }}" method="POST"
                        onsubmit="return confirm('Delete this menu?')">
                        @csrf
                        @method('DELETE')
                        <button class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                     </form>
                  </div>
               </x-td>
            </tr>
         @endforeach
      </x-table>

   </x-container>
</x-dapur-layout>
