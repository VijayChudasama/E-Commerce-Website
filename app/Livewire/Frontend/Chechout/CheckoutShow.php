<?php

namespace App\Livewire\Frontend\Chechout;

use id;
use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\Orderitem;
use Illuminate\Support\Str;


class CheckoutShow extends Component
{

    public $carts, $totalProductAmount = 0;

    public $fullname, $phone, $email, $pincode, $address, $payment_mode = NULL, $payment_id = NULL;

    protected $listeners = [
        'validationForAll'
    ];

    public function validationForAll()
    {

    }


    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:11 | min:10',
            'pincode' => 'required|string|max:6|min:6',
            'address' => 'required|string|max:500',
        ];
    }
    public function placeOrder()
    {
        $this->validate();

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'funda-' . Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'in progress',
            'payment_mode' => $this->payment_mode,
            'payment_id'  => $this->payment_id,
        ]);

        foreach ($this->carts as $cartItem) {

            $orderItems = Orderitem::create([
                'ordet_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_color_id' => $cartItem->product_color_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price
            ]);


            if ($cartItem->product_color_id != NULL) {
                $cartItem->productColor()->where('id', $cartItem->prod_color_id)->decrement('quantity', $cartItem->quantity);
            } else {

                $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity', $cartItem->quantity);
            }
        }

        return  $order;
    }

    public function codOrder()
    {

        $this->payment_mode = 'Cash on Delivery';
        $codOrder = $this->placeOrder();
        if ($codOrder) {

            Cart::where('user_id', auth()->user()->id)->delete();

            session()->flash('message', 'Order Place Successfully');
            session()->flash('alert_message', 'Order Place Successfully');
            return redirect()->to('thank-You');
        } else {

            session()->flash('alert_message', 'Something Went Wrong');
            return false;
        }
    }

    public  function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem) {
            $this->totalProductAmount += $cartItem->product->selling_price * $cartItem->quantity;
        }
        return $this->totalProductAmount;
    }


    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;

        $this->phone = auth()->user()->userDetail->phone;
        $this->pincode = auth()->user()->userDetail->pin_code;
        $this->address = auth()->user()->userDetail->address;




        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.chechout.checkout-show', [
            'totalProductAmount' =>  $this->totalProductAmount
        ]);
    }
}
