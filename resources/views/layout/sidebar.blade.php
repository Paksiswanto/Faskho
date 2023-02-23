<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                  <li class="sidebar-item{{request()->is('/')?'active':''}}">
                    <a href="/"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Data-data Admin</li>

               
                <li class="sidebar-item{{request()->is('/tempat')?'active':''}}">
                    <a href="tempat.html"> 
                        <i class="fa fa-thumb-tack" style="width: 20%;"></i>Data Tempat </a>
                </li>
                <li class="sidebar-item{{request()->is('/menu')?'active':''}}">
                    <a href="menu.html"> <i
                            class="fa fa-tasks" style="width: 20%;"></i>Data Menu </a>
                </li>
                <li class="sidebar-item{{request()->is('/jenis')?'active':''}}">
                    <a href="jenismakanan.html"> <i
                            class="fa fa-tag" style="width: 20%;"></i>Data jenismakanan</a>
                </li>
                <li class="sidebar-item{{request()->is('/user')?'active':''}}">
                    <a href="users.html"> <i
                            class="fa fa-group" style="width: 20%;"></i>Data User </a>
                </li>
                <li class="sidebar-item{{request()->is('/post')?'active':''}}">
                    <a href="posts.html"> <i
                            class="fa fa-book" style="width: 20%;"></i>Data Post </a>
                </li>
                <li class="sidebar-item{{request()->is('/ulasan')?'active':''}}">
                    <a href="ulasan"> <i
                            class="fa fa-comments" style="width: 20%;"></i>Data Ulasan </a>
                </li>
                <li class="sidebar-item{{request()->is('/penghargaan')?'active':''}}">
                    <a href="penghargaan.html"> <i
                            class="fa fa-trophy" style="width: 20%;"></i>Data Penghargaan </a>
                </li>
                <li class="sidebar-item{{request()->is('/laporan')?'active':''}}">
                    <a href="laporan.html"> <i
                            class="fa fa-exclamation-triangle" style="width: 20%;"></i>Data Laporan </a>
                </li>
                <li class="sidebar-item{{request()->is('/kategori')?'active':''}}">
                    <a href="sub_kategori.html"> <i
                            class="fa fa-tags" style="width: 20%;"></i>Data Sub Category </a>
                </li>
                <li class="sidebar-item{{request()->is('/trend')?'active':''}}">
                    <a href="trend.html"> <i
                            class="fa fa-bar-chart" style="width: 20%;"></i>Data Trend </a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>