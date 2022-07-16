<div>
   <div class="mb-6">
      <x-label for="name" :value="__('Name')" />
      <x-input type="text" class="block mt-1 w-full" id="name" name="name" :value="old('name', $table->name)" required
         autofocus />
   </div>

   <div class="mb-6">
      <x-label for="guest_number" :value="__('Guest Number')" />
      <x-input type="number" class="block mt-1 w-full" id="guest_number" name="guest_number" :value="old('guest_number', $table->guest_number)"
         required />
   </div>

   <div class="mb-6">
      <x-label for="status" :value="__('Status')" />
      <select name="status" id="status" class="block mt-1 w-full select-option">
         @foreach (App\Enums\TableStatus::cases() as $status)
            <option value="{{ $status->value }}"
               @if ($table->status) @selected($table->status->value === $status->value) @endif>
               {{ Str::title($status->name) }}
            </option>
         @endforeach
      </select>
   </div>

   <div class="mb-6">
      <x-label for="location" :value="__('Location')" />
      <select name="location" id="location" class="block mt-1 w-full select-option">
         @foreach (App\Enums\TableLocation::cases() as $location)
            <option value="{{ $location->value }}"
               @if ($table->location) @selected($table->location->value === $location->value) @endif>
               {{ Str::title($location->name) }}
            </option>
         @endforeach
      </select>
   </div>

   <div class="flex items-center justify-end">
      <button type="submit" class="btn btn--primary">Submit</button>
   </div>
</div>
