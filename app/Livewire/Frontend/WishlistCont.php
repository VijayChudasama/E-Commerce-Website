<?php

namespace App\Livewire\Frontend;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistCont extends Component
{
    public $wishlistCont;


    protected $listeners = ['WishlisAddedUpdated' => 'checkWishlistCount'];
    public function checkWishlistCount()
    {
        if(Auth::check()){
            return $this->wishlistCont = Wishlist::where("user_id", auth()->user()->id)->count();
        }else{
            return $this->wishlistCont = 0;
        }

    }
    public function render()
    {
        $this-> wishlistCont = $this->checkWishlistCount();
        return view('livewire.frontend.wishlist-cont', [
            'wishlistCont' => $this->wishlistCont
        ]);
    }
}
