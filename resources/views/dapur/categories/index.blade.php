<x-dapur-layout>
   <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
         {{ __('Categories') }}
      </h2>
   </x-slot>

   <x-container>

      <div class="flex justify-end mb-4">
         <a href="{{ route('dapur.categories.create') }}" class="btn btn--primary">New Category</a>
      </div>

      <x-table>
         <x-slot name="thead">
            <tr>
               <x-th>Name</x-th>
               <x-th>Image</x-th>
               <x-th>Description</x-th>
               <x-th>
                  <span class="sr-only">Edit</span>
               </x-th>
            </tr>
         </x-slot>

         @foreach ($categories as $category)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
               <x-td class="text-slate-900">
                  {{ $category->name }}
               </x-td>

               <x-td>
                  <img src="{{ Storage::url($category->image) }}" alt="" class="w-12 h-12 rounded-md">
               </x-td>

               <x-td>
                  {{ $category->description }}
               </x-td>

               <x-td>
                  <div class="flex items-center justify-end space-x-4">
                     <a href="{{ route('dapur.categories.edit', $category) }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

                     <form action="{{ route('dapur.categories.destroy', $category) }}" method="POST"
                        onsubmit="return confirm('Delete this category?')">
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
