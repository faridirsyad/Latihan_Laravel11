@props(['active' => false])

<a 
    class="{{ $active ? 'bg-blue-500 text-white' : 'text-gray-300 hover:bg-blue-600
    hover:text-white'}} rounded-md px-3 py-2 text-sm font-medium " aria-current="{{ $active ? 'page' : false }}" {{ $attributes }}>{{ $slot }}</a>
