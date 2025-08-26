<!--
    This is what a nav-link component looks like if you want to create components
    for links on a layout page.

    For screenwriters, do not forget to type in aria-current for accessibility. #

    aria-current="page" means the link is the current page.

    Attributes represent HTML attributes like class, style, etc

    //@ props (merge these together) is a Blade directive that allows you to define the properties your component accepts.
    In layman's term, it specifies which variables are passed to the component and can be used within it.

    Some ways you can put props to use is by assigning default values to props and in this case we want to render
    an anchor tag or button tag based on the type of link we want to create.
-->

@props(['active' => false, 'type' => 'a' || 'button'])

<!--
The following is how to use types in props to render different HTML elements.

NOTE: Try to play around with the code by commenting and uncommenting the code below.

The first way is to use conditional statements like the code below:

-->

{{-- <-?php if ($type === 'a'): ?>
<a class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white'}} rounded-md  px-3 py-2 text-sm font-medium"
 aria-current="{{ $active ? 'page': 'false' }}" {{ $attributes }}>
    {{ $slot }}</a>
<-?php else :  ?>
<button class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white'}} rounded-md  px-3 py-2 text-sm font-medium"
 aria-current="{{ $active ? 'page': 'false' }}" {{ $attributes }}>
    {{ $slot }}</button>
<-?php endif; ?> --}}

<!--Another way is to code it like this -->

@if($type === 'a')
<a class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white'}} rounded-md  px-3 py-2 text-sm font-medium"
 aria-current="{{ $active ? 'page': 'false' }}" {{ $attributes }}
>
    {{ $slot }}</a>
@else
<button
 class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white'}} rounded-md  px-3 py-2 text-sm font-medium"
 aria-current="{{ $active ? 'page': 'false' }}" {{ $attributes }}
>
    {{ $slot }}</button>
@endif
