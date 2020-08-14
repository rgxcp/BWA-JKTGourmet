@extends('layouts.admin.dashboard')

@section('dashboard-title', 'JKTGourmet - Dashboard')

@section('dashboard-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Transaction Detail - {{ $item->user->name }}</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-shadow">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $item->id }}</td>
                    </tr>
                    <tr>
                        <th>Restaurant</th>
                        <td>{{ $item->restaurant_package->title }}</td>
                    </tr>
                    <tr>
                        <th>User</th>
                        <td>{{ $item->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Additional Price</th>
                        <td>Rp {{ $item->additional_price }}</td>
                    </tr>
                    <tr>
                        <th>Transaction Total</th>
                        <td>Rp {{ $item->transaction_total }}</td>
                    </tr>
                    <tr>
                        <th>Transaction Status</th>
                        <td>{{ $item->transaction_status }}</td>
                    </tr>
                    <tr>
                        <th>Buyers</th>
                        <td>
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Date Reservation</th>
                                </tr
                                @foreach ($item->transaction_detail as $detail)
                                    <tr>
                                        <td>{{ $detail->id }}</td>
                                        <td>{{ $detail->username }}</td>
                                        <td>{{ $detail->date_reservation }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection