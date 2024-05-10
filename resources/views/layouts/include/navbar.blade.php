<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">TodoList {{ Auth::user()->name }}</span>
        </a>
    </div><!-- End Logo -->

            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="dropdown-item d-flex align-items-center" type="submit">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Sign Out</span>
                </button>
            </form>

</header>