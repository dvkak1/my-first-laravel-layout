
<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

<ul>
    @foreach ( $jobs as $job )
            <li>
               <a href="/jobs/{{$job['id']}}">
                  <strong> {{$job['title']}} pays {{$job['salary']}} per year</strong>
               </a>
            </li>
    @endforeach
 </ul>

</x-layout>
