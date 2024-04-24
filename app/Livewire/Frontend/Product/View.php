<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\product;
use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity, $quantityCount = 1, $productColorId , $productColor;

    function addToWishList($productId)
    {
        // dd($productId);
        if (Auth::check()) {

            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {

                session()->flash('message', 'Already Added to Wishlist');
                return false;
            } else {

                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                ]);
                $this->dispatch('WishlisAddedUpdated');
                session()->flash('message', 'Wishlist Added successfully');
            }
        } else {

            session()->flash('message', 'Please Login to continue');
            return false;
        }
    }
    public function colorSelected($productColorId)
    {
        //    dd($productcolorId);
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;

        if ($this->prodColorSelectedQuantity == 0)
            $this->prodColorSelectedQuantity = 'outofStock';
    }

    function incrementQuantity()
    {
        if ($this->quantityCount < 10) {

            $this->quantityCount++;
        }
    }
    function decrementQuantity()
    {
        if ($this->quantityCount > 1) {

            $this->quantityCount--;
        }
    }







    function addToCard(int $productId)
    {
        if (Auth::check())
        {
                // dd($productId);
                if($this->product->where('id',$productId)->where('status','0')->exists())
                {
                    // check for product color quantity amnd add to card
                    if($this->product->productColors()->count() > 1)
                    {
                            if( $this->prodColorSelectedQuantity != NULL)
                            {

                                if(Cart::where('user_id',auth()->user()->id)
                                ->where('product_id', $productId)
                                ->where('product_color_id', $this->productColorId)
                                ->exists())
                            {
                                session()->flash('message', 'Product Already Added');
                                return false;
                            }
                            else
                            {

                                $productColor = $this->product->productColors()->where('id',$this->productColorId)->first();
                                if($productColor->quantity > 0)
                                {
                                    if ($productColor->quantity > $this->quantityCount)
                                    {
                                        // Insert Product to card
                                        Cart::create([
                                            'user_id' =>  auth()->user()->id,
                                            'product_id' => $productId,
                                            'product_color_id' => $this->productColorId,
                                            'quantity' => $this->quantityCount
                                        ]);
                                        $this->dispatch('CartAddedUpdated');
                                        session()->flash('message' , 'Product Added To Card');
                                        return false;
                                    }
                                    else
                                    {
                                        session()->flash('message', 'Only '.$productColor->quantity.' Quantity Available');
                                        return false;
                                    }
                                }
                                else
                                {
                                    session()->flash('message', 'Out of Stock');
                                return false;
                                }
                            }


                        }
                            else
                            {
                                session()->flash('message', 'Select Your Product Color');
                                return false;
                            }
                    }
                    else
                    {

                        if(Cart::where('user_id',auth()->user()->id)->where('product_id', $productId)->exists())
                        {
                            session()->flash('message', 'Already Added');
                            return false;
                        }
                        else
                        {
                            if ($this->product->quantity > 0)
                            {
                                if ($this->product->quantity > $this->quantityCount)
                                {
                                        Cart::create([
                                            'user_id' =>  auth()->user()->id,
                                            'product_id' => $productId,
                                            'quantity' => $this->quantityCount

                                        ]);

                                        $this->dispatch('CartAddedUpdated');
                                        session()->flash('message' , 'Product Added To Card');
                                        return false;
                                }
                                else
                                {
                                    session()->flash('message', 'Only '.$this->product->quantity.' Quantity Available',);
                                    return false;
                                }
                            }
                            else
                            {
                                session()->flash('message', 'Out of stock');
                                return false;
                            }
                        }

                    }

                }
                else
                {
                    session()->flash('message', 'product Does not exists');
                     return false;
                }
        }
        else
        {
            session()->flash('message', 'please Login to add to card');
            return false;
        }
    }














    public function mount($category, $product)
    {
        $this->category = $category;
        $this->category = $product;
    }
    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
