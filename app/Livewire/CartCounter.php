<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Attributes\On;
use Livewire\Component;

class CartCounter extends Component
{
    public function render()
    {
        return view('livewire.cart-counter', [
            'cartAmount' => Cart::count(),
        ]);
    }

    #[On('updateCart')]
    public function refreshComponent(): void
    {
        $this->dispatch('$refresh');
    }
}
