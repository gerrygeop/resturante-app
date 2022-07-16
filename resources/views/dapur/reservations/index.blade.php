<x-dapur-layout>
   <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
         {{ __('Reservations') }}
      </h2>
   </x-slot>

   <x-container>

      <div class="flex justify-end mb-4">
         <a href="{{ route('dapur.reservations.create') }}" class="btn btn--primary">New Reservation</a>
      </div>

      <x-table>
         <x-slot name="thead">
            <tr>
               <x-th>Name</x-th>
               <x-th>Email</x-th>
               <x-th>Date</x-th>
               <x-th>Table</x-th>
               <x-th>Guest Number</x-th>
               <x-th>
                  <span class="sr-only">Edit</span>
               </x-th>
            </tr>
         </x-slot>

         @foreach ($reservations as $reservation)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
               <x-td class="text-slate-900">
                  {{ $reservation->first_name }} {{ $reservation->last_name }}
               </x-td>
               <x-td>
                  {{ $reservation->email }}
               </x-td>
               <x-td>
                  {{ $reservation->reservation_date }}
               </x-td>
               <x-td>
                  {{ $reservation->table_id }}
               </x-td>
               <x-td>
                  {{ $reservation->guest_number }}
               </x-td>
               <x-td class="text-right">
                  <div class="flex items-center justify-end space-x-4">
                     <a href="{{ route('dapur.reservations.edit', $reservation) }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

                     <form action="{{ route('dapur.reservations.destroy', $reservation) }}" method="POST"
                        onsubmit="return confirm('Delete this reservations?')">
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
