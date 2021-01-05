<section class="sidebar">
    <!-- Sidebar user panel -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        @if (Auth::user()->isIndoor())
            <li class="header">Menu Utama</li>

            <li class="menu-sidebar"><a href="{{ route('ob.taks.index', 'indoor') }}"><span class="glyphicon glyphicon-edit"></span>Tugas Indoor</span></a></li>

            <li class="menu-sidebar"><a href="{{ route('ob.schedulle.index') }}"><span class="glyphicon glyphicon-pushpin"></span>Jadwal</span></a></li>

            <li class="menu-sidebar"><a href="{{ route('ob.mesage.index') }}"><span class="glyphicon glyphicon-comment"></span>Pesan</span></a></li>
        @endif

        @if (Auth::user()->isOutdoor())
            <li class="header">Menu Utama</li>
            <li class="menu-sidebar"><a href="{{ route('ob.taks.index', 'outdoor') }}"><span class="glyphicon glyphicon-edit"></span>Tugas Outdoor</span></a></li>

            <li class="menu-sidebar"><a href="{{ route('ob.schedulle.index') }}"><span class="glyphicon glyphicon-pushpin"></span>Jadwal</span></a></li>

            <li class="menu-sidebar"><a href="{{ route('ob.mesage.index') }}"><span class="glyphicon glyphicon-comment"></span>Pesan</span></a></li>
        @endif
        <li class="header">Menu Lainnya</li>

        <li class="menu-sidebar">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-log-out"></span>Logout</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a>
        </li>
    </ul>
</section>
