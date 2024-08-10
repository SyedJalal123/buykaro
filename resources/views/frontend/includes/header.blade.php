@if(Session::has('success-subscribed'))
    <input type="hidden" id="success-subscribed" value="1">
@else
    <input type="hidden" id="success-subscribed" value="0">
@endif
<header class="header header-10 header-intro-clearance">
    <div class="header-top py-2">
        <div class="container">
            <div class="header-left">
                <a href="tel:#"><i class="icon-phone"></i>Call: +92 319 5269988</a>
            </div><!-- End .header-left -->

            <div class="header-right">
                <a @if (auth()->user() == null) href="#signin-modal" data-toggle="modal" @else href="{{url('account')}}" @endif>Sign in / Sign up</a>
                {{-- <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li>
                                <div class="header-dropdown">
                                    <a href="#">USD</a>
                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="#">Eur</a></li>
                                            <li><a href="#">Usd</a></li>
                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div><!-- End .header-dropdown -->
                            </li>
                            <li>   
                                <div class="header-dropdown">
                                    <a href="#">Engligh</a>
                                    <div class="header-menu">
                                        <ul>
                                            <li><a href="#">English</a></li>
                                            <li><a href="#">French</a></li>
                                            <li><a href="#">Spanish</a></li>
                                        </ul>
                                    </div><!-- End .header-menu -->
                                </div><!-- End .header-dropdown -->
                            </li>
                            <li class="login">
                                <a href="#signin-modal" data-toggle="modal">Sign in / Sign up</a>
                            </li>
                        </ul>
                    </li>
                </ul><!-- End .top-menu --> --}}
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>
                
                <a href="{{url('/')}}" class="logo">
                    <img src="{{asset('frontend/assets/images/demos/demo-13/logo.png')}}" alt="Molla Logo" width="150">
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            {{-- <div class="select-custom">
                                <select id="cat" name="cat">
                                    @php $collections = get_collections(); @endphp
                                    <option value="{{url('collections/all')}}">All Collections</option>
                                    @foreach ($collections as $collection)
                                        <option value="{{$collection->slug}}">{{$collection->title}}</option>
                                    @endforeach
                                </select>
                            </div><!-- End .select-custom --> --}}
                            <label for="q" class="sr-only">Search</label>
                            <input type="text" class="form-control search-bar" name="q" id="q" placeholder="Search product ..." required>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                        </div><!-- End .header-search-wrapper -->
                        <div class="search-bar-content d-none">
                            <span class="fs-15 loading d-none">Loading ...</span>
                            <span class="fs-15 empty-data d-none">No Data Found</span>
                            <div class="search-bar-body d-none row">
                                <div class="search-bar-products p-3 col-md-12">
                                    <h6 class="m-0 poppins-all">PRODUCTS</h6><hr class="my-4">
                                </div>
                                <div class="search-bar-collections p-3 col-md-12 ms-md-3">
                                    <h6 class="m-0 poppins-all">COLLECTIONS</h6><hr class="my-4">
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- End .header-search -->
            </div>

            <div class="header-right">
                <div class="header-dropdown-link">
                    {{-- <div class="dropdown compare-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                            <i class="icon-random"></i>
                            <span class="compare-txt">Compare</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="compare-products">
                                <li class="compare-product">
                                    <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                    <h4 class="compare-product-title"><a href="product.html">Blue Night Dress</a></h4>
                                </li>
                                <li class="compare-product">
                                    <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                    <h4 class="compare-product-title"><a href="product.html">White Long Skirt</a></h4>
                                </li>
                            </ul>

                            <div class="compare-actions">
                                <a href="#" class="action-link">Clear All</a>
                                <a href="#" class="btn btn-outline-primary-2"><span>Compare</span><i class="icon-long-arrow-right"></i></a>
                            </div>
                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .compare-dropdown -->

                    <a href="wishlist.html" class="wishlist-link">
                        <i class="icon-heart-o"></i>
                        <span class="wishlist-count">3</span>
                        <span class="wishlist-txt">Wishlist</span>
                    </a> --}}
                    
                    <a @if (auth()->user() == null) href="#signin-modal" data-toggle="modal" @else href="{{url('account')}}" @endif class="wishlist-link">
                        <i class="icon-user"></i>
                        <span class="wishlist-txt">Account</span>
                    </a>

                    <div class="dropdown cart-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count">
                                @if (auth()->user() == null)
                                    @if(session()->get('cart') != null)
                                        {{count(session()->get('cart'))}}
                                    @else
                                        0
                                    @endif
                                @else
                                    {{count(get_carts())}}
                                @endif
                            </span>
                            <span class="cart-txt">Cart</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                @if (auth()->user() == null)
                                    @php $products = session()->get('cart'); $total = 0; @endphp
                                    @if($products != null)
                                        @foreach ($products as $key => $product)
                                            @foreach ($product as $id => $item)
                                                @php 
                                                    $product_data = get_product_data($item['id']); 
                                                    $total += $item['sub_total'];
                                                @endphp
                                                <div class="product">
                                                    <div class="product-cart-details">
                                                        <h4 class="product-title">
                                                            <a href="{{url('products')}}/{{$product_data->slug}}">{{$item['name']}}</a>
                                                        </h4>
                
                                                        <span class="cart-product-info">
                                                            <span class="cart-product-qty">{{$item['quantity']}}</span>
                                                            x Rs.{{number_format($item['price'], 2)}}
                                                        </span>
                                                    </div><!-- End .product-cart-details -->
                
                                                    <figure class="product-image-container">
                                                        <a href="{{url('products')}}/{{$product_data->slug}}" class="product-image">
                                                            <img src="{{asset($item['image'])}}" alt="product">
                                                        </a>
                                                    </figure>
                                                    <a href="#" class="btn-remove is-delete-cart" id="{{$product_data->id}}__{{$item['variation_value']}}__del1" title="Remove Product"><i class="icon-close"></i></a>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    @endif
                                @else
                                    @php $products_cart = get_carts(); $total = 0; @endphp
                                    @if($products_cart != null)
                                        @foreach ($products_cart as $key => $item)
                                            @php 
                                                $product_data = get_product_data($item->product_id); 
                                                $total += $item->sub_total;
                                            @endphp
                                            <div class="product">
                                                <div class="product-cart-details">
                                                    <h4 class="product-title">
                                                        <a href="{{url('products')}}/{{$product_data->slug}}">{{$product_data->title}}</a>
                                                    </h4>
            
                                                    <span class="cart-product-info">
                                                        <span class="cart-product-qty">{{$item->quantity}}</span>
                                                        x Rs.{{number_format($item->price, 2)}}
                                                    </span>
                                                </div><!-- End .product-cart-details -->
            
                                                <figure class="product-image-container">
                                                    <a href="{{url('products')}}/{{$product_data->slug}}" class="product-image">
                                                        <img src="{{asset($product_data->images[0])}}" alt="product">
                                                    </a>
                                                </figure>
                                                <a href="#" class="btn-remove is-delete-cart" id="{{$product_data->id}}__{{$item->variation_value}}__del1" title="Remove Product"><i class="icon-close"></i></a>
                                            </div>
                                        @endforeach
                                    @endif
                                @endif<!-- End .product -->
                            </div><!-- End .cart-product -->

                            <div class="dropdown-cart-total">
                                <span>Total</span>

                                <span class="cart-total-price">Rs.{{number_format($total ,2)}}</span>
                            </div><!-- End .dropdown-cart-total -->

                            <div class="dropdown-cart-action">
                                <a href="{{url('cart')}}" class="btn btn-primary">View Cart</a>
                                @if (auth()->user() == null)
                                    @if($products != null)
                                    <a href="#" class="btn btn-outline-primary-2" data-toggle="modal" data-target="#header_buynow_modal"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                    @endif
                                @else
                                    @if($products_cart != null)
                                    <a href="#" class="btn btn-outline-primary-2" data-toggle="modal" data-target="#header_buynow_modal"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                    @endif
                                @endif
                            </div><!-- End .dropdown-cart-total -->
                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .cart-dropdown -->
                </div>
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="header-left">
                <div class="dropdown category-dropdown show is-on" data-visible="true">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                        Browse Categories
                    </a>

                    <div class="dropdown-menu @if(isset($home)) show @endif">
                        <nav class="side-nav">
                            <ul class="menu-vertical sf-arrows">
                                {{-- <li class="megamenu-container">
                                    <a class="sf-with-ul" href="#">Electronics</a>

                                    <div class="megamenu">
                                        <div class="row no-gutters">
                                            <div class="col-md-8">
                                                <div class="menu-col">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="menu-title">Laptops & Computers</div><!-- End .menu-title -->
                                                            <ul>
                                                                <li><a href="#">Desktop Computers</a></li>
                                                                <li><a href="#">Monitors</a></li>
                                                                <li><a href="#">Laptops</a></li>
                                                                <li><a href="#">iPad & Tablets</a></li>
                                                                <li><a href="#">Hard Drives & Storage</a></li>
                                                                <li><a href="#">Printers & Supplies</a></li>
                                                                <li><a href="#">Computer Accessories</a></li>
                                                            </ul>

                                                            <div class="menu-title">TV & Video</div><!-- End .menu-title -->
                                                            <ul>
                                                                <li><a href="#">TVs</a></li>
                                                                <li><a href="#">Home Audio Speakers</a></li>
                                                                <li><a href="#">Projectors</a></li>
                                                                <li><a href="#">Media Streaming Devices</a></li>
                                                            </ul>
                                                        </div><!-- End .col-md-6 -->

                                                        <div class="col-md-6">
                                                            <div class="menu-title">Cell Phones</div><!-- End .menu-title -->
                                                            <ul>
                                                                <li><a href="#">Carrier Phones</a></li>
                                                                <li><a href="#">Unlocked Phones</a></li>
                                                                <li><a href="#">Phone & Cellphone Cases</a></li>
                                                                <li><a href="#">Cellphone Chargers </a></li>
                                                            </ul>

                                                            <div class="menu-title">Digital Cameras</div><!-- End .menu-title -->
                                                            <ul>
                                                                <li><a href="#">Digital SLR Cameras</a></li>
                                                                <li><a href="#">Sports & Action Cameras</a></li>
                                                                <li><a href="#">Camcorders</a></li>
                                                                <li><a href="#">Camera Lenses</a></li>
                                                                <li><a href="#">Photo Printer</a></li>
                                                                <li><a href="#">Digital Memory Cards</a></li>
                                                                <li><a href="#">Camera Bags, Backpacks & Cases</a></li>
                                                            </ul>
                                                        </div><!-- End .col-md-6 -->
                                                    </div><!-- End .row -->
                                                </div><!-- End .menu-col -->
                                            </div><!-- End .col-md-8 -->

                                            <div class="col-md-4">
                                                <div class="banner banner-overlay">
                                                    <a href="{{url('collections/all')}}" class="banner banner-menu">
                                                        <img src="{{asset('frontend/assets/images/demos/demo-13/menu/banner-1.jpg')}}" alt="Banner">
                                                    </a>
                                                </div><!-- End .banner banner-overlay -->
                                            </div><!-- End .col-md-4 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .megamenu -->
                                </li> --}}
                                @php $collections = get_collections(); @endphp
                                <li><a href="{{url('collections/all')}}">All Categories</a></li>
                                @foreach ($collections as $collection)
                                    <li><a href="{{url('collections')}}/{{$collection->slug}}">{{$collection->title}}</a></li>
                                @endforeach
                            </ul><!-- End .menu-vertical -->
                        </nav><!-- End .side-nav -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .category-dropdown -->
            </div><!-- End .col-lg-3 -->
            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="active"><a href="{{url('/')}}">Home</a></li>
                        <li>
                            <a href="{{url('collections/all')}}" class="sf-with-ul">Collections</a>

                            <ul>
                                <li><a href="{{url('collections/all')}}">All</a></li>
                                @php $collections = get_collections(); @endphp
                                @foreach ($collections as $collection)
                                    <li><a href="{{url('collections')}}/{{$collection->slug}}">{{$collection->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{url('collections/all')}}">Shop</a></li>
                        <li><a href="{{url('about-us')}}">About Us</a></li>
                        <li><a href="{{url('contact-us')}}">Contact</a></li>
                        {{-- <li class="megamenu-container">
                            <a href="{{url('/')}}" class="sf-with-ul">Home</a>

                            <div class="megamenu demo">
                                <div class="menu-col">
                                    <div class="menu-title">Choose your demo</div><!-- End .menu-title -->

                                    <div class="demo-list">
                                        <div class="demo-item">
                                            <a href="index-1.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/1.jpg')}});"></span>
                                                <span class="demo-title">01 - furniture store</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item">
                                            <a href="index-2.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/2.jpg')}});"></span>
                                                <span class="demo-title">02 - furniture store</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item">
                                            <a href="index-3.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/3.jpg')}});"></span>
                                                <span class="demo-title">03 - electronic store</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item">
                                            <a href="index-4.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/4.jpg')}});"></span>
                                                <span class="demo-title">04 - electronic store</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item">
                                            <a href="index-5.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/5.jpg')}});"></span>
                                                <span class="demo-title">05 - fashion store</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item">
                                            <a href="index-6.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/6.jpg')}});"></span>
                                                <span class="demo-title">06 - fashion store</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item">
                                            <a href="index-7.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/7.jpg')}});"></span>
                                                <span class="demo-title">07 - fashion store</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item">
                                            <a href="index-8.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/8.jpg')}});"></span>
                                                <span class="demo-title">08 - fashion store</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item">
                                            <a href="index-9.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/9.jpg')}});"></span>
                                                <span class="demo-title">09 - fashion store</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item">
                                            <a href="index-10.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/10.jpg')}});"></span>
                                                <span class="demo-title">10 - shoes store</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item hidden">
                                            <a href="index-11.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/11.jpg')}});"></span>
                                                <span class="demo-title">11 - furniture simple store</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item hidden">
                                            <a href="index-12.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/12.jpg')}});"></span>
                                                <span class="demo-title">12 - fashion simple store</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item hidden">
                                            <a href="index-13.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/13.jpg')}});"></span>
                                                <span class="demo-title">13 - market</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item hidden">
                                            <a href="index-14.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/14.jpg')}});"></span>
                                                <span class="demo-title">14 - market fullwidth</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item hidden">
                                            <a href="index-15.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/15.jpg')}});"></span>
                                                <span class="demo-title">15 - lookbook 1</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item hidden">
                                            <a href="index-16.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/16.jpg')}});"></span>
                                                <span class="demo-title">16 - lookbook 2</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item hidden">
                                            <a href="index-17.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/17.jpg')}});"></span>
                                                <span class="demo-title">17 - fashion store</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item hidden">
                                            <a href="index-18.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/18.jpg')}});"></span>
                                                <span class="demo-title">18 - fashion store (with sidebar)</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item hidden">
                                            <a href="index-19.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/19.jpg')}});"></span>
                                                <span class="demo-title">19 - games store</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item hidden">
                                            <a href="index-20.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/20.jpg')}});"></span>
                                                <span class="demo-title">20 - book store</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item hidden">
                                            <a href="index-21.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/21.jpg')}});"></span>
                                                <span class="demo-title">21 - sport store</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item hidden">
                                            <a href="index-22.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/22.jpg')}});"></span>
                                                <span class="demo-title">22 - tools store</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item hidden">
                                            <a href="index-23.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/23.jpg')}});"></span>
                                                <span class="demo-title">23 - fashion left navigation store</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                        <div class="demo-item hidden">
                                            <a href="index-24.html">
                                                <span class="demo-bg" style="background-image: url({{asset('frontend/assets/images/menu/demos/24.jpg')}});"></span>
                                                <span class="demo-title">24 - extreme sport store</span>
                                            </a>
                                        </div><!-- End .demo-item -->

                                    </div><!-- End .demo-list -->

                                    <div class="megamenu-action text-center">
                                        <a href="#" class="btn btn-outline-primary-2 view-all-demos"><span>View All Demos</span><i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .text-center -->
                                </div><!-- End .menu-col -->
                            </div><!-- End .megamenu -->
                        </li>
                        <li>
                            <a href="{{url('collections/all')}}" class="sf-with-ul">Shop</a>

                            <div class="megamenu megamenu-md">
                                <div class="row no-gutters">
                                    <div class="col-md-8">
                                        <div class="menu-col">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="menu-title">Shop with sidebar</div><!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="category-list.html">Shop List</a></li>
                                                        <li><a href="category-2cols.html">Shop Grid 2 Columns</a></li>
                                                        <li><a href="{{url('collections/all')}}">Shop Grid 3 Columns</a></li>
                                                        <li><a href="category-4cols.html">Shop Grid 4 Columns</a></li>
                                                        <li><a href="category-market.html"><span>Shop Market<span class="tip tip-new">New</span></span></a></li>
                                                    </ul>

                                                    <div class="menu-title">Shop no sidebar</div><!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="category-boxed.html"><span>Shop Boxed No Sidebar<span class="tip tip-hot">Hot</span></span></a></li>
                                                        <li><a href="category-fullwidth.html">Shop Fullwidth No Sidebar</a></li>
                                                    </ul>
                                                </div><!-- End .col-md-6 -->

                                                <div class="col-md-6">
                                                    <div class="menu-title">Product Category</div><!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="product-category-boxed.html">Product Category Boxed</a></li>
                                                        <li><a href="product-category-fullwidth.html"><span>Product Category Fullwidth<span class="tip tip-new">New</span></span></a></li>
                                                    </ul>
                                                    <div class="menu-title">Shop Pages</div><!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="{{url('cart')}}">Cart</a></li>
                                                        <li><a href="checkout.html">Checkout</a></li>
                                                        <li><a href="wishlist.html">Wishlist</a></li>
                                                        <li><a href="dashboard.html">My Account</a></li>
                                                        <li><a href="#">Lookbook</a></li>
                                                    </ul>
                                                </div><!-- End .col-md-6 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .menu-col -->
                                    </div><!-- End .col-md-8 -->

                                    <div class="col-md-4">
                                        <div class="banner banner-overlay">
                                            <a href="{{url('collections/all')}}" class="banner banner-menu">
                                                <img src="{{asset('frontend/assets/images/menu/banner-1.jpg')}}" alt="Banner">

                                                <div class="banner-content banner-content-top">
                                                    <div class="banner-title text-white">Last <br>Chance<br><span><strong>Sale</strong></span></div><!-- End .banner-title -->
                                                </div><!-- End .banner-content -->
                                            </a>
                                        </div><!-- End .banner banner-overlay -->
                                    </div><!-- End .col-md-4 -->
                                </div><!-- End .row -->
                            </div><!-- End .megamenu megamenu-md -->
                        </li>
                        <li>
                            <a href="product.html" class="sf-with-ul">Product</a>

                            <div class="megamenu megamenu-sm">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <div class="menu-col">
                                            <div class="menu-title">Product Details</div><!-- End .menu-title -->
                                            <ul>
                                                <li><a href="product.html">Default</a></li>
                                                <li><a href="product-centered.html">Centered</a></li>
                                                <li><a href="product-extended.html"><span>Extended Info<span class="tip tip-new">New</span></span></a></li>
                                                <li><a href="product-gallery.html">Gallery</a></li>
                                                <li><a href="product-sticky.html">Sticky Info</a></li>
                                                <li><a href="product-sidebar.html">Boxed With Sidebar</a></li>
                                                <li><a href="product-fullwidth.html">Full Width</a></li>
                                                <li><a href="product-masonry.html">Masonry Sticky Info</a></li>
                                            </ul>
                                        </div><!-- End .menu-col -->
                                    </div><!-- End .col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="banner banner-overlay">
                                            <a href="{{url('collections/all')}}">
                                                <img src="{{asset('frontend/assets/images/menu/banner-2.jpg')}}" alt="Banner">

                                                <div class="banner-content banner-content-bottom">
                                                    <div class="banner-title text-white">New Trends<br><span><strong>spring 2019</strong></span></div><!-- End .banner-title -->
                                                </div><!-- End .banner-content -->
                                            </a>
                                        </div><!-- End .banner -->
                                    </div><!-- End .col-md-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .megamenu megamenu-sm -->
                        </li>
                        <li>
                            <a href="#" class="sf-with-ul">Pages</a>

                            <ul>
                                <li>
                                    <a href="{{url('about-us')}}" class="sf-with-ul">About</a>

                                    <ul>
                                        <li><a href="{{url('about-us')}}">About 01</a></li>
                                        <li><a href="about-2.html">About 02</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{url('contact-us')}}" class="sf-with-ul">Contact</a>

                                    <ul>
                                        <li><a href="{{url('contact-us')}}">Contact 01</a></li>
                                        <li><a href="contact-2.html">Contact 02</a></li>
                                    </ul>
                                </li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="faq.html">FAQs</a></li>
                                <li><a href="404.html">Error 404</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="blog.html" class="sf-with-ul">Blog</a>

                            <ul>
                                <li><a href="blog.html">Classic</a></li>
                                <li><a href="blog-listing.html">Listing</a></li>
                                <li>
                                    <a href="#">Grid</a>
                                    <ul>
                                        <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                        <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                        <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                        <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Masonry</a>
                                    <ul>
                                        <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                        <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                        <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                        <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Mask</a>
                                    <ul>
                                        <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                        <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Single Post</a>
                                    <ul>
                                        <li><a href="single.html">Default with sidebar</a></li>
                                        <li><a href="single-fullwidth.html">Fullwidth no sidebar</a></li>
                                        <li><a href="single-fullwidth-sidebar.html">Fullwidth with sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li> --}}
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .col-lg-9 -->
            <div class="header-right">
                <i class="la la-lightbulb-o"></i><p>Clearance Up to 30% Off</span></p>
            </div>
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header>