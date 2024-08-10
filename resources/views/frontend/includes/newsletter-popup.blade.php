@if (!Session::has('newsletter') && auth()->user() == null)  
        <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="row no-gutters bg-white newsletter-popup-content">
                        <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                            <div class="banner-content text-center">
                                <img src="{{asset('frontend/assets/images/demos/demo-13/logo-footer.png')}}" class="logo" alt="logo" width="100">
                                {{-- <h2 class="banner-title">get <span>25<light>%</light></span> off</h2> --}}
                                <h2 class="banner-title-2">get <span>discounts</span></h2>
                                <p>Subscribe to the Buykaro eCommerce newsletter to receive timely updates from your favorite products.</p>
                                <form method="POST" action="{{url('newsletter')}}">
                                    @csrf
                                    <div class="input-group input-group-round">
                                        <input type="email" name="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required>
                                        <div class="input-group-append">
                                            <button class="btn" type="submit"><span>go</span></button>
                                        </div><!-- .End .input-group-append -->
                                    </div><!-- .End .input-group -->
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="donot_show" value="1" class="custom-control-input" id="register-policy-2">
                                        <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>
                                    </div><!-- End .custom-checkbox -->
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-2-5col col-lg-5 ">
                            <img src="{{asset('frontend/assets/images/popup/newsletter/img-1.jpg')}}" class="newsletter-img" alt="newsletter">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif