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
             <li class="{{ Route::is('shop-info') ? 'active' : '' }} has-sub">
               <a class="js-arrow" href="#">
               <i class="fas fa-tachometer-alt"></i>Shop</a>
               <ul class="list-unstyled navbar__sub-list js-sub-list">
                  <li>
                     <a href="{{route('shop.profile')}}">thông tin</a>
                  </li>
                  <li>
                     <a href="index2.html">Chỉnh sửa</a>
                  </li>
                  <li>
                     <a href="index3.html">Đơn hàng</a>
                  </li>
               </ul>
            </li>
             <li class="{{ Request::segment(2) === 'food' ? 'active' : null }}">
                <a href="{{route('orders.index')}}">
                <i class="fas fa-table"></i>Đơn Hàng</a>
             </li>
          </ul>
       </nav>
    </div>
 </aside>
 <!-- END MENU SIDEBAR-->