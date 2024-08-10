@extends('frontend.app')

@section('styles')
    <style>
        @font-face {
            font-family: ArterioNonCommercial;
            src: url('../frontend/fonts/ArterioNonCommercial.otf');
        }
        @font-face {
            font-family: ABChanel Corpo Regular;
            src: url('../frontend/fonts/ABChanel Corpo Regular.ttf');
        }
        @font-face {
            font-family: Poppins;
            src: url('../frontend/fonts/Poppins-Regular.ttf');
        }
        strong {
            font-weight: 600;
        }
    </style>
@endsection

@section('content')
    <div class="page-header text-center" style="background-image: url('{{asset('frontend/assets/images/page-header-bg.jpg')}}')">
        <div class="container">
            <h1 class="page-title">{{$p->name}}</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$p->name}}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    
    <section class="col-12 container px-3">
        <div class="text-2 poppins-all">
            
          </div>
    </section>
@endsection

@section('models')

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {});
    </script>
@endsection
