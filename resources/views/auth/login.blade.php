<x-layout>
    <x-slot:heading>
        Log In
    </x-slot:heading>


    {{--
    The number one most important thing to know when you start learning how to do forms in your first Laravel
    app is the following: --
    1. How to submit a form
    2. What is CSRF
    3. Access request attributes
    4. Fillable vs guarded fields
    --}}
<form method="POST" action="/login">
  @csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
         <x-form-field>
          <x-form-label for="email">Email</x-form-label>
          <div class="mt-2">
            {{-- Want to save old values in your textboxes? Do this by adding old() in value="" --}}
              <x-form-input name="email" id="email"  type="email" :value="old('email')" required/>
              <x-form-error name="email"></x-form-error>
          </div>
        </x-form-field>

        <x-form-field>
          <x-form-label for="password">Password</x-form-label>
          <div class="mt-2">
              <x-form-input name="password" id="password"  type="password"  :value="old('password')" required/>
              <x-form-error name="password"></x-form-error>
          </div>
        </x-form-field>
        </div>
    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
    <x-form-button>Log In</x-form-button>
  </div>
</form>

</x-layout>
