
<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

<div class="space-y-4">
    @foreach ( $jobs as $job )
               <a href="/jobs/{{$job['id']}}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                  <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>

                  <div>
                    <strong>{{$job->title}}:</strong> Pays {{$job['salary']}} per  year.
                  </div>
               </a>
    @endforeach


    {{--
      This line of code adds an element that allows you to select a collection of data in sections called pages.
      This is cool because Laravel in this case assumes, you are using Tailwind.

      Let's publish Pagination with the use of the following command in our CMD terminal. Simply type:
      php artisan vendor:publish

      The reason we are publishing Pagination is so we can be able to manually edit.

      Upon entering the artisan command, this is shown in the terminal.

        All providers and tags ........................................................................................... 0
        Provider: Barryvdh\Debugbar\ServiceProvider ...................................................................... 1
        Provider: Illuminate\Foundation\Providers\FoundationServiceProvider .............................................. 2
        Provider: Illuminate\Mail\MailServiceProvider .................................................................... 3
        Provider: Illuminate\Notifications\NotificationServiceProvider ................................................... 4
        Provider: Illuminate\Pagination\PaginationServiceProvider ........................................................ 5
        Provider: Laravel\Sail\SailServiceProvider ....................................................................... 6
        Provider: Laravel\Tinker\TinkerServiceProvider ................................................................... 7
        Tag: config ...................................................................................................... 8
        Tag: laravel-errors .............................................................................................. 9
        Tag: laravel-mail ............................................................................................... 10
        Tag: laravel-notifications ...................................................................................... 11
        Tag: laravel-pagination ......................................................................................... 12
        Tag: sail ....................................................................................................... 13
        Tag: sail-bin ................................................................................................... 14
        Tag: sail-database .............................................................................................. 15
        Tag: sail-docker ................................................................................................ 16

    Select(type) 5 and you will see this message.

     Copying directory
     [C:\laragon\www\example\vendor\laravel\framework\src\Illuminate\Pagination\resources\views] to
     [C:\laragon\www\example\resources\views\vendor\pagination]
     DONE

    Laravel supports multiple front end frameworks especially Tailwind and Bootstrap.

    --}}
    <div>
        {{ $jobs->links() }}
    </div>

 </div>

</x-layout>
