<div class="w-1/3 rounded-lg flex items-center justify-center p-4 shadow-md
    {{ $cartAmount > 0 ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13a2 2 0 100 4 2 2 0 000-4m10 0a2 2 0 100 4 2 2 0 000-4"/>
    </svg>
    <span class="ml-2 font-semibold text-lg">Cart ({{ $cartAmount }})</span>
</div>
