<x-dapur-layout>
   <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
         {{ __('Reservations') }}
      </h2>
   </x-slot>

   <x-container maxWidth="max-w-3xl">

      <div class="flex mb-4">
         <a href="{{ route('dapur.reservations.index') }}" class="btn btn--link">
            < Back </a>
      </div>

      <x-box>
         <form action="{{ route('dapur.reservations.store') }}" method="POST">
            @csrf
            @include('dapur.reservations.form')
         </form>
      </x-box>

   </x-container>

</x-dapur-layout>
