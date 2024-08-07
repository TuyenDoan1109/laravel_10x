<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
      <a href="{{ route('admin.dashboard') }}">
        <img src="{{ asset('backend/images/icon/logo.png') }}" alt="Cool Admin" />
      </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
      <nav class="navbar-sidebar">
        <ul class="list-unstyled navbar__list">
            <li class="
                @if(strpos(Request::route()->getName(), 'admin.dashboard') === 0)
                    active
                @endif
            ">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-chart-bar"></i>Dashboard
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-chart-bar"></i>QL Nhóm thành viên
                </a>
            </li>
            <li class="
                @if(strpos(Request::route()->getName(), 'admin.admin') === 0)
                    active
                @endif
            ">
                <a href="{{ route('admin.admin.index') }}">
                    <i class="fas fa-chart-bar"></i>QL Thành viên
                </a>
            </li>
            <li class="
                @if(strpos(Request::route()->getName(), 'admin.user') === 0)
                    active
                @endif
            ">
                <a href="{{ route('admin.user.index') }}">
                    <i class="fas fa-chart-bar"></i>QL Khách hàng
                </a>
            </li>
          
        </ul>
      </nav>
    </div>
  </aside>
  <!-- END MENU SIDEBAR-->