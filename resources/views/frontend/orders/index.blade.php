@extends('layouts.app')

@section('title', 'Thank You for Shopping')


<style>
    .page-item.active .page-link{
          background-color: {{ $appSetting->color ?? ' ' }}
    }
</style>
@section('content')
    <div class="py-3 pyt-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="mp-4">My Orders</h4>
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

                                            <td><a href="{{ url('orders/' . $item->id) }}"  class="btn btn-sm"
                                                    style="background-color:{{ $appSetting->color ?? ' ' }}">View</a></td>
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
    </div>



@endsection
