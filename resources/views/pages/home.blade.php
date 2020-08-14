@extends('layouts.home')

@section('dashboard-title', 'JKTGourmet')

@section('dashboard-content')
    <!-- Header -->
    <header class="text-center">
        <h1>Explore Jakarta's <br> Finest Gourmet</h1>
        <p class="mt-3">Taste food you never <br> experienced before</p>
        <a href="#popular-heading" class="btn btn-get-started px-4 mt-4">Get Started</a>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Stats -->
        <div class="container">
            <section class="section-stats row justify-content-center" id="stats">
                <div class="col-3 col-md-2 stats-detail">
                    <h2>4K</h2>
                    <p>Restaurants</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>5K</h2>
                    <p>Regency</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>4K</h2>
                    <p>Exotic Food</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>2K</h2>
                    <p>Partners</p>
                </div>
            </section>
        </div>

        <!-- Popular Heading -->
        <section class="section-popular-heading" id="popular-heading">
            <div class="container">
                <div class="row">
                    <div class="col text-center popular-heading">
                        <h2>Wisata Popular</h2>
                        <p>Something that you never try <br> before in this world</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Popular Content -->
        <section class="section-popular-content" id="popular-content">
            <div class="container">
                <div class="section-popular-restaurant row justify-content-center">
                    @foreach ($items as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card-restaurant text-center d-flex flex-column" style="background-image: url('{{ $item->gallery->count() ? Storage::url($item->gallery->first()->image) : '' }}');">
                                <div class="restaurant-regency">{{ $item->title }}</div>
                                <div class="restaurant-district">{{ $item->location }}</div>
                                <div class="restaurant-button mt-auto">
                                    <a href="{{ route('detail', $item->slug) }}" class="btn btn-restaurant-details px-4">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Partners -->
        <section class="section-partners" id="partners">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Our Partners</h2>
                        <p>Companies are trusted us <br> more than just a diner</p>
                    </div>
                    <div class="col-md-8 text-center">
                        <img src="{{ url('frontend/images/partners.png') }}" alt="Partners" class="partners">
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonial Heading -->
        <section class="section-testimonial-heading" id="testimonial-heading">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>They Are Loving Us</h2>
                        <p>Moments were giving them <br> the best experience</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonial Content -->
        <section class="section section-testimonial-content" id="testimonial-content">
            <div class="container">
                <div class="section-popular-restaurant row justify-content-center">
                    <!-- Testimonial 1 -->
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="{{ url('frontend/images/profile.png') }}" alt="User" class="mb-4 rounded-circle">
                                <h3 class="mb-4">Jane Doe</h3>
                                <p class="testimonial">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ullamcorper nec magna nec, ullamcorper molestie lectus."</p>
                            </div>
                            <hr>
                            <p class="dine-at mt-2">Dine at Sumire Grand Hyatt</p>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="{{ url('frontend/images/profile.png') }}" alt="User" class="mb-4 rounded-circle">
                                <h3 class="mb-4">Jane Doe</h3>
                                <p class="testimonial">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ullamcorper nec magna nec, ullamcorper molestie lectus."</p>
                            </div>
                            <hr>
                            <p class="dine-at mt-2">Dine at Sumire Grand Hyatt</p>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="{{ url('frontend/images/profile.png') }}" alt="User" class="mb-4 rounded-circle">
                                <h3 class="mb-4">Jane Doe</h3>
                                <p class="testimonial">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ullamcorper nec magna nec, ullamcorper molestie lectus."</p>
                            </div>
                            <hr>
                            <p class="dine-at mt-2">Dine at Sumire Grand Hyatt</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">I Need Help</a>
                        <a href="{{ route('register') }}" class="btn btn-get-started px-4 mt-4 mx-1">Get Started</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection