<div>
   <div class="mb-6">
      <x-label for="first_name" :value="__('First Name')" />
      <x-input type="text" class="block mt-1 w-full" id="first_name" name="first_name" :value="old('first_name', $reservation->first_name)" required
         autofocus />

      @error('first_name')
         <p class="text-xs text-red-500 italic">{{ $message }}</p>
      @enderror
   </div>

   <div class="mb-6">
      <x-label for="last_name" :value="__('Last Name')" />
      <x-input type="text" class="block mt-1 w-full" id="last_name" name="last_name" :value="old('last_name', $reservation->last_name)" required />

      @error('last_name')
         <p class="text-xs text-red-500 italic">{{ $message }}</p>
      @enderror
   </div>

   <div class="mb-6">
      <x-label for="email" :value="__('Email')" />
      <x-input type="email" class="block mt-1 w-full" id="email" name="email" :value="old('email', $reservation->email)" required />

      @error('email')
         <p class="text-xs text-red-500 italic">{{ $message }}</p>
      @enderror
   </div>

   <div class="mb-6">
      <x-label for="telp" :value="__('Telp')" />
      <x-input type="text" class="block mt-1 w-full" id="telp" name="telp" :value="old('telp', $reservation->telp)" required />

      @error('telp')
         <p class="text-xs text-red-500 italic">{{ $message }}</p>
      @enderror
   </div>

   <div class="mb-6">
      <x-label for="reservation_date" :value="__('Reservation Date')" />
      <x-input type="datetime-local" class="block mt-1 w-full" id="reservation_date" name="reservation_date"
         :value="old('reservation_date', $reservation->reservation_date)" required />

      @error('reservation_date')
         <p class="text-xs text-red-500 italic">{{ $message }}</p>
      @enderror
   </div>

   <div class="mb-6">
      <x-label for="guest_number" :value="__('Guest Number')" />
      <x-input type="number" class="block mt-1 w-full" id="guest_number" name="guest_number" :value="old('guest_number', $reservation->guest_number)"
         required />

      @error('guest_number')
         <p class="text-xs text-red-500 italic">{{ $message }}</p>
      @enderror
   </div>

   <div class="mb-6">
      <x-label for="table_id" :value="__('Table')" />
      <select name="table_id" id="table_id" class="block mt-1 w-full select-option">
         @foreach ($tables as $table)
            <option value="{{ $table->id }}" @selected($reservation->table_id == $table->id)>
               {{ $table->name }}
            </option>
         @endforeach
      </select>

      @error('table_id')
         <p class="text-xs text-red-500 italic">{{ $message }}</p>
      @enderror
   </div>

   <div class="flex items-center justify-end">
      <button type="submit" class="btn btn--primary">Submit</button>
   </div>
</div>
