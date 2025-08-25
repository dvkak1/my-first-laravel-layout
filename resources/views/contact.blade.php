<!--

    FYI, the x-layout component is defined in
    resources/views/components/layout.blade.php.

    To add a component in a file, you simple type <x-"component name"> in your
    blade file. You can also pass data to components as well.

--->


<x-layout>
     <x-slot:heading>
        Contact Page
    </x-slot:heading>
 <h1>Hello from the Contact page</h1>
</x-layout>
