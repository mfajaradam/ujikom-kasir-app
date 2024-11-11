@props(['active' => false])
<a {{ $attributes }} arial-current="{{ $active ? 'page' : false }}"
    class=" {{ $active ? 'nav-link active bg-dark text-white' : 'nav-link text-dark' }} text-sm">{{ $slot }}</a>
