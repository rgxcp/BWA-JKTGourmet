@extends('layouts.detail')

@section('detail-title', 'Restaurant Detail')

@section('detail-content')
    <main>
        <!-- Details Heading -->
        <section class="section-details-heading"></section>

        <!-- Details Content -->
        <section class="section-details-content">
            <div class="container">
                <!-- Top Content -->
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Restaurant</li>
                                <li class="breadcrumb-item active">Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- Bottom Content -->
                <div class="row">
                    <!-- Left Content -->
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <!-- Restaurant Info -->
                            <h1>{{ $item->title }}</h1>
                            <p>{{ $item->location }}</p>

                            <!-- Restaurant Gallery -->
                            @if ($item->gallery->count())
                                <div class="gallery">
                                    <div class="xzoom-container">
                                        <img src="{{ Storage::url($item->gallery->first()->image) }}" alt="{{ $item->title }}" class="xzoom" id="xzoom-default" xoriginal="{{ Storage::url($item->gallery->first()->image) }}">
                                    </div>
                                    <div class="xzoom-thumbs">
                                        @foreach ($item->gallery as $gallery)
                                            <a href="{{ Storage::url($gallery->image) }}">
                                                <img src="{{ Storage::url($gallery->image) }}" alt="" class="xzoom-gallery" width="128" xpreview="{{ Storage::url($gallery->image) }}">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <!-- Restaurant Detail -->
                            <h2>About Restaurant</h2>
                            <p>{!! $item->about !!}</p>
                            
                            <!-- Restaurant Features -->
                            <div class="features row">
                                <div class="col-md-4">
                                    <img src="{{ url('frontend/images/content.png') }}" alt="Content" class="features-image">
                                    <div class="description">
                                        <h3>Reservation</h3>
                                        <p>{{ $item->reservation }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img src="{{ url('frontend/images/content.png') }}" alt="Content" class="features-image">
                                    <div class="description">
                                        <h3>Restaurant Type</h3>
                                        <p>{{ $item->restaurant_type }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                    <img src="{{ url('frontend/images/content.png') }}" alt="Content" class="features-image">
                                    <div class="description">
                                        <h3>Price</h3>
                                        <p>{{ $item->price }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Content -->
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <!-- Members -->
                            <h2>Members Are Going</h2>
                            <div class="members my-2">
                                <img src="{{ url('frontend/images/profile.png') }}" alt="" class="members-image mr-1">
                                <img src="{{ url('frontend/images/profile.png') }}" alt="" class="members-image mr-1">
                                <img src="{{ url('frontend/images/profile.png') }}" alt="" class="members-image mr-1">
                                <img src="{{ url('frontend/images/profile.png') }}" alt="" class="members-image mr-1">
                            </div>

                            <!-- Information -->
                            <hr>
                            <h2>Restaurant Information</h2>
                            <table class="restaurant-information">
                                <tr>
                                    <th width="50%">Available Date</th>
                                    <td width="50%" class="text-right">{{ \Carbon\Carbon::create($item->reservation_date)->format('F n, Y') }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Type</th>
                                    <td width="50%" class="text-right">{{ $item->restaurant_type }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Price</th>
                                    <td width="50%" class="text-right">Rp {{ $item->price }}/person</td>
                                </tr>
                            </table>
                        </div>

                        <!-- Button -->
                        <div class="join-now-container">
                            @auth
                                <form action="{{ route('checkout-process', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">Join Now</button>
                                </form>
                            @endauth
                            @guest
                                <a href="{{ route('login') }}" class="btn btn-block btn-join-now mt-3 py-2">Login or Register to Join</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.xzoom, .xzoom-gallery').xzoom({
                tint: '#333',
                title: false,
                zoomWidth: 500,
                Xoffset: 15
            });
        });
    </script>
@endpush