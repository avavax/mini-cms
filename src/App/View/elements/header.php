<header>
    <div class="bs-component">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="/">My MiniCMS</a>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item <?= $current == 'index' ? 'active' : '' ?>">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item <?= $current == 'about' ? 'active' : '' ?>">
                            <a class="nav-link" href="/about">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>