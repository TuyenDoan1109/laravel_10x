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

            {{-- Dashboard --}}
            <li class="
                @if(strpos(Request::route()->getName(), 'admin.dashboard') === 0)
                    active
                @endif
            ">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-chart-bar"></i>Dashboard
                </a>
            </li>

            {{-- QL Nhóm thành viên --}}
            <li class="
                @if(strpos(Request::route()->getName(), 'admin.groupAdmin') === 0)
                    active
                @endif
            ">
                <a href="{{ route('admin.groupAdmin.index') }}">
                    <i class="fas fa-chart-bar"></i>QL Nhóm Admin
                </a>
            </li>

            {{-- QL Thành viên --}}
            <li class="
                @if(strpos(Request::route()->getName(), 'admin.admin') === 0)
                    active
                @endif
            ">
                <a href="{{ route('admin.admin.index') }}">
                    <i class="fas fa-chart-bar"></i>QL Admin
                </a>
            </li>

            {{-- QL Nhóm khách hàng --}}
            <li class="
                @if(strpos(Request::route()->getName(), 'admin.groupUser') === 0)
                    active
                @endif
            ">
                <a href="{{ route('admin.groupUser.index') }}">
                    <i class="fas fa-chart-bar"></i>QL Nhóm User
                </a>
            </li>

            {{-- QL Khách hàng --}}
            <li class="
                @if(strpos(Request::route()->getName(), 'admin.user') === 0)
                    active
                @endif
            ">
                <a href="{{ route('admin.user.index') }}">
                    <i class="fas fa-chart-bar"></i>QL User
                </a>
            </li>

            {{-- QL Nhóm Nhà cung cấp --}}
            <li>
                <a href="#">
                    <i class="fas fa-chart-bar"></i>QL Nhóm Vendor
                </a>
            </li>

            {{-- QL Nhà cung cấp --}}
            <li>
                <a href="#">
                    <i class="fas fa-chart-bar"></i>QL Vendor
                </a>
            </li>
          
        </ul>
      </nav>
    </div>
  </aside>
  <!-- END MENU SIDEBAR-->