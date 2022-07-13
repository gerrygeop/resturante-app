<x-dapur-layout>
   <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
         {{ __('Menus') }}
      </h2>
   </x-slot>

   <x-container maxWidth="max-w-3xl">

      <div class="flex mb-4">
         <a href="{{ route('dapur.menus.index') }}" class="btn btn--link">
            < Back </a>
      </div>

      <x-box>
         <form action="{{ route('dapur.menus.update', $menu) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('dapur.menus.form')
         </form>
      </x-box>

   </x-container>

</x-dapur-layout>
