<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
        <a href="{{ url('/')}}" class="logo"><img src="{{asset('/assets/img/logo.png')}}" alt="" class="img-fluid"></a>
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="{{ Route::current()->getName() == 'Home' ? 'active' : '' }}"><a href="{{url('/')}}">Home</a></li>
                <li class="{{ Route::current()->getName() == 'About' ? 'active' : '' }}"><a href="{{ url('/about')}}">About</a></li>
                <li class="{{ Route::current()->getName() == 'Services' ? 'active' : '' }}"><a href="{{ url('/services') }}">Services</a></li>
                <li class="{{ Route::current()->getName() == 'Video' ? 'active' : '' }}"><a href="{{ url('/video-gallery')}}">Video Gallery</a></li>
                <li class="{{ Route::current()->getName() == 'Photo' ? 'active' : '' }}"><a href="{{ url('/photo-gallery')}}">Photo Gallery</a></li>
                <li class="{{ Route::current()->getName() == 'Blog' ? 'active' : '' }}"><a href="{{ url('/blog') }}">Blog</a></li>
            </ul>
        </nav><!-- .nav-menu -->
        <a href="{{ url('/contact')}}" class="get-started-btn ml-auto">Contact</a>
    </div>
</header><!-- End Header -->
