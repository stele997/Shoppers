<header class="site-navbar" role="banner">
    <div class="site-navbar-top">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                    @yield('search')
                </div>

                <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                    <div class="site-logo">
                        <a href="/" class="js-logo-clone">Shoppers</a>
                    </div>
                </div>

                <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                    <div class="site-top-icons">
                        <ul>
                            @if(Session::has('user'))
                                {{session('user')->first()->username}}<span class="icon icon-person"></span>
                                <li><a href="/logout"><span>Log out</span></a></li>
                            @else
                            <li><a href="/login">Log in<span class="icon icon-person"></span></a></li>
                            @endif
                            <li>
                                <a href="/cart" class="site-cart">
                                    <span class="icon icon-shopping_cart"></span>
                                    @if(Session::has('cart'))
                                    <span id="brojArtikala" class="count">{{count(session('cart'))}}</span>
                                        @else
                                        <span id="brojArtikala" class="count">0</span>
                                        @endif
                                </a>
                            </li>
                            <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
            <ul class="site-menu js-clone-nav d-none d-md-block">
                <li><a href="/">Home</a>
                </li>
                <li class="has-children">
                    <a href="/shop">Shop</a>
                    <ul class="dropdown">
                        <li><a href="/men">Men</a></li>
                        <li><a href="/women">Women</a></li>
                    </ul>
                </li>
                <li><a href="/about">About Author</a>
                </li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </div>
    </nav>
</header>