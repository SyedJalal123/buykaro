<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Online Shoping In Pakistan - Buy Karo</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Discover the best online shopping experience in Pakistan at buykaro.pk. Explore a vast selection of trendy products at Buy Karo. Enjoy secure payments, fast shipping, and unbeatable prices at BuyKaro. Elevate your lifestyle with the latest trends at your fingertips. Shop now for best deals.">
    <meta name="author" content="p-themes">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('frontend/assets/images/icons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('frontend/assets/images/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('frontend/assets/images/icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('frontend/assets/images/icons/site.html')}}">
    <link rel="mask-icon" href="{{asset('frontend/assets/images/icons/safari-pinned-tab.svg')}}" color="#666666">
    <link rel="shortcut icon" href="{{asset('frontend/assets/images/icons/favicon.ico')}}">
    <meta name="apple-mobile-web-app-title" content="Buy Karo">
    <meta name="application-name" content="Buy Karo">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{asset('frontend/assets/images/icons/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset('frontend/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css')}}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/jquery.countdown.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/skins/skin-demo-13.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/demos/demo-13.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    @yield('styles')
    <style>
        @media screen and (max-width: 575px) {
            .compare-dropdown, .wishlist-link {
                display: flex !important;
            }
        }
    </style>
    <script>
        PR_URL = "{{URL('')}}";
    </script>
</head>


<body>
    <div class="page-wrapper">
        @include('frontend.includes.header')<!-- End .header -->

        <main class="main">
            @yield('content')
        </main><!-- End .main -->

        @include('frontend.includes.footer')<!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    @include('frontend.includes.mobile-menu')
    <!-- End .mobile-menu-container -->

    <!-- Sign in / Register Modal -->
    @include('frontend.includes.signup-login')
    <!-- End .modal -->

    @include('frontend.includes.newsletter-popup')

    <!-- Plugins JS File -->
    <script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/superfish.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.plugin.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('frontend/js/sweetalert2.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <!-- Main JS File -->
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>
    <script src="{{asset('frontend/assets/js/demos/demo-13.js')}}"></script>
    <script>
        $(document).ready(function(){
            if($('#success-subscribed').val() == 1){
                Swal.fire({
                    icon: "success",
                    title: "Successfully Subscribed",
                    showConfirmButton: false,
                    timer: 3000,
                    showCloseButton: true,
                    footer: '<a href="'+PR_URL+'/collections/all" class="btn-3">GO TO SHOP</a>'
                });
            }
            $(document).on('click', '.is-delete-cart', function(){
                id = $(this).attr('id');
                // Get Data
                $.ajax({
                    url: PR_URL+"/change_qty",
                    type: "POST",
                    data:{ 
                        ids: id.split('__'),
                        quantity: 0,
                    },
                    success: function(response){
                        location. reload();
                    }
                }); 
            });
            window.onload = function() { 
                if($('#signup_modal_value').val() == 'open'){
                    $('#signin-modal').modal('show');
                }
                if($('#signup_modal_value').val() == 'open_password'){
                    $('#signin-modal').modal('show');
                    $('.tab-content #signin').removeClass('show').removeClass('active');
                    $('.tab-content #register').addClass('show').addClass('active');

                    $('.nav-item #signin-tab').removeClass('active');
                    $('.nav-item #register-tab').addClass('active');
                }
            }
            $('#city-select-header').select2({
                dropdownParent: $('#header_buynow_modal .modal-body')
            });
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('keyup', '.search-bar', function(){
            $('.search-bar-content').removeClass('d-none');
            $('.loading').removeClass('d-none');
            $('.search-bar-body').addClass('d-none');
            $('.empty-data').addClass('d-none');
            val = $(this).val();
            
            if(val == ""){
                $('.search-bar-content').addClass('d-none');
                $('.loading').addClass('d-none');
            }else{
                $.ajax({
                    url: PR_URL+"/search_data",
                    type: "POST",
                    data:{ 
                        val: val,
                    },
                    success: function(response){
                        if(response[0].length == 0 && response[1].length == 0){
                            $('.empty-data').removeClass('d-none');
                            $('.loading').addClass('d-none');
                        }else{
                            $('.search-bar-body').removeClass('d-none');
                            $('.loading').addClass('d-none');
                            $('.search-bar-item').remove();

                            html = '';
                            if(response[0].length == 0){
                                html = "<p class='search-bar-item fs-15 mb-1'>No Data Found</p>";
                            }else{
                                for(i=0; i<response[0].length; i++){
                                    html += '<a href="'+PR_URL+'/products/'+response[0][i]['slug']+'" class="d-flex flex-row align-items-center search-bar-item p-1">'+
                                                '<img src="'+PR_URL+'/'+response[0][i]['images'][0]+'" width="40" alt="">'+
                                                '<h6 class="poppins-all ml-3">'+response[0][i]['title']+'</h6>'+
                                            '</a>';
                                }
                            }
                            $('.search-bar-products').append(html);

                            html = '';
                            if(response[1].length == 0){
                                html = "<p class='search-bar-item fs-15 mb-1'>No Data Found</p>";
                            }else{
                                for(i=0; i<response[1].length; i++){
                                    html += '<a href="'+PR_URL+'/collections/'+response[1][i]['slug']+'" class="d-flex flex-row align-items-center search-bar-item p-1">'+
                                                '<img src="'+PR_URL+'/'+response[1][i]['image']+'" width="60" alt="">'+
                                                '<h6 class="poppins-all ml-3">'+response[1][i]['title']+'</h6>'+
                                            '</a>';
                                }
                            }
                            $('.search-bar-collections').append(html);
                        }
                    }
                });
            }
        });
        function addCommas(nStr){
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
    </script>
    <div class="modal fade poppins-all" tabindex="-1" id="header_buynow_modal">
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
                    @php $total = 0; $products_cart = get_carts(); @endphp
                    <form action="{{url('cart')}}" method="post">
                        @csrf
                        @if(auth()->user() !== null)
                            @foreach ($products_cart as $cart)
                                @php
                                    $product_data = get_product_data($cart->product_id);
                                    $sub_total = $cart->price * $cart->quantity;
                                    $total += $sub_total;
                                @endphp
                                <input type="hidden" name="product[]" value="{{$cart->product_id}}-{{$cart->variation_title}}-{{$cart->variation_value}}-{{$cart->quantity}}-{{$cart->price}}-{{$sub_total}}">
                                <input type="hidden" name="product_id[]" value="{{$cart->product_id}}">
                                <input type="hidden" name="product_variation_title[]" value="{{$cart->variation_title}}">
                                <input type="hidden" name="product_variation_value[]" value="{{$cart->variation_value}}">
                                <input type="hidden" name="product_quantity[]" value="{{$cart->quantity}}">
                                <input type="hidden" name="product_price[]" value="{{$cart->price}}">
                                <input type="hidden" name="product_sub_total[]" value="{{$sub_total}}">
                                <div class="item d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center text-start product-{{$cart->product_id}}-{{$cart->variation_value}}">
                                        <img class="mr-4" src="{{$product_data['images'][0]}}" width="50px" alt="{{$cart->name}}">
                                        <div class="product-details d-flex flex-column m-0">
                                            <a href="#" class="product-name">{{$product_data->title}}</a>
                                            <span class="product-variation @if($cart->variation_title == 'Name') d-none @endif">{{$cart->variation_title}}: <strong>{{$cart->variation_value}}</strong></span>
                                            <a href="#" class="py-1 cart-box-delete is-delete-cart" id="{{$cart->product_id}}__{{$cart->variation_value}}__del">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#e60000" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="price mr-1 d-flex align-items-center justify-content-center">
                                        <p class="m-0 nor-text">Rs.{{number_format($product_data->price,  2)}} x {{$cart->quantity}}</p>
                                    </div>
                                </div>
                            @endforeach
                        @elseif(session('cart'))
                            @foreach(session('cart') as $id => $variation)
                                @foreach ($variation as $key => $product)
                                    @if($key != null)
                                        @php
                                            $product_data = get_product_data($product['id']);
                                            $sub_total = $product['price'] * $product['quantity'];
                                            $total += $sub_total;
                                        @endphp
                                        <input type="hidden" name="product[]" value="{{$id}}-{{$product['variation_title']}}-{{$key}}-{{$product['quantity']}}-{{$product['price']}}-{{$sub_total}}">
                                        <input type="hidden" name="product_id[]" value="{{$id}}">
                                        <input type="hidden" name="product_variation_title[]" value="{{$product['variation_title']}}">
                                        <input type="hidden" name="product_variation_value[]" value="{{$key}}">
                                        <input type="hidden" name="product_quantity[]" value="{{$product['quantity']}}">
                                        <input type="hidden" name="product_price[]" value="{{$product['price']}}">
                                        <input type="hidden" name="product_sub_total[]" value="{{$sub_total}}">
                                        <div class="item d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center text-start product-{{$id}}-{{$key}}">
                                                <img class="mr-4" src="{{asset($product_data->images[0])}}" width="50px" alt="{{$product['name']}}">
                                                <div class="product-details d-flex flex-column mb-0">
                                                    <a href="#" class="product-name">{{$product['name']}}</a>
                                                    <span class="product-variation @if($product['variation_title'] == 'Name') d-none @endif">{{$product['variation_title']}}: <strong>{{$product['variation_value']}}</strong></span>
                                                    <a href="#" class="py-1 cart-box-delete is-delete-cart" id="{{$product['id']}}__{{$product['variation_value']}}__del">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#e60000" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="price mr-1 d-flex align-items-center justify-content-center">
                                                <p class="m-0 nor-text">Rs.{{number_format($product_data->price,  2)}} x {{$product['quantity']}}</p>
                                            </div>
                                        </div>
                                    @endif  
                                @endforeach
                            @endforeach
                        @endif
                        <div class="modal-total-box mb-2 p-2 d-flex flex-row justify-content-between align-items-center">
                            <p class="text-3 m-0">Total</p>
                            <input type="hidden" name="total" value="{{$total}}">
                            <p class="text-3 m-0">{{number_format($total,  2)}}</p>
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
                                    <input type="text" class="form-control" name="name" placeholder="Name" required>
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
                                    <input type="integer" class="form-control" name="phone" placeholder="Phone" required>
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
                                    <input type="integer" class="form-control" name="whatsapp" placeholder="Whatsapp (optional)">
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
                                    <input type="email" class="form-control" name="email" placeholder="Email (optional)">
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
                                    <input type="text" class="form-control" name="address" placeholder="Delivery Address" required>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex align-items-center mb-1 mr-sm-2">
                            <div class="col-sm-3">
                                <span class="required text-3">City</span><span class="text-danger">*</span>
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <select id="city-select-header" name="city" class="city-select form-control" required>
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
                        <button class="btn-7 w-100 mt-3" type="submit">BUY IT NOW - {{number_format($total, 2)}}</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @yield('scripts')
    @yield('models')
</body>


</html>