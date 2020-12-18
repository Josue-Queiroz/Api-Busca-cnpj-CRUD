<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
    <div class="container px-4">
        <a class="navbar-brand" href="{{ route('enterprise.list') }}">
            <img src="http://eduxe.com.br/wp-content/uploads/2018/03/Logo_Site_Branca_Pequena.png" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('enterprise.list') }}">
                            <img src="http://eduxe.com.br/wp-content/uploads/2018/03/Logo_Site_Branca_Pequena.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navbar items -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('enterprise.list') }}">
                        <i class="ni ni-planet"></i>
                        <span class="nav-link-inner--text">{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ url('/') }}">
                        <i class="ni ni-world"></i>
                        <span class="nav-link-inner--text">{{ __('Site') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
