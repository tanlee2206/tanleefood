<aside class="menu-sidebar2">
    <div class="logo">
    <a href="{{route('admin')}}">
            <img src="asset/admin/images/icon/logo-white.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar2__content js-scrollbar1">
        <div class="account2">
            <div class="image img-cir">
                <img src="@if(Auth::user()->img != null) {{Auth::user()->img}} @else asset/admin/images/icon/avatar-01.jpg @endif" width="80" height="80" alt="admin" />
            </div>
            <h4 class="name">{{Auth::user()->first_name}}</h4>
            <a href="#">Sign out</a>
        </div>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-tachometer-alt"></i>Thống kê
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.html">
                                <i class="fas fa-tachometer-alt"></i>Dashboard 1</a>
                        </li>
                      
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-trophy"></i>User
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{route('user.index')}}">
                               Danh sách user</a>
                        </li>
                        <li>
                        <a href="{{route('user.create')}}">
                               Thêm mới user</a>
                        </li>
                      
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-trophy"></i>Cửa Hàng
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{route('shop.index')}}">
                                <i class="fas fa-table"></i>Danh sách shop</a>
                        </li>
                        <li>
                            <a href="{{route('shop.create')}}">
                                <i class="far fa-check-square"></i>Thêm mới</a>
                        </li>
                      
                    </ul>
                </li>
                <li class="">
                    <a class="js-arrow" href="{{route('list.shop.register')}}">
                        <i class="fas fa-tachometer-alt"></i>Cửa hàng chờ duyệt
                        <span class="arrow">
                            
                        </span>
                    </a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-trophy"></i>Danh mục
                        <span class="arrow">
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{route('category.index')}}">
                                <i class="fas fa-table"></i>Danh Mục</a>
                        </li>
                        <li>
                            <a href="{{route('category.create')}}">
                                <i class="far fa-check-square"></i>Thêm mới</a>
                        </li>
                      
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>