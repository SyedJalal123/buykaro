<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container mobile-menu-light">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>
        
        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Search</label>
            <input type="text" class="form-control search-bar" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>
        <div class="search-bar-content border d-none" style="top: 22%;">
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

        <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                <nav class="mobile-nav">
                    <ul class="mobile-menu">
                        <li class="active"><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('collections/all')}}">Shop</a></li>
                        <li><a href="{{url('about-us')}}">About Us</a></li>
                        <li><a href="{{url('contact-us')}}">Contact</a></li>
                        {{-- <li>
                            <a href="#">Pages</a>
                            <ul>
                                <li>
                                    <a href="{{url('about-us')}}">About</a>

                                    <ul>
                                        <li><a href="{{url('about-us')}}">About 01</a></li>
                                        <li><a href="about-2.html">About 02</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{url('contact-us')}}">Contact</a>

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
                        </li> --}}
                    </ul>
                </nav><!-- End .mobile-nav -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                <nav class="mobile-cats-nav">
                    <ul class="mobile-cats-menu">
                        @php $collections = get_collections(); @endphp
                        <li><a href="{{url('collections/all')}}">All Categories</a></li>
                        @foreach ($collections as $collection)
                            <li><a href="{{url('collections')}}/{{$collection->slug}}">{{$collection->title}}</a></li>
                        @endforeach
                        {{-- <li><a class="mobile-cats-lead" href="#">Daily offers</a></li> --}}
                    </ul><!-- End .mobile-cats-menu -->
                </nav><!-- End .mobile-cats-nav -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->

        <div class="social-icons">
            <a href="https://www.facebook.com/buykaro.co" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
            <a href="https://www.instagram.com/buy._.karo/" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
            <a href="https://www.tiktok.com/@buy.karo" class="social-icon" target="_blank" title="Tiktok">
                {{-- <i class="icon-pinterest"></i> --}}
                <svg height="15" width="15" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 449.45 515.38">
                    <path fill="#9b9797" fill-rule="nonzero" d="M382.31 103.3c-27.76-18.1-47.79-47.07-54.04-80.82-1.35-7.29-2.1-14.8-2.1-22.48h-88.6l-.15 355.09c-1.48 39.77-34.21 71.68-74.33 71.68-12.47 0-24.21-3.11-34.55-8.56-23.71-12.47-39.94-37.32-39.94-65.91 0-41.07 33.42-74.49 74.48-74.49 7.67 0 15.02 1.27 21.97 3.44V190.8c-7.2-.99-14.51-1.59-21.97-1.59C73.16 189.21 0 262.36 0 352.3c0 55.17 27.56 104 69.63 133.52 26.48 18.61 58.71 29.56 93.46 29.56 89.93 0 163.08-73.16 163.08-163.08V172.23c34.75 24.94 77.33 39.64 123.28 39.64v-88.61c-24.75 0-47.8-7.35-67.14-19.96z"/>
                </svg>
            </a>
            {{-- <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a> --}}
            {{-- <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a> --}}
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div>