<aside id="sidebar" class="sidebar">
    <ul class="">
        @if (Route::has('login'))
            @auth
                <ul class="sidebar-nav" id="sidebar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('/todo')}}">
                            <i class="bi bi-grid"></i>
                            Dashboard
                        </a>
                    </li><!-- End Dashboard Nav -->
                </ul>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="btn btn-danger w-100 " type="submit">
                        <i class="bi bi-box-arrow-right"></i>
                        Sign Out
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-success w-100 ">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-warning w-100 mt-2">
                        Register
                    </a>
                @endif
            @endauth
        @endif
    </ul>
    </a>
    </div><!-- End Logo -->
</aside>
