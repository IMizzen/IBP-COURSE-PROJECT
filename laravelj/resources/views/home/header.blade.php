<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row bg-secondary py-1 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center h-100">
                <a class="text-body mr-3" href="{{route('about')}}">About</a>
                <a class="text-body mr-3" href="{{route('contact')}}">Contact</a>
                <a class="text-body mr-3" href="{{route('faq')}}">FAQs</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <div class="btn-group">
                    @auth
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}</button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{route('userpanel.index')}}"><button class="dropdown-item" type="button" >My Account</button></a>
                        <a href="{{route('userpanel.orders')}}"><button class="dropdown-item" type="button" >My Orders</button></a>
                        <a href="{{route('userpanel.reviews')}}"><button class="dropdown-item" type="button" >My Reviews</button></a>
                        <a href="{{route('shopcart.index')}}"><button class="dropdown-item" type="button" >My Product</button></a>
                        <a href="{{route('logoutuser')}}"><button class="dropdown-item" type="button" >Logout</button></a>
                    </div>
                    @endauth
                    @guest
                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Please Login</button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{route('login')}}"><button class="dropdown-item" type="button">Login</button></a>
                        <a href="{{route('register')}}"><button class="dropdown-item" type="button">Join</button></a>
                    </div>
                    @endguest
                </div>
            </div>
            <div class="d-inline-flex align-items-center d-block d-lg-none">
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-heart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-shopping-cart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>
            </div>
        </div>
    </div>

    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="{{route('index')}}" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary bg-dark px-2">MAZHAR</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">STORE</span>
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left">
            <form action="{{route('search')}}", method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" required placeholder="Search for products">
                    <div class="input-group-append">
                        <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4 col-6 text-right">
            <p class="m-0">Customer Service</p>
            <h5 class="m-0">+090 543 732 8653</h5>
        </div>
    </div>
</div>
<!-- Topbar End -->
