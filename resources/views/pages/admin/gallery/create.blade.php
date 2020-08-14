@extends('layouts.admin.dashboard')

@section('dashboard-title', 'JKTGourmet - Dashboard')

@section('dashboard-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Restaurant Gallery</h1>
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
                <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="restaurant_packages_id">Restaurant Package</label>
                        <select name="restaurant_packages_id" required class="form-control">
                            <option value="">Select Restaurant Package</option>
                            @foreach ($restaurant_packages as $restaurant_package)
                                <option value="{{ $restaurant_package->id }}">
                                    {{ $restaurant_package->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" placeholder="image" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Add</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection