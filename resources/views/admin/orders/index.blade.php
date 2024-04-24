@extends('layouts.admin')

@section('title', 'My Orders')

@section('content')

    <style>select {
        --selectHoverCol:{{ $appSetting->color ?? ' ' }};
        --selectedCol:{{ $appSetting->color ?? ' ' }};
        width: 100%;
        font-size: 1em;
        padding: 0.3em;

      }

      select:focus {
        border-radius: 0px;
        border-color: rgb(7, 7, 7);
        background: #fff;
        outline: none;
      }

      .select-wrap {
        position: relative;
      }

      .select-wrap:focus-within select {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 10;
      }

      option:hover {
        background-color: var(--selectHoverCol);
        color: #fff;
      }

      option:checked {
        box-shadow: 0 0 1em 100px var(--selectedCol) inset;
      }
    </style>


    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3>My Orders</h3>
                </div>
                <div class="card-body">

                    <form action="" method="GET">

                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Filter By Date</label>
                                <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}"
                                    class="form-control" />
                            </div>
                            <div class="col-md-3">
                                <label for="">Filter By Status</label>
                                <select class="selectHovercolor" name="status" >
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
                            </div>
                            <div class="col-md-6">
                                <br />
                                <button type="submit" class="btn">Filter</button>
                            </div>
                        </div>
                    </form>

                    <hr>





                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>Oreder ID</th>
                                    <th>Tracking NO</th>
                                    <th>Username</th>
                                    <th>Payment Mode</th>
                                    <th>Ordered Date</th>
                                    <th>Status Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($orders as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>{{ $item->fullname }}</td>
                                        <td>{{ $item->payment_mode }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->status_message }}</td>

                                        <td><a href="{{ url('admin/orders/' . $item->id) }}" class="btn btn-sm">View</a>
                                        </td>
                                    </tr>
                                @empty

                                    <tr>
                                        <td colspan="7">No Orders Available </td>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                        <div>
                            {{ $orders->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
