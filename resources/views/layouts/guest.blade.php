@extends('layouts.master')

@section('content')
   <x-guest.navigation />

   <div class="min-h-screen">
      {{ $slot }}
   </div>

   <x-guest.footer />
@endsection
