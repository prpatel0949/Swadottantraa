<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
    <a href="{{url('/')}}" class="navbar-brand">SWA.TANTRAA<span class="text-primary">.COM</span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a data-scroll-to="home" class="nav-link" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item">
                <a data-scroll-to="about" class="nav-link" href="{{url('/#about')}}">About Us</a>
            </li>
            <li class="nav-item">
                <a data-scroll-to="product" class="nav-link" href="{{url('/#product')}}">Products</a>
            </li>
            <li class="nav-item">
                <a data-scroll-to="testimonial" class="nav-link" href="{{url('/#testimonial')}}">Testimonials</a>
            </li>
            <li class="nav-item">
                <a data-scroll-to="contact" class="nav-link" href="{{url('/#contact')}}">Contact Us</a>
            </li>
            <li class="nav-item">
                <button class="btn btn-primary" data-toggle="modal" data-target="#login_modal">Login</button>
            </li>
        </ul>
    </div>
</nav>