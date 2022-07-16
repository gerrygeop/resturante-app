<div>
   <div class="mb-6">
      <x-label for="name" :value="__('Name')" />
      <x-input type="text" class="block mt-1 w-full" id="name" name="name" :value="old('name', $menu->name)" required
         autofocus />

      @error('name')
         <p class="mt-1 text-xs text-red-500 italic">{{ $message }}</p>
      @enderror
   </div>

   <div class="mb-6">
      <x-label for="description" :value="__('Description')" />
      <x-textarea class="block mt-1 w-full" id="description" name="description" rows="4">
         {{ old('description', $menu->description) }}</x-textarea>

      @error('description')
         <p class="mt-1 text-xs text-red-500 italic">{{ $message }}</p>
      @enderror
   </div>

   <div class="mb-6">
      <x-label for="price" :value="__('Price')" />
      <x-input type="text" class="block mt-1 w-full" id="price" name="price" min="0.00" max="10000.00"
         step="0.01" :value="old('price', $menu->price)" required />

      @error('price')
         <p class="mt-1 text-xs text-red-500 italic">{{ $message }}</p>
      @enderror
   </div>

   <div class="mb-6">
      <x-label for="categories" :value="__('Categories')" />
      <select name="categories[]" id="categories" multiple class="block mt-1 w-full select-option">
         @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected($menu->categories->contains($category))>
               {{ $category->name }}
            </option>
         @endforeach
      </select>

      @error('categories')
         <p class="mt-1 text-xs text-red-500 italic">{{ $message }}</p>
      @enderror
   </div>

   <div class="mb-8">
      <x-label for="image" :value="__('Image')" />
      <x-input-file class="block mt-1 w-full" id="image" name="image" :value="old('image', $menu->image)" />

      @error('image')
         <p class="mt-1 text-xs text-red-500 italic">{{ $message }}</p>
      @enderror
   </div>

   <div class="flex items-center justify-end">
      <button type="submit" class="btn btn--primary">Submit</button>
   </div>
</div>
