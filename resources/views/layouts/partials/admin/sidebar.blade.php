<section class="sidebar">
    <!-- Sidebar user panel -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">

        <li class="header">Menu Data Tugas</li>

        <li class="menu-sidebar"><a href="{{ route('admin.task.index', 'indoor') }}"><span class="glyphicon glyphicon-edit"></span>Data Tugas Indoor</span></a></li>

        <li class="menu-sidebar"><a href="{{ route('admin.task.index', 'outdoor') }}"><span class="glyphicon glyphicon-edit"></span>Data Tugas Outdoor</span></a></li>

        <li class="header">Menu Verifikasi</li>

        <li class="menu-sidebar"><a href="{{ route('admin.verif.index', 'indoor') }}"><span class="glyphicon glyphicon-check"></span>Verifikasi Indoor</span></a></li>

        <li class="menu-sidebar"><a href="{{ route('admin.verif.index', 'outdoor') }}"><span class="glyphicon glyphicon-check"></span>Verifikasi Outdoor</span></a></li>

        <li class="header">Menu Tambahan</li>

        <li class="menu-sidebar"><a href="{{ route('admin.message.index') }}"><span class="glyphicon glyphicon-comment"></span>Pesan</span></a></li>

        <li class="menu-sidebar"><a href="{{ route('admin.schedulle.index') }}"><span class="glyphicon glyphicon-pushpin"></span>Jadwal OB</span></a></li>

        <li class="menu-sidebar"><a href="{{ route('admin.ob.index') }}"><span class="glyphicon glyphicon-user"></span>Daftar OB</span></a></li>

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
