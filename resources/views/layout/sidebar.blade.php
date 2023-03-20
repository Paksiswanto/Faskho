
 <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                      <li class="{{ Request::is('admin') ? 'active' : ''}}">
                        <a href="{{route('showTotalUsers')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Data-data Admin</li>

                   
                    {{-- <li>
                        <a href="/tempat"> 
                            <i class="fa fa-thumb-tack" style="width: 20%;"></i>Data Tempat </a>
                    </li>
                    <li> --}}
                        {{-- <a href="/tag"> <i
                                class="fa fa-tags" style="width: 20%;"></i>Data Tag </a>
                    </li> --}}

                    <li class="{{ Request::is('author') ? 'active' : '' }}">
                        <a href="{{route('user')}}"> <i
                                class="fa fa-group" style="width: 20%;"></i>Data User </a>
                    </li>
                    <li class="{{ Request::is('postingan') ? 'active' : '' }}">
                        <a href="{{route('postingan')}}"> <i
                                class="fa fa-book" style="width: 20%;"></i>Data Post </a>
                    </li>
                    <li class="{{ Request::is('ulasan') ? 'active' : '' }}"> 
                        <a href="{{route('ulasan')}}"> <i
                                class="fa fa-comments" style="width: 20%;"></i>Data Ulasan </a>
                    </li>
                    {{-- <li>
                        <a href="/penghargaan"> <i
                                class="fa fa-trophy" style="width: 20%;"></i>Data Penghargaan </a>
                    </li> --}}
                    <li class="{{ Request::is('laporan') ? 'active' : '' }}">
                        <a href="{{route('laporan')}}"> <i
                                class="fa fa-exclamation-triangle" style="width: 20%;"></i>Data Laporan </a>
                    </li>
                    <li class="{{ Request::is('kategori') ? 'active' : '' }}">
                        <a href="{{route('kategori')}}"> <i
                                class="fa fa-tags" style="width: 20%;"></i>Data Kategori </a>
                    </li>
                    <li class="{{ Request::is('ban') ? 'active' : '' }}">
                        <a href="{{route('ban')}}"> <i
                                class="fa fa-ban" style="width: 20%;"></i>Data Banned User </a>
                    </li>
                    
                    <li>
                        <a href="/trend"> <i
                                class="fa fa-bar-chart" style="width: 20%;"></i>Data Trend </a>
                    </li>
                    <br>
                    <li>
                        <a href="/"> 
                            <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" style="color: red; width:20px;" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg> HOME
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>