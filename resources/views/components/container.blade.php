@props(['maxWidth' => 'max-w-7xl'])

<div class="py-10">
   <div class="{{ $maxWidth }} sm:px-6 lg:px-8">
      {{ $slot }}
   </div>
</div>
