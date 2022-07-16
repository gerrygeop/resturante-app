<div>
   <div class="mb-6">
      <x-label for="name" :value="__('Name')" />
      <x-input type="text" class="block mt-1 w-full" id="name" name="name" :value="old('name', $category->name)" required
         autofocus />

      @error('name')
         <p class="mt-1 text-xs text-red-500 italic">{{ $message }}</p>
      @enderror
   </div>

   <div class="mb-6">
      <x-label for="description" :value="__('Desc')" />
      <x-textarea class="block mt-1 w-full" id="description" name="description" rows="4">
         {{ old('description', $category->description) }}</x-textarea>

      @error('description')
         <p class="mt-1 text-xs text-red-500 italic">{{ $message }}</p>
      @enderror
   </div>

   <div class="mb-8">
      <x-label for="image" :value="__('Image')" />

      <div class="flex items-center mt-1">
         @if ($category->image)
            <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}"
               class="w-20 h-20 mr-4 rounded-md">
         @endif

         <x-input-file class="block w-full" id="image" name="image" :value="old('image', $category->image)" />
      </div>

      @error('image')
         <p class="mt-1 text-xs text-red-500 italic">{{ $message }}</p>
      @enderror
   </div>

   <div class="flex items-center justify-end">
      <button type="submit" class="btn btn--primary">Submit</button>
   </div>
</div>
