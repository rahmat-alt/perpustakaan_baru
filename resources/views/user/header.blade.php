<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        Edu Library
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                        </li>
                        <li class="scroll-to-section"><a href="#courses">Courses</a></li>
                        <li class="scroll-to-section"><a href="#contact">Contact Us</a></li>
                        @auth
                        <li><a href="{{ url('user/ubah-pass') }}">Ubah Password</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Logout
                                </a>
                            </form>
                        </li>
                        @endauth

                        @guest
                        <li>
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                        @endguest





                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
