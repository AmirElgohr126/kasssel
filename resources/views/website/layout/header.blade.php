<!-- top-bar start -->
<header>
    <div class="top-area">
        <div class="container-fluid">
            <div class="row">
                <div class="toogle-bar">
                    <span id="toggle"><i class="fas fa-bars"></i></span>
                </div>
                <div class="offset-lg-5 col-lg-7 text-right">
                    {{-- <div class="search-bar">
                        <form action="#">
                            <input type="text" placeholder="Search here">
                            <button type="submit"><img src="{{ asset('assets/images/search-icon.png') }}"
                                    alt="images" /></button>
                        </form>
                    </div>
                    <a href="#" class="notification">
                        <div class="icon">
                            <img src="{{ asset('assets/images/notification-icon.png') }}" alt="images" />
                        </div>
                        <div class="number">
                            <span>5</span>
                        </div>
                    </a>
                    <a href="#" class="notification">
                        <div class="icon">
                            <img src="{{ asset('assets/images/chat-icon.png') }}" alt="images" />
                        </div>
                        <div class="number">
                            <span>5</span>
                        </div>
                    </a> --}}
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-button"> Log out </button>
                    </form>

                    <div class="profile-img">
                        {{-- <img src="{{ asset('assets/images/profile-img.png') }}" alt="images"> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</header>

