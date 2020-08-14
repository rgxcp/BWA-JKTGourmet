@extends('layouts.checkout')

@section('checkout-title', 'Checkout')

@section('checkout-content')
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
                                <li class="breadcrumb-item">Details</li>
                                <li class="breadcrumb-item active">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- Bottom Content -->
                <div class="row">
                    <!-- Left Content -->
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Header Info -->
                            <h1>Who is going?</h1>
                            <p>Dine at {{ $item->restaurant_package->title }}, {{ $item->restaurant_package->location }}</p>

                            <!-- Members Info -->
                            <div class="attendee">
                                <table class="table table-responsive-sm text-center">
                                    <thead>
                                        <tr>
                                            <td>Picture</td>
                                            <td>Name</td>
                                            <td>Payment</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item->transaction_detail as $detail)
                                            <tr>
                                                <td><img src="http://ui-avatars.com/api/?name={{ $detail->username }}" class="rounded-circle" height="50px"></td>
                                                <td class="align-middle">{{ $detail->username }}</td>
                                                <td class="align-middle">Credit Card</td>
                                                <td class="align-middle">
                                                    <a href="{{ route('checkout-remove', $detail->id) }}">
                                                        <img src="{{ url('https://image.flaticon.com/icons/svg/271/271203.svg') }}" alt="" height="15px">
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No Visitor</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Add Members -->
                            <div class="members mt-3">
                                <h2>Add Member</h2>
                                <form action="{{ route('checkout-create', $item->id) }}" class="form-inline" method="POST">
                                    @csrf
                                    <label for="username" class="sr-only">Name</label>
                                    <input type="text" name="username" id="username" class="form-control mb-2 mr-sm-2" placeholder="Username">
                                    <!--
                                    <label for="input_visa" class="sr-only">VISA</label>
                                    <select name="input_visa" id="input_visa" class="custom-select mb-2 mr-sm-2">
                                        <option value="VISA" selected>VISA</option>
                                        <option value="30 Days">30 Days</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                    -->
                                    <label for="date_reservation" class="sr-only">DOE Passport</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input type="text" name="date_reservation" id="date_reservation" class="form-control datepicker" placeholder="Reservation Date">
                                    </div>
                                    <button type="submit" class="btn btn-add-now mb-2 px-4">Add Now</button>
                                </form>
                                <h3 class="mt-3 mb-0">Note</h3>
                                <p class="disclaimer mb-0">You are only able to invite member that has registered in Nomads.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Content -->
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <!-- Checkout Info -->
                            <h2>Checkout Information</h2>
                            <table class="restaurant-information">
                                <tr>
                                    <th width="50%">Members</th>
                                    <td width="50%" class="text-right">{{ $item->transaction_detail->count() }} person</td>
                                </tr>
                                <tr>
                                    <th width="50%">Additional Price</th>
                                    <td width="50%" class="text-right">Rp {{ $item->additional_price }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Trip Price</th>
                                    <td width="50%" class="text-right">Rp {{ $item->restaurant_package->price }}/person</td>
                                </tr>
                                <tr>
                                    <th width="50%">Sub Total</th>
                                    <td width="50%" class="text-right">Rp {{ $item->transaction_total }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Total (+Unique)</th>
                                    <td width="50%" class="text-right text-total">
                                        <span class="text-blue">Rp {{ $item->transaction_total }},</span><span class="text-orange">{{ mt_rand(0,99) }}</span>
                                    </td>
                                </tr>
                            </table>
                            <hr>

                            <!-- Payment Info -->
                            <h2>Payment Instruction</h2>
                            <p class="payment-instruction">Please complete your payment before continue to wonderful restaurant</p>
                            <div class="bank">
                                <div class="bank-item pb-2">
                                    <img src="{{ url('https://image.flaticon.com/icons/svg/147/147258.svg') }}" alt="" class="bank-image">
                                    <div class="description">
                                        <h3>PT JKTGourmet</h3>
                                        <p>1234 5678 9012 <br> Bank Raykat Indonesia</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="bank-item pb-2">
                                    <img src="{{ url('https://image.flaticon.com/icons/svg/147/147258.svg') }}" alt="" class="bank-image">
                                    <div class="description">
                                        <h3>PT JKTGourmet</h3>
                                        <p>0987 6543 2109 <br> Bank Central Asia</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="join-now-container">
                            <a href="{{ route('checkout-success', $item->id) }}" class="btn btn-block btn-join-now mt-3 py-2">I Have Made Payment</a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('detail', $item->restaurant_package->slug) }}" class="text-muted">Cancel Booking</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('frontend/libraries/gijgo/css/gijgo.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('frontend/libraries/gijgo/js/gijgo.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                icons: {
                    rightIcon: '<img src="https://image.flaticon.com/icons/svg/833/833593.svg" />'
                },
                uiLibrary: 'bootstrap4'
            });
        });
    </script>
@endpush