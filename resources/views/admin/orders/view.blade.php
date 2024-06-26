@extends('layouts.admin')

@section('title', 'My Order Details')

@section('content')
    <div class="row">
        <div class="col-md-12">


            @if (session('message'))
                <div class="alert alert-success mb-3">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>My Orders Details</h3>
                </div>
                <div class="card-body">
                    <h4 class="text-primary">
                        {{-- <i class="fa fa-shopping-cart text-dark"></i> --}}
                        <h3>
                            My order Details
                            <a href="{{ url('admin/orders') }}" class="btn btn-danger btn-sm float-end mx-1"><span class="fa fa-arrow-left"></span>Back</a>
                            <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-primary btn-sm float-end mx-1">
                                <span class="fa fa-download"></span>Download Invoice
                            </a>
                            <a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank" class="btn btn-warning btn-sm float-end mx-1">
                                <span class="fa fa-eye"></span> View Invoice
                            </a>
                            <a href="{{ url('admin/invoice/'.$order->id.'/mail') }}"  class="btn btn-info btn-sm float-end mx-1">
                                <span class="fa fa-eye"></span> Send Invoice Via Mail
                            </a>
                        </h3>
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>order Details</h5>
                            <hr>
                            <h6>order Id: {{ $order->id }}</h6>
                            <h6>Tracking Id/No.: {{ $order->tracking_no }} </h6>
                            <h6>ordered Date: {{ $order->created_at->format('d-m-Y h:i A') }} </h6>
                            <h6>Payment mode: {{ $order->payment_mode }}</h6>

                            <h6 class="border p-2 text-success">
                                order Status Message: <span class="text-uppercase">{{ $order->status_message }}</span>
                            </h6>
                        </div>
                        <div class="col-md-6">
                            <h5>User Details</h5>
                            <hr>
                            <h6>Full Name: {{ $order->fullname }}</h6>
                            <h6>Email Id: {{ $order->email }}</h6>
                            <h6>Phone: {{ $order->phone }}</h6>
                            <h6>Address: {{ $order->address }}</h6>
                            <h6>Pin Code: {{ $order->pincode }} </h6>

                        </div>
                    </div>

                    <br />
                    <h5>order Items</h5>
                    <hr>
                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>Item Id</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>

                                </tr>
                            </thead>

                            @php
                                $totalPrice = 0;
                            @endphp




                            <tbody>
                                @foreach ($order->orderItems as $orderItem)
                                    <tr>
                                        <td width="10%">{{ $orderItem->id }}</td>
                                        <td width="10%">
                                            @if ($orderItem->product->productImages)
                                                <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                                                    style="width: 50px; height: 50px" alt="">
                                            @else
                                                <img src="" style="width: 50px; height: 50px" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            {{ $orderItem->product->name }}
                                            @if ($orderItem->productColor)
                                                @if ($orderItem->productColor->color)
                                                    <span>Color:
                                                        {{ $orderItem->productColor->color->name }}
                                                    </span>
                                                @endif
                                            @endif
                                        </td>

                                        <td width="10%">${{ $orderItem->price }}</td>
                                        <td width="10%">{{ $orderItem->quantity }}</td>
                                        <td width="10%" class="fw-bold">
                                            {{ $orderItem->quantity * $orderItem->price }}</td>


                                        @php
                                            $totalPrice += $orderItem->quantity * $orderItem->price;
                                        @endphp


                                    </tr>
                                @endforeach

                                <tr>
                                    <td colspan="5" class="fw-bold">Total Amount</td>
                                    <td colspan="1" class="fw-bold">${{ $totalPrice }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="card border mt-3">
                <div class="card-body">
                    <h4>Order Process (Order Status Updates)</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        <form action="{{ url('admin/orders/' . $order->id) }}" method="POST">

                            @csrf
                            @method('PUT')

                            <label>Update Your Order Status </label>
                            <div class="input-group">
                                <select name="order_status" class="form-select">
                                    <option value="">Select All Status</option>
                                    <option value="in progress"
                                        {{ Request::get('status') == 'in progress' ? 'selcted' : '' }}>In Progress</option>
                                    <option value="Completed" {{ Request::get('status') == 'Completed' ? 'selcted' : '' }}>
                                        Completed</option>
                                    <option value="Pending" {{ Request::get('status') == 'Pending' ? 'selcted' : '' }}>
                                        Pending</option>
                                    <option value="Cancelled" {{ Request::get('status') == 'Cancelled' ? 'selcted' : '' }}>
                                        Cancelled</option>
                                    <option value="Our-for-delivery"
                                        {{ Request::get('status') == 'Our-for-delivery' ? 'selcted' : '' }}>
                                        Our for delivery</option>
                                </select>


                                <button class="btn btn-primary text-white">Update</button>
                            </div>

                        </form>
                    </div>


                    <div class="col-md-7">
                        <br />
                        <h4 class="mt-3"> Current Order Status: <span
                                class="text-uppercase">{{ $order->status_message }}</span></h4>
                    </div>

                </div>
            </div>






        </div>
    </div>
@endsection
