<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>


    {{--
    The number one most important thing to know when you start learning how to do forms in your first Laravel
    app is the following: --
    1. How to submit a form
    2. What is CSRF
    3. Access request attributes
    4. Fillable vs guarded fields
    --}}
<form method="POST" action="/jobs">
  @csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base/7 font-semibold text-gray-900">Create A New Job</h2>
      <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">
               <input id="title" type="text" name="title" placeholder="Shift Leader" class="block min-w-0 grow bg-white py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" required/>
              </div>
             @error('title')
              <p class="text-xs text-red-500 font-semibold ml-1">{{ $message }}</p>
             @enderror
            </div>
          </div>
        </div>

          <div class="sm:col-span-4">
          <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
              <div class="shrink-0 text-base text-gray-500 select-none sm:text-sm/6">
               <input id="salary" type="salary" name="salary" placeholder="PHP 50,000 per year" class="block min-w-0 grow bg-white py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" required/>
              </div>
            @error('salary')
              <p class="text-xs text-red-500 font-semibold ml-1">{{ $message }}</p>
            @enderror
            </div>
          </div>
        </div>


      </div>
      {{-- <div class="mt-10">
      {{--
          This is how you code a validator on your Laravel code
       --}}
         {{-- @if($errors->any())
          <ul>
            @foreach($errors->all() AS $error)
            <li class="text-red-500 italic">{{ $error }}</li>
            @endforeach
          </ul>
        @endif
       </div> --}}
    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
  </div>
</form>

</x-layout>
