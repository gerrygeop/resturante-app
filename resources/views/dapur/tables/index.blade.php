<x-dapur-layout>
   <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
         {{ __('Tables') }}
      </h2>
   </x-slot>

   <x-container>

      <div class="flex justify-end mb-4">
         <a href="{{ route('dapur.tables.create') }}" class="btn btn--primary">New Table</a>
      </div>

      <x-table>
         <x-slot name="thead">
            <tr>
               <x-th>Name</x-th>
               <x-th>Guest Number</x-th>
               <x-th>Status</x-th>
               <x-th>Location</x-th>
               <x-th>
                  <span class="sr-only">Edit</span>
               </x-th>
            </tr>
         </x-slot>

         @foreach ($tables as $table)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
               <x-td class="text-slate-900">
                  {{ $table->name }}
               </x-td>
               <x-td>
                  {{ $table->guest_number }}
               </x-td>
               <x-td>
                  {{ Str::title($table->status->name) }}
               </x-td>
               <x-td>
                  {{ Str::title($table->location->name) }}
               </x-td>
               <x-td class="text-right">
                  <div class="flex items-center justify-end space-x-4">
                     <a href="{{ route('dapur.tables.edit', $table) }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

                     <form action="{{ route('dapur.tables.destroy', $table) }}" method="POST"
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
