<?php

namespace App\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart , $totalPrice = 0;


    function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData)
         {
            $cartData->decrement('quantity');

            session()->flash('alert', 'Decrement Quantity Updated');
            return false;

            // session()->flash('message',' Quantity Updated');


        }
        else{

            session()->flash('alert', 'Something Went Wron');
            return false;

        }
    }
    function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData)
         {
            $cartData->increment('quantity');

            session()->flash('alert', 'Increment Quantity Updated');
            return false;

            // session()->flash('message',' Quantity Updated');


        }
        else{

            session()->flash('alert', 'Something Went Wron');
            return false;

        }
    }





    public $CartRemoveData;

    function removeCartItem(int $cartId)
    {
        $CartRemoveData = Cart::where('user_id', auth()->user()->id)->where('id',$cartId)->first();
        if($CartRemoveData){
            $CartRemoveData->delete();


            $this->dispatch('CartAddedUpdated');
            session()->flash('alert' , 'Cart Item Remove Successfully');
            return false;
        }
        else{

            session()->flash('alert' , 'Something Went Wrong');
            return false;
        }
    }















    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart
        ]);
    }
}
