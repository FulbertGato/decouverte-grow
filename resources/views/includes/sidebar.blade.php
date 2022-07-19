<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
        <a href="#" class="brand-wrap">
            <img src="{{asset('assets/imgs/theme/logo.svg')}}" class="logo" alt="Dashboard">
        </a>
        <div>
            <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i> </button>
        </div>
    </div>
    <nav>
        <ul class="menu-aside">
            <li class="menu-item active">
                <a class="menu-link" href="/"> <i class="icon material-icons md-home"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="#"> <i class="icon material-icons md-local_offer"></i>
                    <span class="text">Podcast</span>
                </a>
                <div class="submenu">
                    <a href="{{route('podcasts.list')}}">Gerer les podcast</a>
                    <a href="{{route('podcasts.create')}}">Ajouter un podcast</a>
                </div>
            </li>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="#"> <i class="icon material-icons md-local_offer"></i>
                    <span class="text">Vidéos</span>
                </a>
                <div class="submenu">
                    <a href="{{route('videos.list')}}">Gerer les vidéos</a>
                    <a href="{{route('videos.create')}}">Ajouter une vidéos</a>
                </div>
            </li>

            <li class="menu-item has-submenu">
                <a class="menu-link" href="#"> <i class="icon material-icons md-perm_identity"></i>
                    <span class="text">Auteurs</span>
                </a>
                <div class="submenu">
                    <a href="#">Gerer les auteurs</a>
                    <a href="#">Ajouter un auteur</a>
                </div>
            </li>

            <li class="menu-item has-submenu">
                <a class="menu-link" href="#"> <i class="icon material-icons md-perm_identity"></i>
                    <span class="text">Gestionnaires</span>
                </a>
                <div class="submenu">
                    <a href="{{route('admin.list')}}">Gerer les gestionnaires</a>
                    <a href="{{route('podcasts.create')}}">Ajouter un gestionnaire</a>
                </div>
            </li>
        </ul>
        <hr>
        <ul class="menu-aside">
            <li class="menu-item has-submenu">
                <a class="menu-link" href="#"> <i class="icon material-icons md-settings"></i>
                    <span class="text">Settings</span>
                </a>
                <div class="submenu">
                    <a href="#">Setting sample 1</a>
                </div>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="#"> <i class="icon material-icons md-local_offer"></i>
                    <span class="text"> Starter page </span>
                </a>
            </li>
        </ul>
        <br>
        <br>
    </nav>
</aside>
