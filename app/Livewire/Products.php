<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use App\Models\{Cart, Product};
use Livewire\Attributes\{On, Url};
use Livewire\{Component, WithPagination};

class Products extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    protected $queryString = [
        'selected.prices' => ['as' => 'prices', 'except' => []],
        'selected.categories' => ['as' => 'categories', 'except' => []],
        'selected.manufacturers' => ['as' => 'manufacturers', 'except' => []],
        'page' => ['except' => 1],
    ];

    public array $cartProducts = [];

    #[Url]
    public array $selected = [
        'prices' => [],
        'categories' => [],
        'manufacturers' => []
    ];

    public function render(): View
    {
        $products = Product::withFilters(
            $this->selected['prices'],
            $this->selected['categories'],
            $this->selected['manufacturers'],
        )->paginate(6);

        $this->cartProducts = Cart::pluck('product_id')->unique()->toArray();

        return view('livewire.products', compact('products'));
    }

    #[On('updatedSidebar')]
    public function setSelected($selected): void
    {
        $this->selected = $selected;
    }

    public function addOrRemoveFromCart(int $productId): void
    {
        if (in_array($productId, $this->cartProducts, true)) {
            Cart::where(['product_id' => $productId])->delete();

            unset($this->cartProducts[$productId]);
        } else {
            Cart::create(['product_id' => $productId]);

            $this->cartProducts[] = $productId;
        }

        $this->dispatch('updateCart');
    }

    public function updatingSelected()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->selected = [
            'prices' => [],
            'categories' => [],
            'manufacturers' => []
        ];

        $this->resetPage();
    }
}
