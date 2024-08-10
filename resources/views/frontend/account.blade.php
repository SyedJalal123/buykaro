@extends('frontend.app')

@section('styles')
    <style>
        .main-heading {
            font-family: Poppins;
            font-weight: 600;
            text-align: center;
        }
        .poppins {
            font-family: Poppins;
        }
        .btn-2 {
            font-weight: 400;
            padding: 8px 14px;
            background-position: 150% 45%;
            min-width: 90px;
            font-size: 12px;
            border: 1px solid;
            border-color: #b3aeae;
            background-color: transparent;
            line-height: 1.42;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: .3em;
            font-family: poppins;
            cursor: pointer;
            color: black;
            margin-bottom: 40px; 
        }
        .btn-2:hover {
            border-color: #000000;
            color: black
        }
        .user-name {
            text-transform: uppercase;
            letter-spacing: .3em;
            font-size: .8em;
            margin-bottom: 10px;
            font-weight: 400;
        }
        .nor-text {
            font-size: 16px;
            font-family: poppins;

        }
        .card-head {
            border-bottom: 1px solid #d0d0d0;
        }
        .card * {
            font-family: Poppins;
        }
        .card-head * {
            font-weight: 600;
        }
        .order-link {
            border: 1px solid #c3c3c3;
            padding: 5px 13px;
            cursor: pointer;
        }
        .card-body .row {
            padding: 15px 0px !important;
            border-bottom: 1px solid #c3c3c3;   
        }
        .card-body {
            padding: 0px;
        }
        @media only screen and (min-width: 991px) { /* PC */ 
            .section {
                padding-right: 3rem !important;
                padding-left: 3rem !important;
            }
            .phone-head {
                display: none;
            }
        }
        
        @media only screen and (max-width: 991px) { /* Phones */ 
            .card-head {
                display: none;
            }
            .phone-text-right {
                text-align: end !important;
                margin-bottom: 10px;
            }         
            .card {
                border: 0px;
                border-top: 1px solid #c3c3c3;   
                border-bottom: 1px solid #c3c3c3;   
            }
        }
    </style>
@endsection

@section('content')
    <div class="page-header text-center" style="background-image: url('{{asset('frontend/assets/images/page-header-bg.jpg')}}')">
        <div class="container">
            <h1 class="page-title mb-1">MY ACCOUNT</h1>
            <a href="{{ route('logout') }}" 
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                class="btn-2 mt-3">
                Sign Out
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Account</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <section class="main section col-12 px-3 py-5">
        <div class="row">
            <div class="col-md-8 mb-5">
                <h3 class="poppins">ORDER HISTORY</h3>
                @if(count($orders) > 0)
                <div class="card bg-transparent rounded-0">
                    <div class="card-head px-4 py-3">
                        <div class="row">
                            <div class="col-md-3 text-start">Order</div>
                            <div class="col-md-3 text-center">Date</div>
                            <div class="col-md-3 text-center">Fulfilment Status</div>
                            <div class="col-md-3 text-end">Total</div>
                        </div>
                    </div>
                    <div class="card-body px-4">
                        @php $total = 0; @endphp
                        @foreach($orders as $id => $order)
                            <div class="row">
                                <div class="col-6 phone-head text-start">Order</div>
                                <div class="col-6 phone-text-right col-md-3 text-start"><a class="order-link">#{{$order->order_no}}</a></div>
                                <div class="col-6 phone-head text-start">Date</div>
                                <div class="col-6 phone-text-right col-md-3 text-center">{{date('d-M-Y', strtotime($order->created_at))}}</div>
                                <div class="col-6 phone-head text-start">Fulfilment Status</div>
                                <div class="col-6 phone-text-right col-md-3 text-center">Unfulfilled</div>
                                <div class="col-6 phone-head text-start">Total</div>
                                <div class="col-6 phone-text-right col-md-3 text-end">{{number_format($order->total, 2)}}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @else
                <p class="poppins">You haven't placed any orders yet.</p>
                @endif
            </div>
            <div class="col-md-4">
                <h4 class="poppins mb-3">ACCOUNT DETAILS</h4>
                <h5 class="user-name">{{auth()->user()->name}}</h5>
                <div class="cus-info"><hr class="my-4">
                    <p class="nor-text">{{auth()->user()->name}}</p>
                    <p class="nor-text">{{auth()->user()->email}}</p>
                </div>
                <a href="#" class="nor-text">View Addresses (0)</a>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/main_signup.js')}}"></script>

    <script>
        
    </script>
@endsection
