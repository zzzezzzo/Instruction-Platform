<div class="l-navbar" id="navbar">
    <nav class="nav">
        <div>
            <div class="nav__brand">
                <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
                <a href="#" style="font-size:35px" class="nav__logo">z<sup>4</sup></a>
            </div>
            <div class="nav__list">
                <a href="{{ route('dashboard') }}" class="nav__link active">
                    <ion-icon name="home-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">Dashboard</span>
                </a>
                {{-- <a href="#" class="nav__link">
                    <ion-icon name="chatbubbles-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">Messenger</span>
                </a> --}}

                <div  class="nav__link collapse">
                    <ion-icon name="folder-outline" class="nav__icon"></ion-icon>
                    <a href="{{ route('courses.index') }}"><span class="nav__name">Courses</span></a>

                    <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                    <ul class="collapse__menu">
                        <a href="{{ route('courses.create') }}" class="collapse__sublink">add</a>
                        <a href="{{ route('category.index') }}" class="collapse__sublink">categories</a>
                        <a href="{{ route('courses.index_trash') }}" class="collapse__sublink">trashed</a>
                    </ul>
                </div>

                <a href="#" class="nav__link">
                    <ion-icon name="pie-chart-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">about me</span>
                </a>
                <div class="nav__link collapse">
                    <ion-icon name="people-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">Team</span>

                    <ion-icon name="chevron-down-outline" class="collapse__link"></ion-icon>

                    <ul class="collapse__menu">
                        <a href="#" class="collapse__sublink">Data</a>
                        <a href="#" class="collapse__sublink">Group</a>
                        <a href="#" class="collapse__sublink">Members</a>
                    </ul>
                </div>
                <a href="#" class="nav__link">
                    <ion-icon name="settings-outline" class="nav__icon"></ion-icon>
                    <span class="nav__name">Settings</span>
                </a>
            </div>
        </div>

        <a href="#" class="nav__link">
            {{-- <span class="nav__name">Log Out</span> --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                
                <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                                    this.closest('form').submit();">
                <ion-icon name="log-out-outline" class="nav__icon"></ion-icon>
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </a>
    </nav>
</div>