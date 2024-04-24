<?php

namespace App\Livewire\Frontend;

use App\Models\Wishlist;
use Livewire\Component;

class WishlistShow extends Component
{

    public function removeWishlistItem(int $wishliastId)
    {
        Wishlist::where('user_id', auth()->user()->id)->where('id', $wishliastId)->delete();
        $this->dispatch('WishlisAddedUpdated');
        $this->dispatch([
            'text' => 'Wishlist Item Remove successfully',
            'type' => 'success',
            'status' => 200
        ]);

    }
    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show', [
            'wishlist' => $wishlist
        ]);
    }
}
