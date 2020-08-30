<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
       <a href="#">
       <img src="{{URL::asset('asset/admin/images/icon/logo.png')}}" alt="Cool Admin" />
       </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
       <nav class="navbar-sidebar">
          <ul class="list-unstyled navbar__list">
             <li class="{{ Route::is('shop') ? 'active' : '' }} has-sub">
                <a class="js-arrow" href="#">
                <i class="fas fa-tachometer-alt"></i>Thống kê</a>
                <ul class="list-unstyled navbar__sub-list js-sub-list">
                   <li>
                      <a href="index.html">Doanh thu</a>
                   </li>
                   <li>
                      <a href="index2.html">Món ăn</a>
                   </li>
                   <li>
                      <a href="index3.html">Đơn hàng</a>
                   </li>
                </ul>
             </li>
           
             <li class="{{ Request::segment(2) === 'food' ? 'active' : null }}" >
             <a href="{{route('food.index')}}">
                <i class="fas fa-chart-bar"></i>Menu</a>
             </li>
             <li>
                <a href="table.html">
                <i class="fas fa-table"></i>Đơn Hàng</a>
             </li>
             <li>
                <a href="form.html">
                <i class="far fa-check-square"></i>Địa chỉ</a>
             </li>
             <li>
                <a href="calendar.html">
                <i class="fas fa-calendar-alt"></i>Khuyến mãi</a>
             </li>
           
          </ul>
       </nav>
    </div>
 </aside>
 <!-- END MENU SIDEBAR-->