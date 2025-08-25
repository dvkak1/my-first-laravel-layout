<!--
    This is what a nav-link component looks like if you want to create components
    for links on a layout page.
-->


<a {{ $attributes->merge(['class']) }}>{{ $slot }}</a>
