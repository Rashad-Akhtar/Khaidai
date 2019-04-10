<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
    <div>
      <p class="app-sidebar__user-name">Admin</p>
    </div>
  </div>
  <ul class="app-menu">
    <li ><a class="app-menu__item" id="dashboard" href="{{ route('admin.dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
    <li ><a class="app-menu__item" id="categories" href="{{ route('admin.categories') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Categories</span></a></li>
    <li ><a class="app-menu__item" id="products" href="{{ route('admin.products') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Products</span></a></li>
    <li ><a class="app-menu__item" id="stock" href="{{ route('admin.stock') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Stock</span></a></li>
    <li ><a class="app-menu__item" id="sales" href="{{ route('admin.sales') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Sales</span></a></li>
  </ul>
</aside>
