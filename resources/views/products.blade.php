<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
                {{ __('Products List') }}
            </h2>

            <livewire:cart-counter/>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-lg p-6">
                <div class="flex flex-col md:flex-row gap-6">
                    <!-- Sidebar -->
                    <div class="md:w-1/4 w-full">
                         <livewire:sidebar/>
                    </div>

                    <!-- Product Listing -->
                    <div class="md:w-3/4 w-full">
                        <livewire:products/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
