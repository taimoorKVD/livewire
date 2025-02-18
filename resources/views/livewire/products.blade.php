<div class="relative">
    <div wire:loading class="absolute inset-0 flex justify-center items-center bg-white bg-opacity-80 z-50">
        <div class="flex flex-col space-y-4 w-full max-w-5xl p-5">
            @for ($i = 0; $i < 6; $i++)
                <div class="flex space-x-4 animate-pulse">
                    <div class="flex-1 space-y-3">
                        <div class="h-6 bg-gray-300 rounded w-3/4"></div>
                        <div class="h-5 bg-gray-300 rounded w-1/2"></div>
                        <div class="h-4 bg-gray-300 rounded w-full"></div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
    @if ($products->isEmpty())
        <div wire:loading.remove class="flex flex-col items-center justify-center text-center py-10">
            <svg class="w-16 h-16 text-gray-400 mb-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M9 12h6"></path>
                <path d="M12 9v6"></path>
            </svg>
            <h2 class="text-2xl font-semibold text-gray-700">No Products Found</h2>
            <p class="text-gray-500 mt-2">Try adjusting your filters or check back later for new products.</p>
            <button wire:click="resetFilters"
                    class="mt-4 px-6 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition-all duration-300">
                Reset Filters
            </button>
        </div>
    @else
        <div wire:loading.remove class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-6">
            @foreach($products as $product)
                <div
                    class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <a href="#">
                        <img src="https://picsum.photos/{{$loop->index}}00?blur" alt="Product Image"
                             class="w-full h-52 object-cover" loading="lazy" decoding="async">
                    </a>
                    <div class="p-5">
                        <a href="#" class="text-xl font-semibold text-indigo-600 hover:underline block">
                            {{ $product->name }}
                        </a>
                        <h5 class="text-lg font-bold text-gray-700 mt-2">$ {{ number_format($product->price, 2) }}</h5>
                        <p class="text-gray-600 mt-2">{{ Str::limit($product->description, 100) }}</p>

                        <div class="mt-4 border-t pt-4">
                            @if (! in_array($product->id, $cartProducts))
                                <a wire:click.prevent="addOrRemoveFromCart({{ $product->id }})"
                                   class="block w-full text-center bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 rounded-lg transition-all duration-300"
                                   href="#">
                                    Add to Cart
                                </a>
                            @else
                                <a wire:click.prevent="addOrRemoveFromCart({{ $product->id }})"
                                   class="block w-full text-center bg-red-500 hover:bg-red-600 text-white font-medium py-2 rounded-lg transition-all duration-300"
                                   href="#">
                                    Remove from Cart
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div wire:loading.remove class="mt-6">
            {{ $products->links() }}
        </div>
    @endif
</div>
