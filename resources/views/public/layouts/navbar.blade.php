<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Lalu-Lintas<small>Rasa</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="/menu" class="nav-link">Menu</a></li>
                <li class="nav-item"><a href="/services" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="/about" class="nav-link">About</a></li>

                <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
                <li class="nav-item cart"><a href="/cart" class="nav-link"><span
                            class="icon icon-shopping_cart"></span></a>
                    @guest
                    <li class="nav-item"><a href="/login" class="nav-link">login</a></li>
                    <li class="nav-item"><a href="/register" class="nav-link">register</a></li>
                @endguest
                @auth

                    <li class="nav-item">
                        <div class="dropdown nav-link">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">Log
                                    Out</a>
                                <a class="dropdown-item" href="{{ route('users.orders') }}">My Orders</a>

                                <form action="/logout" class="dropdown-item" method="post">
                                    @csrf
                                    <button type="submit" role="menuitem">
                                        Logout
                                </form>
                            </div>
                        </div>
                    </li>

                @endauth
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
