@extends('frontend.app')

@section('styles')
    
@endsection

@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact us</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <div class="container">
        <div class="page-header page-header-big text-center" style="background-image: url('{{asset('frontend/assets/images/contact-header-bg.jpg')}}">
            <h1 class="page-title text-white">Contact us<span class="text-white">keep in touch with us</span></h1>
        </div><!-- End .page-header -->
    </div><!-- End .container -->
    <hr><br>
    <div class="page-content pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-2 mb-lg-0">
                    <h2 class="title mb-2">Contact Information</h2>
                    <p class="mb-3">We value your feedback and inquiries. Feel free to reach out to us using the following contact information<p>
                    <p class="text-2 poppins-all">
                        <strong class="fw-600">Email</strong>: info@buykaro.pk
                        <br>
                        <strong class="fw-600">Number</strong>: 03140890365
                    </p>
                </div><!-- End .col-lg-12 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content --> 
    <br><hr><br>
@endsection

@section('models')

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {});
    </script>
@endsection
