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
        @media only screen and (max-width: 991px) { /* Phones */
            .home-grid {
                padding: 0px;
                margin: 0px;
            }
            .grid-buttons {
                top: 73% !important;
                left: 70% !important;
            }
        }
    </style>
    <link rel="stylesheet" href="{{url('frontend/css/splide.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/product.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/splide-core.min.css')}}">
@endsection

@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('collections/all')}}">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$product->title}}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->
    <section class="main col-12">
        <div class="row">
            <div class="thumbnail-prnt col-md-1 ml-7">
                @php $product_images = []; @endphp
                <ul id="thumbnails" class="thumbnails">
                    @foreach($product->images as $key => $image)
                    @php array_push($product_images, url($image)); @endphp
                    <li class="thumbnail">
                      <img src="{{url($image)}}" />
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 pb-3 mr-md-5">
                <div id="thumbnail-slider" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach($product->images as $key => $image)
                            <li class="splide__slide">
                                <img src="{{url($image)}}">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>   
            </div>
            <div class="col-md-6 p-4">
                <div class="product-box">
                    @if(Session::has('modal_value'))
                        <input type="hidden" id="modal_value" value="{{Session::get('modal_value')}}">
                    @endif
                    <a href="#">
                        <input type="hidden" id="modal_productId" value="{{$product->id}}">
                        <h1 class="product-model-title" id="product-model-title">{{$product->title}}</h1>
                    </a>
                    <div class="price-box">
                        <del>
                            <input type="hidden" id="modal_productImage" value="{{$product->images[0]}}">
                            <input type="hidden" id="modal_price_input" value="{{$product->price}}">
                            <span class="sub-price money" id="modal_sub_price">Rs.{{number_format($product->compare_price, 2)}}</span>
                        </del> 
                        <ins>
                            <span class="price money ml-2" id="modal_price">Rs.{{number_format($product->price, 2)}}</span>
                        </ins> 
                        <span class="badge-price">SAVE <span class="money" id="save_price">Rs.{{number_format($product->compare_price - $product->price)}}</span></span>
                    </div>     
                    <div class="variation-box mb-3">
                        <div class="variation-list">
                            @foreach ($product->variations as $i => $variation)
                                @if($i == 0)
                                    <input type="hidden" id="variation-title-{{$variation->value}}" class="variation-item-title" value="{{$variation->title}}">
                                    <div class="variation-item d-none @if(count($product->variations) == 1) selected @endif">{{$variation->value}}</div>
                                @elseif($i == 1)
                                    <input type="hidden" id="variation-title-{{$variation->value}}" class="variation-item-title" value="{{$variation->title}}">
                                    <div class="variation-item selected">{{$variation->value}}</div>
                                @else
                                    <input type="hidden" id="variation-title-{{$variation->value}}" class="variation-item-title" value="{{$variation->title}}">
                                    <div class="variation-item">{{$variation->value}}</div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="quantity-box">
                        <div class="quantity-selector is-minus">
                            
                        </div>
                        <input type="number" class="quanity-input" id="quantity_input" name="quantity_input" step="1" min="1" max="10" value="1" size="4" pattern="[0-9]*" inputmode="numeric">
                        <div class="quantity-selector is-plus">
                            
                        </div>
                    </div>
                    <a href="#" class="hover-icon d-none">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                            <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.6 7.6 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
                        </svg>
                        <span class="hover-tag">Add to Wishlist</span>
                    </a>
                    <div class="d-flex flex-column modal-buttons mt-3">
                        <button type="submit" onclick="addtocart()" class="btn-6 mb-2">ADD TO CART</button>
                        <button type="submit" onclick="buynow()" class="shaking-btn btn-7 mb-3 home-modal-order-btn" href="#buynow_modal" data-toggle="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill mr-2 mb-1" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4z"/>
                            </svg>
                            Order Now - Cash on Delivery
                        </button>
                    </div>
                </div>
            </div>
            <p style="border-top: 1px solid #d3d2d2;width: 100%;margin: 10px 0px;"></p>
            <div class="d-flex flex-column align-items-center">
                {{-- <!-- Tabs navs -->
                <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                    <a
                        data-mdb-tab-init
                        class="nav-link active"
                        id="ex1-tab-1"
                        href="#ex1-tabs-1"
                        role="tab"
                        aria-controls="ex1-tabs-1"
                        aria-selected="true"
                        >Description</a
                    >
                    </li>
                    <li class="nav-item" role="presentation">
                    <a
                        data-mdb-tab-init
                        class="nav-link"
                        id="ex1-tab-2"
                        href="#ex1-tabs-2"
                        role="tab"
                        aria-controls="ex1-tabs-2"
                        aria-selected="false"
                        >Reviews</a
                    >
                </ul>
                <!-- Tabs navs --> --}}
                
                <!-- Tabs content -->
                <div class="tab-content w-100" id="ex1-content">
                    <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                        <?php echo $product->description; ?>
                    </div>
                    <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                        Reviews
                    </div>
                </div>
                <!-- Tabs content -->
            </div>
            <div class="mt-4 w-100">
                <hr>
                <h3 class="main-heading mt-4">You may also like</h3>
                <div class="row container-fluid mt-4 home-grid featured-product-grid">
                    @foreach($products as $key => $product)
                    @if($key == 3) @break @endif
                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
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
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@section('models')
    <div class="modal fade poppins-all" tabindex="-1" id="buynow_modal">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">

                <div class="modal-body cart-modal" style="padding:26px;">
                     <!--begin::Close-->
                     <div class="model-close-btn btn-icon btn-active-light-primary ml-2 cursor-pointer" data-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                        </svg>
                    </div>
                    <!--end::Close-->
                    <form action="{{url('cart')}}" method="post">
                        @csrf
                        <input type="hidden" id="product" name="product[]" value="">
                        <input type="hidden" id="product_id" name="product_id[]" value="{{$product->id}}">
                        <input type="hidden" id="product_variation_title" name="product_variation_title[]" value="">
                        <input type="hidden" id="product_variation_value" name="product_variation_value[]" value="">
                        <input type="hidden" id="product_quantity" name="product_quantity[]" value="">
                        <input type="hidden" id="product_price" name="product_price[]" value="{{$product->price}}">
                        <input type="hidden" id="product_sub_total" name="product_sub_total[]" value="">
                        <div class="item d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center text-start">
                                <img class="mr-4" src="{{url($product->images[0])}}" width="50px" alt="{{$product->title}}">
                                <div class="product-details d-flex flex-column">
                                    <a href="#" class="product-name">{{$product->title}}</a>
                                    <span class="product-variation" id="product-variation"></span>
                                    {{-- <a href="" class="py-1 cart-box-delete" id="cart-box-delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#e60000" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                    </a> --}}
                                </div>
                            </div>
                            <div class="price mr-1 d-flex align-items-center justify-content-center">
                                <p class="m-0 nor-text" id="price_and_quantity"></p>
                            </div>
                        </div>

                        <div class="modal-total-box mb-2 p-2 d-flex flex-row justify-content-between align-items-center">
                            <p class="text-3 m-0">Total</p>
                            <input type="hidden" name="total" id="total" value="">
                            <p class="text-3 m-0" id="total_show"></p>
                        </div>
                        <div class="row d-flex align-items-center mb-1 mr-sm-2">
                            <div class="col-sm-3">
                                <span class="required text-3">Name</span><span class="text-danger">*</span>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="icon-user fs-20"></i></div>
                                    </div>
                                    <input type="text" class="form-control name" name="name" placeholder="Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex align-items-center mb-1 mr-sm-2">
                            <div class="col-sm-3">
                                <span class="required text-3">Phone</span><span class="text-danger">*</span>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="icon-phone fs-20"></i></div>
                                    </div>
                                    <input type="integer" class="form-control phone" name="phone" placeholder="Phone" required>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex align-items-center mb-1 mr-sm-2">
                            <div class="col-sm-3">
                                <span class="required text-3">Whatsapp</span>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="icon-whatsapp fs-20"></i></div>
                                    </div>
                                    <input type="integer" class="form-control whatsapp" name="whatsapp" placeholder="Whatsapp (optional)">
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex align-items-center mb-1 mr-sm-2">
                            <div class="col-sm-3">
                                <span class="required text-3">Email</span>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="icon-envelope fs-20"></i></div>
                                    </div>
                                    <input type="email" class="form-control email" name="email" placeholder="Email (optional)">
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex align-items-center mb-1 mr-sm-2">
                            <div class="col-sm-3">
                                <span class="required text-3">Address</span><span class="text-danger">*</span>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="icon-map-marker fs-20"></i></div>
                                    </div>
                                    <input type="text" class="form-control address" name="address" placeholder="Delivery Address" required>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex align-items-center mb-1 mr-sm-2">
                            <div class="col-sm-3">
                                <span class="required text-3">City</span><span class="text-danger">*</span>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <select id="city-select" name="city" class="city-select form-control" required>
                                        <option value="" disabled selected>Select The City</option>
                                        <option>Abbottabad</option>
                                        <option>BAGNOTER</option>
                                        <option>GOHARABAD</option>
                                        <option>HARNO</option>
                                        <option>JHUGIAN</option>
                                        <option>JINNAHABAD</option>
                                        <option>KAKOOL ( PMA)</option>
                                        <option>KALA BAGH (P.A.</option>
                                        <option>MALIK PURA</option>
                                        <option>MANDIAN</option>
                                        <option>MUSLIMABAD</option>
                                        <option>NAWAN SHER</option>
                                        <option>REHMATABAD</option>
                                        <option>SHIMLA HILL</option>
                                        <option>Attock</option>
                                        <option>ATTOCK KHURD</option>
                                        <option>BROTHA</option>
                                        <option>GHAZI</option>
                                        <option>GONDAL</option>
                                        <option>HATTIAN</option>
                                        <option>Hazro</option>
                                        <option>Kamra</option>
                                        <option>LAWRENCEPUR</option>
                                        <option>MALAN MANSOOR</option>
                                        <option>MANSHERA CAMP</option>
                                        <option>RANGO</option>
                                        <option>SHINKA</option>
                                        <option>Tarbela Dam</option>
                                        <option>WAISA</option>
                                        <option>Badin</option>
                                        <option>GOLARCHI</option>
                                        <option>KHOSKI</option>
                                        <option>Matli</option>
                                        <option>TALHAR</option>
                                        <option>TANDO BAGO</option>
                                        <option>TANDO GHULAM AL</option>
                                        <option>Tando Mohd.khan</option>
                                        <option>Bahawalnagar</option>
                                        <option>Chistian</option>
                                        <option>Haroonabad</option>
                                        <option>CHAK ABDULLAH</option>
                                        <option>DHARANWALA</option>
                                        <option>Faqir Wali</option>
                                        <option>FORT ABBAS</option>
                                        <option>MANDI SADIQ GUN</option>
                                        <option>MINCHIN ABAD</option>
                                        <option>MOHAR SHARIF</option>
                                        <option>Bahawalpur</option>
                                        <option>Ahmad Pur East</option>
                                        <option>Dunya Pur</option>
                                        <option>KAHROR PAKKA</option>
                                        <option>KHAIRPUR TAMIAN</option>
                                        <option>Lodhran</option>
                                        <option>NOORPUR NORANGA</option>
                                        <option>SATIYANA</option>
                                        <option>SYED WALA</option>
                                        <option>UCH SHARIF</option>
                                        <option>Yazman Mandi</option>
                                        <option>Bannu</option>
                                        <option>MIRAN SHAH</option>
                                        <option>DOMAIL</option>
                                        <option>Lakki Marwat</option>
                                        <option>SARAI NAURANG</option>
                                        <option>Batkhela</option>
                                        <option>ABOHA</option>
                                        <option>AMAN DARA</option>
                                        <option>BARIKOT</option>
                                        <option>CHAKDARA</option>
                                        <option>DARBAR(HAJIABAD</option>
                                        <option>DHERI JULAGRAM</option>
                                        <option>GULABAD</option>
                                        <option>KHAR (BATKHELA)</option>
                                        <option>KOTA</option>
                                        <option>Malakand</option>
                                        <option>Bhai Pheru</option>
                                        <option>Manga Mandi</option>
                                        <option>CHANGA MANGA</option>
                                        <option>HEAD BALOKI ROA</option>
                                        <option>Bhakkar</option>
                                        <option>BEHAL</option>
                                        <option>DULEWALA</option>
                                        <option>HYDER ABAD THAL</option>
                                        <option>NAWAN JANDANWAL</option>
                                        <option>Bhimber A. K</option>
                                        <option>AMBRIALA CHOWK</option>
                                        <option>BARNALA (A.K)</option>
                                        <option>BHRING (A.K)</option>
                                        <option>CHOWKI (A.K)</option>
                                        <option>DHANDER (KALAN)</option>
                                        <option>DHOK DAURA (A.K</option>
                                        <option>KADHALA (A.K)</option>
                                        <option>KALARY MORE(A.K</option>
                                        <option>KOT JAMEL (A.K)</option>
                                        <option>LIAQATABAD(A.K)</option>
                                        <option>SMAHNI (A.K)</option>
                                        <option>BUNNER</option>
                                        <option>BAZARGAI</option>
                                        <option>Burewala</option>
                                        <option>GAGGO MANDI</option>
                                        <option>Chakwal</option>
                                        <option>AMIN ABAD</option>
                                        <option>AMIR PUR MANGAN</option>
                                        <option>BHAGWAL</option>
                                        <option>BHAUN</option>
                                        <option>BHIKARI KALAN</option>
                                        <option>BHUBBAR</option>
                                        <option>CHAK BAQAR SHAH</option>
                                        <option>CHAK BELI KHAN</option>
                                        <option>CHAMBI</option>
                                        <option>Choa Saidan Sha</option>
                                        <option>DAHEWAL</option>
                                        <option>DALWAL</option>
                                        <option>DHODA</option>
                                        <option>DHOKE BADIAL</option>
                                        <option>DHOKE MAKEN</option>
                                        <option>DHUDIAL</option>
                                        <option>DHURKANA</option>
                                        <option>DOREY</option>
                                        <option>KALAR KAHAR</option>
                                        <option>KERYALA</option>
                                        <option>MAGHAL</option>
                                        <option>MIANI</option>
                                        <option>MOHARA GULSHER</option>
                                        <option>MOHUTA MOHRA</option>
                                        <option>MULHAL MUGHALAN</option>
                                        <option>MURID</option>
                                        <option>PERIAL</option>
                                        <option>PINDI GUJRAN</option>
                                        <option>SALOI</option>
                                        <option>SARAI CHOWK</option>
                                        <option>SARKALAN</option>
                                        <option>SIRGUDHAN</option>
                                        <option>SOHAWA DEWALIAN</option>
                                        <option>TATRAL</option>
                                        <option>THANIL FATOI</option>
                                        <option>VEHALIZER</option>
                                        <option>Chicha Watni</option>
                                        <option>GHAZIABAD</option>
                                        <option>HARAPPA STATION</option>
                                        <option>KAMALIA</option>
                                        <option>Chiniot</option>
                                        <option>Chitral</option>
                                        <option>DARROSH</option>
                                        <option>Dadu</option>
                                        <option>BHAN SAEED ABAD</option>
                                        <option>PHULJI STATION</option>
                                        <option>Sehwan</option>
                                        <option>SITA ROAD(REHMA</option>
                                        <option>Dadyal (a.k)</option>
                                        <option>AKAL GARH (A.K)</option>
                                        <option>BATHRUI (A.K)</option>
                                        <option>CHAK SWARI(A.K)</option>
                                        <option>DHANGRI BALA (A</option>
                                        <option>EISER (A.K)</option>
                                        <option>HAMID PUR (A.K)</option>
                                        <option>ISLAM GARH(A.K)</option>
                                        <option>KARKRA TOWN(A.K</option>
                                        <option>KHANABAD (A.K)</option>
                                        <option>PANYAM (A.K)</option>
                                        <option>PIND KALAN(A.K)</option>
                                        <option>PIND KHURD(A.K)</option>
                                        <option>PLAK (A.K)</option>
                                        <option>SARANDA (A.K)</option>
                                        <option>TANGDEW (A.K)</option>
                                        <option>TRUTTA (A.K)</option>
                                        <option>Daska</option>
                                        <option>GLOTIAN MORR</option>
                                        <option>JAISERWALA</option>
                                        <option>KANDAL SAYAN</option>
                                        <option>Mandranwala</option>
                                        <option>MITRANWALI</option>
                                        <option>RANJHI</option>
                                        <option>Sohawa</option>
                                        <option>Dera Ghazi Khan</option>
                                        <option>CHOTI</option>
                                        <option>FAZILPUR DHUNDH</option>
                                        <option>Jampur</option>
                                        <option>KOT MITHAN</option>
                                        <option>MOHMMADPUR DIWA</option>
                                        <option>PAIGAH</option>
                                        <option>Rajanpur</option>
                                        <option>Dera Ismail Khan</option>
                                        <option>PAROVA</option>
                                        <option>TANK</option>
                                        <option>Faisalabad</option>
                                        <option>Khurrianwala</option>
                                        <option>CHAK JHUMRA</option>
                                        <option>Sangla Hill</option>
                                        <option>GADOON AMAZAI</option>
                                        <option>GILGIT</option>
                                        <option>CHILAS</option>
                                        <option>ASTORE</option>
                                        <option>BHONE</option>
                                        <option>Gojra</option>
                                        <option>ADDA PENSRA</option>
                                        <option>ADDA THIKRIWALA</option>
                                        <option>Gujar Khan</option>
                                        <option>BEWAL</option>
                                        <option>DAUL TALA</option>
                                        <option>HARNAL</option>
                                        <option>ISLAM PURA JABB</option>
                                        <option>JAND NAGAR</option>
                                        <option>KALLAR SAYDIAN</option>
                                        <option>KANYAL</option>
                                        <option>Mandra</option>
                                        <option>MOHRA NOORI</option>
                                        <option>PAKKA KHUH</option>
                                        <option>Rawat</option>
                                        <option>SACOTE</option>
                                        <option>SAGRI</option>
                                        <option>SHAH BAGH</option>
                                        <option>Gujranwala</option>
                                        <option>alipur chattha</option>
                                        <option>Hafizabad</option>
                                        <option>JALAL PUR BHATT</option>
                                        <option>Kamoki</option>
                                        <option>NOWSHERA VIRKAN</option>
                                        <option>QILA DEDAR SING</option>
                                        <option>GHUMAN WALA</option>
                                        <option>JIBBRAN MANDI</option>
                                        <option>KOT JE SING</option>
                                        <option>KOULO TARRAR</option>
                                        <option>MURALI WALA</option>
                                        <option>Rahwali</option>
                                        <option>RAJA SADOKEY</option>
                                        <option>RASOOL PUR TARR</option>
                                        <option>VANKY TARER</option>
                                        <option>Gujrat</option>
                                        <option>BAHUWAL</option>
                                        <option>BOKEN MORE</option>
                                        <option>DAULATPUR SAFAN</option>
                                        <option>Fatehpur</option>
                                        <option>HARIYAWALA</option>
                                        <option>Kotla Arab Ali</option>
                                        <option>SABOOR SHARIF</option>
                                        <option>SAROKI</option>
                                        <option>Haripur</option>
                                        <option>HATTAR IND. EST</option>
                                        <option>HAVELIAN</option>
                                        <option>KANGRA</option>
                                        <option>KHALABAT SECTOR</option>
                                        <option>KOT NAJEEB ULLA</option>
                                        <option>PANIAN</option>
                                        <option>PIND HASHIM KHA</option>
                                        <option>SARAI NAYMAT KH</option>
                                        <option>Hyderabad</option>
                                        <option>Tando Adam</option>
                                        <option>BHIT SHAH</option>
                                        <option>HALA</option>
                                        <option>Jamshoro</option>
                                        <option>Kotri</option>
                                        <option>Matiyari</option>
                                        <option>SAEEDABAD</option>
                                        <option>Shadadpur</option>
                                        <option>Islamabad</option>
                                        <option>BHARA KHU</option>
                                        <option>Jalal Pur Jattan</option>
                                        <option>BHAGOWAL KALAN</option>
                                        <option>HAJIWALA</option>
                                        <option>Karianwala</option>
                                        <option>MOHINUDIN PUR</option>
                                        <option>TANDA</option>
                                        <option>Jaranwala</option>
                                        <option>AWAGUT</option>
                                        <option>Jauhrabad</option>
                                        <option>GROAT SHEHAR/CA</option>
                                        <option>KATTHA SUGHRAL</option>
                                        <option>KHABEKI</option>
                                        <option>KHORRA</option>
                                        <option>Khushab</option>
                                        <option>MITHA TIWANA</option>
                                        <option>NOORPUR THAL</option>
                                        <option>NOWSHERA DT. KH</option>
                                        <option>PADRAR</option>
                                        <option>QAIDABAD</option>
                                        <option>SHAHPUR CITY</option>
                                        <option>SHAHPUR SADDAR</option>
                                        <option>VEGOWAL</option>
                                        <option>WADHI</option>
                                        <option>Jehangira</option>
                                        <option>AKORA KHATTAQ</option>
                                        <option>KHAIRABAD</option>
                                        <option>Jhang</option>
                                        <option>Ahmad Pur Sial</option>
                                        <option>CHUND</option>
                                        <option>GARH MORE</option>
                                        <option>MALHOONA MORE</option>
                                        <option>MANDI SHAH JUIN</option>
                                        <option>ROODO SULTAN</option>
                                        <option>Jhelum</option>
                                        <option>BHOWANJ</option>
                                        <option>CHAK JAMAL</option>
                                        <option>Deena</option>
                                        <option>GUJARPUR</option>
                                        <option>PAKHWAL</option>
                                        <option>PANDORE</option>
                                        <option>PURAN</option>
                                        <option>Sarai Alamgir</option>
                                        <option>SOHAWA (CITY ON</option>
                                        <option>Karachi</option>
                                        <option>Gawadar</option>
                                        <option>Turbat</option>
                                        <option>Hub Chowki</option>
                                        <option>Panjgour</option>
                                        <option>UTHAL</option>
                                        <option>WINDER</option>
                                        <option>BELA</option>
                                        <option>GIDANI</option>
                                        <option>Lasbela</option>
                                        <option>Kark</option>
                                        <option>Kasur</option>
                                        <option>MANDI USMANWALA</option>
                                        <option>KHAIR PUR MEERU</option>
                                        <option>Kandiaro</option>
                                        <option>KOT DIGEE</option>
                                        <option>Mehrabpur</option>
                                        <option>PIR JO GOTH</option>
                                        <option>Rani Pur</option>
                                        <option>THERI MIR WAH</option>
                                        <option>Khanewal</option>
                                        <option>CHAK 168/10R</option>
                                        <option>JAHANIA</option>
                                        <option>Kabir Wala</option>
                                        <option>PANG KASI</option>
                                        <option>SARDARPUR</option>
                                        <option>SHAMKOT</option>
                                        <option>THATTA (SADIQAB</option>
                                        <option>Khanpur</option>
                                        <option>ZAHIR PEER</option>
                                        <option>Kharian</option>
                                        <option>ATTOWALA</option>
                                        <option>BIDDER MARJAN</option>
                                        <option>DHORIA</option>
                                        <option>DHUNNI</option>
                                        <option>Dinga</option>
                                        <option>NOONAWALI</option>
                                        <option>Khewra</option>
                                        <option>DANDOT</option>
                                        <option>Kohat</option>
                                        <option>HANGU</option>
                                        <option>ALI ZAI KURRAM</option>
                                        <option>BABRI BANDA</option>
                                        <option>BAGGAN</option>
                                        <option>CHAKAR KOT KOHA</option>
                                        <option>GUMBAT</option>
                                        <option>LACHI</option>
                                        <option>MANDURI KURRAM</option>
                                        <option>PARACHINAR</option>
                                        <option>SARO ZAI</option>
                                        <option>TAPPI</option>
                                        <option>THALL</option>
                                        <option>Kot Addu</option>
                                        <option>DAIRA DIN PANNA</option>
                                        <option>MIR PUR BAGHAL</option>
                                        <option>SANAWAN</option>
                                        <option>Taunsa Sharif</option>
                                        <option>Kotli (a. K)</option>
                                        <option>AGHAR JAMALPUR</option>
                                        <option>BRUND BATHA(A.K</option>
                                        <option>CHORAI (A.K)</option>
                                        <option>DAMMAS (A.K)</option>
                                        <option>DANDLI (A.K)</option>
                                        <option>DONGI (A.K)</option>
                                        <option>GOI</option>
                                        <option>GULPUR (A.K)</option>
                                        <option>HAJIABAD (A.K)</option>
                                        <option>HOLAR (A.K)</option>
                                        <option>JUNA (A.K)</option>
                                        <option>KALAH</option>
                                        <option>KAMROTTY (A.K)</option>
                                        <option>KERALA MAJHAN</option>
                                        <option>KHAD GUJRAN(A.K</option>
                                        <option>KHURATTA (A.K)</option>
                                        <option>NAKIYAL (A.K)</option>
                                        <option>NAR (A.K.)</option>
                                        <option>NEW AFZALPUR(AK</option>
                                        <option>PANJEERA (A.K.)</option>
                                        <option>POTHA (A.K.)</option>
                                        <option>PULENDRI (A.K)</option>
                                        <option>SARSAWA (A.K.)</option>
                                        <option>SEHAR MANDI(A.K</option>
                                        <option>SEHNSA (A.K.)</option>
                                        <option>SUPPLY (A.K.)</option>
                                        <option>TALIAN (A.K.)</option>
                                        <option>TATA PANI (A.K)</option>
                                        <option>Lahore</option>
                                        <option>Muridke</option>
                                        <option>CHUNG</option>
                                        <option>Ferozwala</option>
                                        <option>KAHNA NAO</option>
                                        <option>KALA SHAH KAKU</option>
                                        <option>KOT ABDUL MALIK</option>
                                        <option>Shahdara</option>
                                        <option>Lalamusa</option>
                                        <option>Larkana</option>
                                        <option>ARIJA</option>
                                        <option>BADAH</option>
                                        <option>DOKRI</option>
                                        <option>GARIH KHAIRO</option>
                                        <option>KAMBER ALI KHAN</option>
                                        <option>KHAIRPUR NATHAN</option>
                                        <option>LALU RAWANK</option>
                                        <option>Mehar</option>
                                        <option>MIROKHAN</option>
                                        <option>NAUDERO</option>
                                        <option>RADHAN</option>
                                        <option>RATODERO</option>
                                        <option>Shahdadkot</option>
                                        <option>WAGGON</option>
                                        <option>WARAH</option>
                                        <option>Layyah</option>
                                        <option>FATEHPUR (CHAK</option>
                                        <option>HERA (CHAK 134</option>
                                        <option>JAMAN SHAH(SURS</option>
                                        <option>KAROR LAL EASAN</option>
                                        <option>KOT SULTAN(BHAI</option>
                                        <option>LADHANA</option>
                                        <option>LALA ZAR(CHAK 1</option>
                                        <option>PIR JAGI(CHAK 1</option>
                                        <option>JAUNPUR</option>
                                        <option>KHAN BELA</option>
                                        <option>Liaqatpur</option>
                                        <option>TRANDA MOHD. PA</option>
                                        <option>Mandi Bahauddin</option>
                                        <option>BADSHAHPUR</option>
                                        <option>BHIKI SHARIF</option>
                                        <option>BHIKO MORE</option>
                                        <option>GOJRA ( MANDI B</option>
                                        <option>HARIAH RAILWAY</option>
                                        <option>KUTHIALA SHEIKH</option>
                                        <option>LAIDHER</option>
                                        <option>PAHRIANWALI ADD</option>
                                        <option>PHALIA</option>
                                        <option>QADIRABAD</option>
                                        <option>WASU</option>
                                        <option>MOHLANWAL</option>
                                        <option>Mansehra</option>
                                        <option>ATTAR SHISHA</option>
                                        <option>BALAKOT</option>
                                        <option>Batgram</option>
                                        <option>BEESHAM</option>
                                        <option>GARHI HABIB ULL</option>
                                        <option>GHAZIKOT TOWNSH</option>
                                        <option>HAJIABAD ICHRIA</option>
                                        <option>NEWDARBAND TOWN</option>
                                        <option>OUGHI</option>
                                        <option>Qalandarabad</option>
                                        <option>SHANKIARI</option>
                                        <option>Mardan</option>
                                        <option>Charsadda</option>
                                        <option>BALA GARHI</option>
                                        <option>GARHI DOULAT ZA</option>
                                        <option>GUJAR GARHI</option>
                                        <option>JAMAL GARI</option>
                                        <option>KATLANG</option>
                                        <option>MAYAR</option>
                                        <option>RAJAR</option>
                                        <option>RASHAKAI</option>
                                        <option>SARDHERI</option>
                                        <option>SHEWA ADDA</option>
                                        <option>UMAR ZAI</option>
                                        <option>Mian Channu</option>
                                        <option>ABDUL HAKIM</option>
                                        <option>AGWANA</option>
                                        <option>ARIFABAD</option>
                                        <option>KOT ISLAM</option>
                                        <option>KOT SUJAN SING</option>
                                        <option>MAKADOOMPUR POK</option>
                                        <option>PULL BAGER</option>
                                        <option>PULL NO. 12 MEL</option>
                                        <option>TULAMBA</option>
                                        <option>Mianwali</option>
                                        <option>BALOKHEL CITY</option>
                                        <option>CHASHMA</option>
                                        <option>DAUDKHEL</option>
                                        <option>EASAKHEL</option>
                                        <option>GULAN KHEL</option>
                                        <option>KALA BAGH</option>
                                        <option>KALOR KOT</option>
                                        <option>KOT CHANDNAN</option>
                                        <option>KUNDIAN</option>
                                        <option>LIAQATABAD(PIPL</option>
                                        <option>PHAKI SHAH MARD</option>
                                        <option>Mingora (swat)</option>
                                        <option>CHAR BAGH (SWAT</option>
                                        <option>GUMBAT MERA</option>
                                        <option>JOR (BUNNER)</option>
                                        <option>MATTA (SWAT)</option>
                                        <option>SAIDU SHARIF (S</option>
                                        <option>Mirpur (a. K)</option>
                                        <option>CHECHIAN (A.K.)</option>
                                        <option>CHITTAR PARI</option>
                                        <option>JATLAN (A.K.)</option>
                                        <option>KHALIQ ABAD(A.K</option>
                                        <option>Mangla Hamlet (a.k.)</option>
                                        <option>MANGLA DAM</option>
                                        <option>PANDI SABARWAL</option>
                                        <option>PULL MANDA (A.K</option>
                                        <option>TARIQ ABAD (A.K</option>
                                        <option>Mirpur Khas</option>
                                        <option>BACHA BAND</option>
                                        <option>DIGRI</option>
                                        <option>HINGORNO</option>
                                        <option>JHUDO</option>
                                        <option>KHIPRO</option>
                                        <option>KOT GHULAM MOHD</option>
                                        <option>Kunri</option>
                                        <option>MITHI</option>
                                        <option>PITHORO</option>
                                        <option>SAMARO</option>
                                        <option>TANDO JAN MOHD.</option>
                                        <option>THARPARKER</option>
                                        <option>Umer Kot</option>
                                        <option>Mirpur Mathelo</option>
                                        <option>Ghotki</option>
                                        <option>ADIL PUR</option>
                                        <option>DAD LAGHARI</option>
                                        <option>Dharki</option>
                                        <option>JARWAR</option>
                                        <option>KHANPUR MEHER</option>
                                        <option>Moro</option>
                                        <option>MITHIANI</option>
                                        <option>NEW JATOI</option>
                                        <option>Multan</option>
                                        <option>JHARIAN</option>
                                        <option>Narang Mandi</option>
                                        <option>Murree</option>
                                        <option>BHURBAN PEARL C</option>
                                        <option>LOWER TOPA</option>
                                        <option>SEHER BAGLA</option>
                                        <option>Muzaffarabad(ak)</option>
                                        <option>AMBOR AREA</option>
                                        <option>Bagh (a.k.)</option>
                                        <option>CHAKOTHI (A.K.)</option>
                                        <option>CHAMANKOT (A.K)</option>
                                        <option>CHATTAR AREA</option>
                                        <option>CHELLA BANDI (A</option>
                                        <option>DHANI BOMBIAN</option>
                                        <option>EIDGAH ROAD</option>
                                        <option>GARHI DOPATTA</option>
                                        <option>HARI GHEL</option>
                                        <option>JALABAD (A.K.)</option>
                                        <option>KOHRI (A.K.)</option>
                                        <option>NOMANPURA</option>
                                        <option>PATTIKA (A.K.)</option>
                                        <option>RANGLA (A.K.)</option>
                                        <option>SARRAN (A.K.)</option>
                                        <option>SHOUKAT LINES</option>
                                        <option>Muzaffargarh</option>
                                        <option>Alipur</option>
                                        <option>Chowk Sarwar Sh</option>
                                        <option>Khangarh</option>
                                        <option>KHANPUR SHOMALI</option>
                                        <option>LALPIR (THERMA</option>
                                        <option>Mehmoodkot</option>
                                        <option>QADIRPUR RAWAN</option>
                                        <option>QASBA GRT. CHAK</option>
                                        <option>narowal</option>
                                        <option>ALIPUR SAYYADAN</option>
                                        <option>SHAKAR GARH</option>
                                        <option>ZAFARWAL</option>
                                        <option>Nawab Shah</option>
                                        <option>SANGHAR</option>
                                        <option>AKRI</option>
                                        <option>BUCHERI</option>
                                        <option>DAUR</option>
                                        <option>KAROONDI</option>
                                        <option>KHADRO</option>
                                        <option>PACCA CHANG</option>
                                        <option>QAZI AHMAD</option>
                                        <option>SAKRAND</option>
                                        <option>SHAH PUR CHAKAR</option>
                                        <option>REHMANI NAGAR</option>
                                        <option>Nowshera</option>
                                        <option>KHAT KALI</option>
                                        <option>PAR NOWSHERA</option>
                                        <option>Risal Pur</option>
                                        <option>TARNAB FARM(AGR</option>
                                        <option>DARBELLO</option>
                                        <option>DARYA KHAN MARI</option>
                                        <option>Nowshero Feroz</option>
                                        <option>THARU SHAH</option>
                                        <option>Okara</option>
                                        <option>BASSER PUR</option>
                                        <option>Depalpur</option>
                                        <option>HUJRA SHAH MUKE</option>
                                        <option>MANDI HEERA SIN</option>
                                        <option>RENALAKHURD</option>
                                        <option>CHAWINDA</option>
                                        <option>KALASWALA</option>
                                        <option>Pasrur</option>
                                        <option>Pattoki</option>
                                        <option>KANGANPUR</option>
                                        <option>TALVANDI</option>
                                        <option>THEENG MORE(ALL</option>
                                        <option>Peshawar</option>
                                        <option>DARA ADAM KHEL</option>
                                        <option>SHABQADAR</option>
                                        <option>Pind Dadan Khan</option>
                                        <option>JALALPUR SHARIF</option>
                                        <option>Quetta</option>
                                        <option>Khuzdar</option>
                                        <option>PISHIN</option>
                                        <option>CHAMAN</option>
                                        <option>KALAT</option>
                                        <option>LORALAI</option>
                                        <option>MASTUNG</option>
                                        <option>NUSHKI</option>
                                        <option>Zhob</option>
                                        <option>AWARAN</option>
                                        <option>JIWANI</option>
                                        <option>KHARAN</option>
                                        <option>MACH</option>
                                        <option>MUSLIM BAGH</option>
                                        <option>OREMARA TOWN</option>
                                        <option>Rabwa</option>
                                        <option>Rahim Yar Khan</option>
                                        <option>Raiwind</option>
                                        <option>KOT RADHA KISHA</option>
                                        <option>Rawalakot (a.k)</option>
                                        <option>ABBASPUR (A.K)</option>
                                        <option>AWAN ABAD(BATHI</option>
                                        <option>AZIZ ABAD (A.K.</option>
                                        <option>BLOOUCH (A.K.)</option>
                                        <option>CHAK BAZAAR(A.K</option>
                                        <option>CHOTTAGLA (A.K)</option>
                                        <option>GALA KNATHA</option>
                                        <option>HAJIRA (A.K.)</option>
                                        <option>JUNDATHI (A.K)</option>
                                        <option>KHAIGALA (A.K.)</option>
                                        <option>KHARICK</option>
                                        <option>MONG (A.K.)</option>
                                        <option>MUJAHID ABAD (A</option>
                                        <option>NAKKAH BAZAR(A.</option>
                                        <option>PANYIOLA (A.K.)</option>
                                        <option>QILLAN (A.K.)</option>
                                        <option>SINGOLA (A.K.)</option>
                                        <option>TANGI GALA (A.</option>
                                        <option>THORAR (A.K.)</option>
                                        <option>TOPA (A.K.)</option>
                                        <option>TRARKHAIL (A.K)</option>
                                        <option>Rawalpindi</option>
                                        <option>Fateh Jang</option>
                                        <option>Jand</option>
                                        <option>Pindi Gheb</option>
                                        <option>CHAKLALA</option>
                                        <option>IKHLAS (DIST. A</option>
                                        <option>Kahuta</option>
                                        <option>KHORE</option>
                                        <option>Tarnol</option>
                                        <option>Sadiqabad</option>
                                        <option>GOTH MACHI</option>
                                        <option>KASHMOOR</option>
                                        <option>SUI</option>
                                        <option>Sahiwal</option>
                                        <option>Arifwala</option>
                                        <option>Pakpattan</option>
                                        <option>BONGA HAYAT</option>
                                        <option>NOOR SHAH</option>
                                        <option>QABOOLA SHARIF</option>
                                        <option>Samundri</option>
                                        <option>ADDA PHLOOR ONL</option>
                                        <option>DIJKOT</option>
                                        <option>KHIDAR WALA</option>
                                        <option>MAMON KANJAN</option>
                                        <option>MURID WALA</option>
                                        <option>TANDLIANWALA</option>
                                        <option>Sargodha</option>
                                        <option>ALI PUR SYEDAN</option>
                                        <option>BHAGATANWALA</option>
                                        <option>Bhalwal</option>
                                        <option>BHERA</option>
                                        <option>FAROOQA</option>
                                        <option>HAZOOR PUR</option>
                                        <option>Kot Momin</option>
                                        <option>Lallian</option>
                                        <option>NEHANG</option>
                                        <option>PHULLARWAN</option>
                                        <option>PULL 111 CHAK</option>
                                        <option>RADHEN</option>
                                        <option>SAHIWAL (NAWAN</option>
                                        <option>Sial Sharif</option>
                                        <option>SILLANWALI</option>
                                        <option>Sheikhupura</option>
                                        <option>BURG ATTARI</option>
                                        <option>DERA MALLA SIN</option>
                                        <option>FAIZPUR KHURD</option>
                                        <option>Farooqabad</option>
                                        <option>Feroz Watwan</option>
                                        <option>KHAN GAH DOGRAN</option>
                                        <option>Manawala</option>
                                        <option>MANDI DHABA SIN</option>
                                        <option>MANDI SAFDAR AB</option>
                                        <option>Nankana Sahib</option>
                                        <option>Pindi Bhattian</option>
                                        <option>SAFDARABAD</option>
                                        <option>Shahkot</option>
                                        <option>SHARAQPUR SHARI</option>
                                        <option>KHAN KA SHARIF</option>
                                        <option>Shujabad</option>
                                        <option>JALALPUR PIRWAL</option>
                                        <option>Sialkot</option>
                                        <option>BHOPALWALA</option>
                                        <option>GHUENKE</option>
                                        <option>JHETEKE</option>
                                        <option>KOTLI LOHARAN</option>
                                        <option>QILA SAIFULLAH</option>
                                        <option>Sambrial</option>
                                        <option>Jacobabad</option>
                                        <option>Shikarpur</option>
                                        <option>Sukkur</option>
                                        <option>Dera ala yar</option>
                                        <option>Dera Murad Jama</option>
                                        <option>DHADAR</option>
                                        <option>GAMBAT</option>
                                        <option>GARHI KHERO</option>
                                        <option>GARHI YASIN</option>
                                        <option>HALANI</option>
                                        <option>HARNAI</option>
                                        <option>JOHI</option>
                                        <option>KHAN PUR DISTT.</option>
                                        <option>KOT DEJI</option>
                                        <option>LAKHI GHULAM SH</option>
                                        <option>Pano Aqil</option>
                                        <option>Rohri</option>
                                        <option>SIBBI</option>
                                        <option>Sultan Kot</option>
                                        <option>THEHRI</option>
                                        <option>THULL</option>
                                        <option>USTA MUHAMMAD</option>
                                        <option>SWABI</option>
                                        <option>KALABAT</option>
                                        <option>KHOTA</option>
                                        <option>MARGAZ</option>
                                        <option>TAND KOI</option>
                                        <option>TOPI</option>
                                        <option>Takht-e-Bhai</option>
                                        <option>DARGAI</option>
                                        <option>HARI CHAND</option>
                                        <option>JALALA</option>
                                        <option>Talagang</option>
                                        <option>Tamirgaraha</option>
                                        <option>Dir</option>
                                        <option>DARRORA</option>
                                        <option>HAJI ABAD</option>
                                        <option>HAYA SERAI</option>
                                        <option>KHAAL</option>
                                        <option>KHAR (BAJORE AG</option>
                                        <option>SAHIB ABAD</option>
                                        <option>SHER KHANIE</option>
                                        <option>Tando ala yar</option>
                                        <option>Tando Jam</option>
                                        <option>Thatha</option>
                                        <option>CHOHAR JAMALI</option>
                                        <option>DHABEJI</option>
                                        <option>Gharo</option>
                                        <option>MAKLI</option>
                                        <option>MIR PUR SAKRO</option>
                                        <option>SUJAWAL</option>
                                        <option>Toba Tek Sing</option>
                                        <option>Pirmahal</option>
                                        <option>RAJANA</option>
                                        <option>SANDHIANWALI</option>
                                        <option>Shorkot Cantt.</option>
                                        <option>Vehari</option>
                                        <option>ADDA PAKHI MORE</option>
                                        <option>DOKOTA</option>
                                        <option>Hasilpur</option>
                                        <option>LUDDAN</option>
                                        <option>MACHIWAL</option>
                                        <option>Mailsi</option>
                                        <option>THAINGI</option>
                                        <option>TIBBA SULTAN PU</option>
                                        <option>Wah Cantt</option>
                                        <option>Hassan Abdal</option>
                                        <option>POURMIANA</option>
                                        <option>Taxila</option>
                                        <option>Wazirabad</option>
                                        <option>ADDA AUJLA KALA</option>
                                        <option>AHMAD NAGAR</option>
                                        <option>Elahabad</option>
                                        <option>AZIZ CHAK</option>
                                        <option>Gakkhar Mandi</option>
                                        <option>KARMABAD</option>
                                        <option>KHAIW WALI</option>
                                        <option>Nizamabad</option>
                                        <option>NOORIABAD</option>
                                        <option>DOLTA</option>
                                        <option>SHER SHAH</option>
                                        <option>MIRUPR BATHORO</option>
                                        <option>HAYATABAD</option>
                                        <option>BADOMALHI</option>
                                        <option>QILA KALLARWALA</option>
                                        <option>JHAWARIYA</option>
                                        <option>MOUCH</option>
                                        <option>BHABRRA</option>
                                        <option>ZIABAD</option>
                                        <option>SARA-E- KARISHAN</option>
                                        <option>HABIBABAD</option>
                                        <option>DHURNAL</option>
                                        <option>FAQIRABAD</option>
                                        <option>SANGHI</option>
                                        <option>DAULAT PUR</option>
                                        <option>MALAKWAL</option>
                                        <option>Ghous Pur</option>
                                        <option>Sobho Dero</option>
                                        <option>Chak</option>
                                        <option>SHADUN LUND</option>
                                        <option>KARAM PUR</option>
                                        <option>JAMAL PUR</option>
                                        <option>DHANOT</option>
                                        <option>MUBARAK PUR</option>
                                        <option>DERA BAKHA</option>
                                        <option>JAFFARABAD</option>
                                        <option>CHOWK MUNDA</option>
                                        <option>MITRO</option>
                                        <option>JAMAL DIN WALI</option>
                                        <option>JHAMPEER</option>
                                        <option>ISLAMKOT</option>
                                        <option>Khairpur</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn-7 w-100 mt-3" id="submit-button" onclick="disabled_button('buynow_modal','submit-button')" type="submit"></button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('frontend/js/product.js')}}"></script>
    <script src="{{asset('frontend/js/splide.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/mdb.umd.min.js')}}"></script>
    {{-- <script src="{{asset('frontend/js/bootstrap-cart.bundle.min.js')}}"></script> --}}
    <script>
        
    </script>
@endsection
