<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Filters</h2>
    <div class="mb-6">
        <h3 class="text-lg font-medium text-gray-700 border-b pb-2 mb-3">Price</h3>
        @foreach($prices as $index => $price)
            <label for="price{{ $index }}" class="flex items-center space-x-2 text-gray-700 hover:text-indigo-600 cursor-pointer">
                <input type="checkbox" id="price{{ $index }}" value="{{ $index }}"
                       wire:model.live="selected.prices"
                       class="rounded border-gray-300 focus:ring-indigo-500">
                <span>{{ $price['name'] }} ({{ $price['products_count'] }})</span>
            </label>
        @endforeach
    </div>
    <div class="mb-6">
        <h3 class="text-lg font-medium text-gray-700 border-b pb-2 mb-3">Categories</h3>
        @foreach($categories as $index => $category)
            <label for="category{{ $index }}" class="flex items-center space-x-2 text-gray-700 hover:text-indigo-600 cursor-pointer">
                <input type="checkbox" id="category{{ $index }}" value="{{ $category->id }}"
                       wire:model.live="selected.categories"
                       class="rounded border-gray-300 focus:ring-indigo-500">
                <span>{{ $category['name'] }} ({{ $category['products_count'] }})</span>
            </label>
        @endforeach
    </div>
    <div>
        <h3 class="text-lg font-medium text-gray-700 border-b pb-2 mb-3">Manufacturers</h3>
        @foreach($manufacturers as $index => $manufacturer)
            <label for="manufacturer{{ $index }}" class="flex items-center space-x-2 text-gray-700 hover:text-indigo-600 cursor-pointer">
                <input type="checkbox" id="manufacturer{{ $index }}" value="{{ $manufacturer->id }}"
                       wire:model.live="selected.manufacturers"
                       class="rounded border-gray-300 focus:ring-indigo-500">
                <span>{{ $manufacturer['name'] }} ({{ $manufacturer['products_count'] }})</span>
            </label>
        @endforeach
    </div>
</div>
