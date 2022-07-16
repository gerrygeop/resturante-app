<x-dapur-layout>
   <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
         {{ __('Tables') }}
      </h2>
   </x-slot>

   <x-container maxWidth="max-w-3xl">

      <div class="flex mb-4">
         <a href="{{ route('dapur.tables.index') }}" class="btn btn--link">
            < Back </a>
      </div>

      <x-box>
         <form action="{{ route('dapur.tables.store') }}" method="POST">
            @csrf
            @include('dapur.tables.form')
         </form>
      </x-box>

   </x-container>

</x-dapur-layout>
