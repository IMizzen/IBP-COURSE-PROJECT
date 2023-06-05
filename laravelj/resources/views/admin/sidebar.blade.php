<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('/')}}assets/img/hza.jpg" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
          @auth
          <p>{{Auth::user()->name}}</p>

          <a href="{{route('logoutuser')}}"><i class="fa fa-circle text-success"></i> Logout</a>
          @endauth
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search..."/>
          <span class="input-group-btn">
            <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{route('admin.index')}}"><i class="fa fa-home text-purple"></i> <span> Dashboard</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-inbox text-blue"></i> <span>Orders</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.order.index',['slug' => 'New'])}}"><i class="fa fa-circle-o"></i> New Orders</a></li>
            <li><a href="{{route('admin.order.index',['slug' => 'Accepted'])}}"><i class="fa fa-circle-o text-info"></i> Accepted Orders</a></li>
            <li><a href="{{route('admin.order.index',['slug' => 'Shipped'])}}"><i class="fa fa-circle-o text-warning"></i> Shipping Orders</a></li>
            <li><a href="{{route('admin.order.index',['slug' => 'Cancelled'])}}"><i class="fa fa-circle-o text-danger"></i> Cancelled Orders</a></li>
            <li><a href="{{route('admin.order.index',['slug' => 'Completed'])}}"><i class="fa fa-circle-o text-success"></i> Completed Orders</a></li>
          </ul>
        </li> 
        <li><a href="{{route('admin.category.index')}}"><i class="fa fa-th-list"></i> <span> Category</span></a></li>
        <li><a href="{{route('admin.product.index')}}"><i class="fa fa-th"></i> <span> Products</span></a></li>
        <li><a href="{{route('admin.comment.index')}}"><i class="fa fa-comments"></i> <span> Comments</span></a></li>
        <li><a href="{{route('admin.faq.index')}}"><i class="fa fa-question"></i> <span> FAQ</span></a></li>
        <li><a href="{{route('admin.message.index')}}"><i class="fa fa-envelope"></i> <span> Messages</span></a></li>
        <li><a href="/admin/user"><i class="fa fa-user"></i> <span> Users</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="/admin/setting"><i class="fa fa-fw fa-gears text-danger"></i> <span> Seetings</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->