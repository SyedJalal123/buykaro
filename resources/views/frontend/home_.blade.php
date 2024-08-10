@extends('frontend.app')

@section('styles')
    <style>
        
    </style>
@endsection

@section('content')
    <div class="intro-slider-container">
        <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
                "nav": false,
                "responsive": {
                    "992": {
                        "nav": true
                    }
                }
            }'>
            <div class="intro-slide" style="background-image: url({{asset('frontend/assets/images/demos/demo-13/slider/slide-1.png')}});">
                <div class="container intro-content">
                    <div class="row">
                        <div class="col-auto offset-lg-3 intro-col">
                            <h3 class="intro-subtitle">Trade-In Offer</h3><!-- End .h3 intro-subtitle -->
                            <h1 class="intro-title">T800 Ultra Smart Watch <br>Latest Model
                                <span>
                                    <sup class="font-weight-light">from</sup>
                                    <span class="text-primary">2,299<sup>,99</sup></span>
                                </span>
                            </h1><!-- End .intro-title -->

                            <a href="{{url('collections/all')}}" class="btn btn-outline-primary-2">
                                <span>Shop Now</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .col-auto offset-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container intro-content -->
            </div><!-- End .intro-slide -->

            {{-- <div class="intro-slide" style="background-image: url({{asset('frontend/assets/images/demos/demo-13/slider/slide-2.jpg')}});">
                <div class="container intro-content">
                    <div class="row">
                        <div class="col-auto offset-lg-3 intro-col">
                            <h3 class="intro-subtitle">Trevel & Outdoor</h3><!-- End .h3 intro-subtitle -->
                            <h1 class="intro-title">Original Outdoor <br>Beanbag
                                <span>
                                    <sup class="font-weight-light line-through">$89,99</sup>
                                    <span class="text-primary">$29<sup>,99</sup></span>
                                </span>
                            </h1><!-- End .intro-title -->

                            <a href="{{url('collections/all')}}" class="btn btn-outline-primary-2">
                                <span>Shop Now</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .col-auto offset-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container intro-content -->
            </div><!-- End .intro-slide -->

            <div class="intro-slide" style="background-image: url({{asset('frontend/assets/images/demos/demo-13/slider/slide-3.jpg')}});">
                <div class="container intro-content">
                    <div class="row">
                        <div class="col-auto offset-lg-3 intro-col">
                            <h3 class="intro-subtitle">Fashion Promotions</h3><!-- End .h3 intro-subtitle -->
                            <h1 class="intro-title">Tan Suede <br>Biker Jacket
                                <span>
                                    <sup class="font-weight-light line-through">$240,00</sup>
                                    <span class="text-primary">$180<sup>,99</sup></span>
                                </span>
                            </h1><!-- End .intro-title -->

                            <a href="{{url('collections/all')}}" class="btn btn-outline-primary-2">
                                <span>Shop Now</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .col-auto offset-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container intro-content -->
            </div><!-- End .intro-slide --> --}}
        </div><!-- End .owl-carousel owl-simple -->

        <span class="slider-loader"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->

    <div class="mb-4"></div><!-- End .mb-2 -->

    <div class="container">
        <h2 class="title text-center mb-2">Explore Popular Categories</h2><!-- End .title -->

        <div class="cat-blocks-container">
            <div class="row d-flex justify-content-center">
                @foreach ($collections as $collection)
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="{{url('collections')}}/{{$collection->slug}}" class="cat-block">
                        <figure>
                            <span>
                                <img src="{{asset($collection->image)}}" alt="Category image">
                            </span>
                        </figure>

                        <h3 class="cat-block-title">{{$collection->title}}</h3><!-- End .cat-block-title -->
                    </a>
                </div><!-- End .col-sm-4 col-lg-2 -->
                @endforeach
            </div><!-- End .row -->
        </div><!-- End .cat-blocks-container -->
    </div><!-- End .container -->

    <div class="mb-2"></div><!-- End .mb-2 -->

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="banner banner-overlay">
                    <a href="#">
                        <img src="{{asset('frontend/assets/images/demos/demo-13/banners/banner-1.jpg')}}" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle text-white"><a href="#">Weekend Sale</a></h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title text-white"><a href="#">Lighting <br>& Accessories <br><span>25% off</span></a></h3><!-- End .banner-title -->
                        <a href="{{url('collections/all')}}" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-lg-3 -->

            <div class="col-sm-6 col-lg-3 order-lg-last">
                <div class="banner banner-overlay">
                    <a href="#">
                        <img src="{{asset('frontend/assets/images/demos/demo-13/banners/banner-3.jpg')}}" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle text-white"><a href="#">Smart Offer</a></h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title text-white"><a href="#">Anniversary <br>Special <br><span>15% off</span></a></h3><!-- End .banner-title -->
                        <a href="{{url('collections/all')}}" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-lg-3 -->

            <div class="col-lg-6">
                <div class="banner banner-overlay">
                    <a href="#">
                        <img src="{{asset('frontend/assets/images/demos/demo-13/banners/banner-2.jpg')}}" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle text-white d-none d-sm-block"><a href="#">Amazing Value</a></h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title text-white"><a href="#">Clothes Trending <br>Spring Collection 2019 <br><span>from Rs.2,999.00</span></a></h3><!-- End .banner-title -->
                        <a href="{{url('collections/all')}}" class="banner-link">Discover Now <i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-3"></div><!-- End .mb-3 -->

    <div class="bg-light electronics pt-3 pb-5">
        <div class="container">
            <div class="heading heading-flex heading-border mb-3">
                <div class="heading-left">
                    <h2 class="title">Top Selling Products</h2><!-- End .title -->
                </div><!-- End .heading-left -->
    
                <div class="heading-right">
                        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                            {{-- <li class="nav-item">
                                <a class="nav-link" id="elec-new-link" data-toggle="tab" href="#elec-new-tab" role="tab" aria-controls="elec-new-tab" aria-selected="true">New</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="elec-featured-link" data-toggle="tab" href="#elec-featured-tab" role="tab" aria-controls="elec-featured-tab" aria-selected="false">Featured</a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link active" id="elec-best-link" data-toggle="tab" href="#elec-best-tab" role="tab" aria-controls="elec-best-tab" aria-selected="false">Best Seller</a>
                            </li>
                        </ul>
                </div><!-- End .heading-right -->
            </div><!-- End .heading -->
    
            <div class="tab-content tab-content-carousel">
                {{-- <div class="tab-pane p-0 fade" id="elec-new-tab" role="tabpanel" aria-labelledby="elec-new-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":2
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1280": {
                                    "items":5,
                                    "nav": true
                                }
                            }
                        }'>
                        <div class="product">
                            <figure class="product-media">
                                <span class="product-label label-new">New</span>
                                <a href="product.html">
                                    <img src="{{asset('frontend/assets/images/demos/demo-13/products/product-6.jpg')}}" alt="Product image" class="product-image">
                                </a>
    
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                </div><!-- End .product-action-vertical -->
    
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->
    
                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Appliances</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Neato Robotics</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $399.00
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 12 Reviews )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
    
                        <div class="product">
                            <figure class="product-media">
                                <span class="product-label label-top">Top</span>
                                <a href="product.html">
                                    <img src="{{asset('frontend/assets/images/demos/demo-13/products/product-7.jpg')}}" alt="Product image" class="product-image">
                                </a>
    
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                </div><!-- End .product-action-vertical -->
    
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->
    
                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Laptops</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">MacBook Pro 13" Display, i5</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $1,199.00
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 Reviews )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
    
                        <div class="product">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="{{asset('frontend/assets/images/demos/demo-13/products/product-8.jpg')}}" alt="Product image" class="product-image">
                                </a>
    
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                </div><!-- End .product-action-vertical -->
    
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->
    
                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Audio</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Bose - SoundLink Bluetooth Speaker</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $79.99
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 6 Reviews )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
    
                        <div class="product">
                            <figure class="product-media">
                                <span class="product-label label-new">New</span>
                                <a href="product.html">
                                    <img src="{{asset('frontend/assets/images/demos/demo-13/products/product-9.jpg')}}" alt="Product image" class="product-image">
                                </a>
    
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                </div><!-- End .product-action-vertical -->
    
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->
    
                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Tablets</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Apple - 11 Inch iPad Pro  with Wi-Fi 256GB </a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $899.99
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 Reviews )</span>
                                </div><!-- End .rating-container -->
    
                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
    
                        <div class="product">
                            <figure class="product-media">
                                <span class="product-label label-sale">Sale</span>
                                <a href="product.html">
                                    <img src="{{asset('frontend/assets/images/demos/demo-13/products/product-10.jpg')}}" alt="Product image" class="product-image">
                                </a>
    
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                </div><!-- End .product-action-vertical -->
    
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->
    
                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Cell Phone</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Google - Pixel 3 XL 128GB</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">$350.00</span>
                                    <span class="old-price">Was $410.00</span>
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 10 Reviews )</span>
                                </div><!-- End .rating-container -->
    
                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane p-0 fade" id="elec-featured-tab" role="tabpanel" aria-labelledby="elec-featured-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":2
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1280": {
                                    "items":5,
                                    "nav": true
                                }
                            }
                        }'>
                        <div class="product">
                            <figure class="product-media">
                                <span class="product-label label-new">New</span>
                                <a href="product.html">
                                    <img src="{{asset('frontend/assets/images/demos/demo-13/products/product-9.jpg')}}" alt="Product image" class="product-image">
                                </a>
    
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                </div><!-- End .product-action-vertical -->
    
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->
    
                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Tablets</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Apple - 11 Inch iPad Pro  with Wi-Fi 256GB </a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $899.99
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 Reviews )</span>
                                </div><!-- End .rating-container -->
    
                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
    
                        <div class="product">
                            <figure class="product-media">
                                <span class="product-label label-sale">Sale</span>
                                <a href="product.html">
                                    <img src="{{asset('frontend/assets/images/demos/demo-13/products/product-10.jpg')}}" alt="Product image" class="product-image">
                                </a>
    
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                </div><!-- End .product-action-vertical -->
    
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->
    
                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Cell Phone</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Google - Pixel 3 XL 128GB</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $899.99
                                    <span class="new-price">$350.00</span>
                                    <span class="old-price">Was $410.00</span>
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 10 Reviews )</span>
                                </div><!-- End .rating-container -->
    
                                <div class="product-nav product-nav-dots">
                                    <a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
    
                        <div class="product">
                            <figure class="product-media">
                                <a href="product.html">
                                    <img src="{{asset('frontend/assets/images/demos/demo-13/products/product-8.jpg')}}" alt="Product image" class="product-image">
                                </a>
    
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                </div><!-- End .product-action-vertical -->
    
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->
    
                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Audio</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Bose - SoundLink Bluetooth Speaker</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $79.99
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 6 Reviews )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
    
                        <div class="product">
                            <figure class="product-media">
                                <span class="product-label label-top">Top</span>
                                <a href="product.html">
                                    <img src="{{asset('frontend/assets/images/demos/demo-13/products/product-7.jpg')}}" alt="Product image" class="product-image">
                                </a>
    
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                </div><!-- End .product-action-vertical -->
    
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->
    
                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Laptops</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">MacBook Pro 13" Display, i5</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    $1,199.00
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 Reviews )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane --> --}}
                <div class="tab-pane p-0 fade show active" id="elec-best-tab" role="tabpanel" aria-labelledby="elec-best-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":2
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1280": {
                                    "items":5,
                                    "nav": true
                                }
                            }
                        }'>
                        @foreach ($products as $key => $product)
                        <div class="product">
                            <figure class="product-media">
                                <span class="product-label label-sale">Sale</span>
                                <a href="{{url('products')}}/{{$product->slug}}">
                                    <img src="{{asset($product->images[0])}}" alt="Product image" class="product-image">
                                </a>

                                {{-- <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                    <button class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></button>
                                </div><!-- End .product-action-vertical --> --}}

                                <div class="product-action mb-1">
                                    <button class="btn-product btn-cart" onclick="addToCart({{$product->id}},'{{$product->title}}',1,{{$product->price}},'{{$product->images[0]}}','{{$product->variations[0]->title}}','{{$product->variations[0]->value}}')" title="Add to cart"><span>add to cart</span></button>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Furniture</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="{{url('products')}}/{{$product->slug}}">{{$product->title}}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">Rs.{{number_format($product->price, 2)}}</span>
                                    <span class="old-price">Was {{number_format($product->compare_price, 2)}}</span>
                                </div><!-- End .product-price -->
                                {{-- <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 2 Reviews )</span>
                                </div><!-- End .rating-container --> --}}
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->
        </div>
    </div><!-- End .container -->

    <div class="mb-3"></div><!-- End .mb-3 -->

    <div class="">
        <div class="container">
            <div class="heading heading-flex heading-border mb-3">
                <div class="heading-left">
                    <h2 class="title">Hot Deals Products</h2><!-- End .title -->
                </div><!-- End .heading-left -->

                <div class="heading-right">
                        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                            @foreach ($collections as $key => $item)    
                            <li class="nav-item">
                                <a class="nav-link @if($key == 0) active @endif" id="{{$item->slug}}-link" data-toggle="tab" href="#{{$item->slug}}-tab" role="tab" aria-controls="{{$item->slug}}-tab" @if($key == 0) aria-selected="true" @else aria-selected="false" @endif>{{$item->title}}</a>
                            </li>
                            @endforeach
                        </ul>
                </div><!-- End .heading-right -->
            </div><!-- End .heading -->

            <div class="tab-content tab-content-carousel">
                @foreach ($collections as $key => $item) 
                <div class="tab-pane p-0 fade @if($key == 0) show active @endif" id="{{$item->slug}}-tab" role="tabpanel" aria-labelledby="{{$item->slug}}-link">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":2
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1280": {
                                    "items":5,
                                    "nav": true
                                }
                            }
                        }'>
                        @php $collection_products = collection_products($item->title); @endphp
                        @foreach ($collection_products as $key => $product)
                        <div class="product">
                            <figure class="product-media">
                                <span class="product-label label-sale">Sale</span>
                                <a href="{{url('products')}}/{{$product->slug}}">
                                    <img src="{{asset($product->images[0])}}" alt="Product image" class="product-image">
                                </a>

                                {{-- <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                    <button class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></button>
                                </div><!-- End .product-action-vertical --> --}}

                                <div class="product-action mb-1">
                                    <button class="btn-product btn-cart" onclick="addToCart({{$product->id}},'{{$product->title}}',1,{{$product->price}},'{{$product->images[0]}}','{{$product->variations[0]->title}}','{{$product->variations[0]->value}}')" title="Add to cart"><span>add to cart</span></button>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Furniture</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="{{url('products')}}/{{$product->slug}}">{{$product->title}}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">Rs.{{number_format($product->price, 2)}}</span>
                                    <span class="old-price">Was {{number_format($product->compare_price, 2)}}</span>
                                </div><!-- End .product-price -->
                                {{-- <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 2 Reviews )</span>
                                </div><!-- End .rating-container --> --}}
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                        @endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- .End .tab-pane -->
                @endforeach
            </div><!-- End .tab-content -->
        </div><!-- End .container -->
    </div><!-- End .bg-light pt-5 pb-5 -->

    <div class="mb-3"></div><!-- End .mb-3 -->

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="banner banner-overlay banner-overlay-light">
                    <a href="{{url('collections/all')}}">
                        <img src="{{asset('frontend/assets/images/demos/demo-13/banners/banner-4.jpg')}}" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle d-none d-sm-block"><a href="#">Spring Sale is Coming</a></h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title"><a href="{{url('collections/all')}}">All Smart Watches <br>Discount <br><span class="text-primary">15% off</span></a></h3><!-- End .banner-title -->
                        <a href="{{url('collections/all')}}" class="banner-link banner-link-dark">Discover Now <i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-lg-6 -->

            <div class="col-lg-6">
                <div class="banner banner-overlay">
                    <a href="{{url('collections/all')}}">
                        <img src="{{asset('frontend/assets/images/demos/demo-13/banners/banner-5.png')}}" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle text-white  d-none d-sm-block"><a href="{{url('collections/all')}}">Amazing Value</a></h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title text-white"><a href="{{url('collections/all')}}">Smartwatch Trending <br>T800 Ultra <br><span>from Rs.2,299.00</span></a></h3><!-- End .banner-title -->
                        <a href="{{url('collections/all')}}" class="banner-link">Discover Now <i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-3"></div><!-- End .mb-3 -->

    <div class="cta cta-horizontal cta-horizontal-box bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-2xl-5col">
                    <h3 class="cta-title text-white">Join Our Newsletter</h3><!-- End .cta-title -->
                    <p class="cta-desc text-white">Subcribe to get information about products and coupons</p><!-- End .cta-desc -->
                </div><!-- End .col-lg-5 -->
                
                <div class="col-3xl-5col">
                    <form method="POST" action="{{url('newsletter')}}">
                        @csrf
                        <div class="input-group">
                            <input type="email" name="email" class="form-control form-control-white" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-white-2" type="submit"><span>Subscribe</span><i class="icon-long-arrow-right"></i></button>
                            </div><!-- .End .input-group-append -->
                        </div><!-- .End .input-group -->
                    </form>
                </div><!-- End .col-lg-7 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .cta -->

@endsection

@section('models')
    
@endsection

@section('scripts')
    <script src="{{asset('frontend/js/home.js')}}"></script>
@endsection