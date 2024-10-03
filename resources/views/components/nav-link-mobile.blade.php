<a {{ $attributes }} 
    class="{{ $active ? 'bg-blue-500 text-white' : 'text-gray-300 hover:bg-blue-600
    hover:text-white'}} block rounded-md px-3 py-2 text-base font-medium " 
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>