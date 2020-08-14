@extends('layouts.success')

@section('success-title', 'Checkout Success')

@section('success-content')
    <main>
        <div class="section-success d-flex align-items-center">
            <div class="col text-center">
                <img src="{{ url('https://image.flaticon.com/icons/svg/1034/1034257.svg') }}" alt="">
                <h1 class="mt-5">Yay! Success</h1>
                <p>We've sent you email for trip instruction <br> please read it as well</p>
                <a href="{{ route('home') }}" class="btn btn-home-page mt-3 px-5">Home Page</a>
            </div>
        </div>
    </main>
@endsection