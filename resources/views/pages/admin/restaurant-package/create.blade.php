@extends('layouts.admin.dashboard')

@section('dashboard-title', 'JKTGourmet - Dashboard')

@section('dashboard-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Restaurant Package</h1>
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
                <form action="{{ route('restaurant-package.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" name="location" placeholder="Location" value="{{ old('location') }}">
                    </div>

                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea name="about" rows="10" class="d-block w-100 form-control">{{ old('about') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="reservation">Reservation</label>
                        <input type="text" class="form-control" name="reservation" placeholder="Reservation" value="{{ old('reservation') }}">
                    </div>

                    <div class="form-group">
                        <label for="reservation_date">Reservation Date</label>
                        <input type="date" class="form-control" name="reservation_date" placeholder="Reservation Date" value="{{ old('reservation_date') }}">
                    </div>

                    <div class="form-group">
                        <label for="restaurant_type">Restaurant Type</label>
                        <input type="text" class="form-control" name="restaurant_type" placeholder="Restaurant Type" value="{{ old('restaurant_type') }}">
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" placeholder="Price" value="{{ old('price') }}">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Add</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection