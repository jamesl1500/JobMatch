<header class="header main-header">
    <div class="header-inner container">
        <div class="header-row row">
            <div class="header-branding col-lg-3">
                <a href="/" class="header-logo">
                    <h2>JobMatch</h2>
                </a>
            </div>
            <div class="header-nav col-lg-6">
                <nav class="nav">
                    <ul class="nav-list">
                        <?php
                        if(auth()->check())
                        {
                            if(auth()->user()->role == 'employer')
                            {
                                ?>
                                    <li <?php if($active && $active == "dashboard") {echo "class='active'";} ?>><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                                    <li <?php if($active && $active == "jobs") {echo "class='active'";} ?>><a href="/jobs">Jobs</a></li>
                                    <li <?php if($active && $active == "boards") {echo "class='active'";} ?>><a href="/boards">Boards</a></li>
                                <?php
                            } else if(auth()->user()->role == 'job_seeker'){
                                ?>
                                    <li <?php if($active && $active == "dashboard") {echo "class='active'";} ?>><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                                    <li <?php if($active && $active == "jobs") {echo "class='active'";} ?>><a href="/jobs">Jobs</a></li>
                                    <li <?php if($active && $active == "applications") {echo "class='active'";} ?>><a href="/applications">Applications</a></li>
                                <?php
                            }else if(auth()->user()->role == 'admin'){
                                ?>
                                    <li><a href="/admin">Admin</a></li>
                                <?php
                            }
                        } else{
                            ?>
                                <li><a href="{{ route('welcome.index') }}">Welcome</a></li>
                                <li><a href="{{ route('welcome.about') }}">About</a></li>
                                <li><a href="{{ route('welcome.contact') }}">Contact</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </nav>
            </div>
            <div class="header-actions col-lg-3">
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-secondary">Logout</button>
                    </form>
                @endauth
                @guest
                    <a href="/login" class="btn btn-primary">Login</a>
                    <a href="/register" class="btn btn-secondary">Register</a>
                @endguest
            </div>
        </div>
    </div>
</header>