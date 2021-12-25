@extends('user.layouts.app')
@section('content')
    <ol class="breadcrumb" style="background-color: aliceblue; font-size: 15px; border-radius: 15px">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">{{$page_name}}</li>
    </ol>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>{{$page_name}}</h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="{{ route('bookorders.create') }}" class="btn btn-primary">Complete Orders</a>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Order Date</th>
                                    <th>Shiping Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $i=>$order)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ date('d-M-Y', strtotime($order->created_at)) }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>
                                            @if($order->process_status == '0')
                                                <span style="font-size: 12px" class="label bg-red">Pending</span>
                                            @elseif($order->process_status == '1')
                                                <span style="font-size: 12px" class='label bg-green'>Received</span>
                                            @elseif($order->process_status == '2')
                                                <span style="font-size: 12px" class='label bg-blue'>Processing</span>
                                            @elseif($order->process_status == '3')
                                                <span style="font-size: 12px" class='label bg-green'>Delivered</span>
                                            @else
                                                <span style="font-size: 12px" class='label bg-red'>Canceled</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('userbook-orders.show', $order->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    $('select').selectpicker();
@endsection
