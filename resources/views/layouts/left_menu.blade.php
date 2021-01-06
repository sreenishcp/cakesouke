  <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p>Admin</p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- search form (Optional) -->
               <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search..."/>
                        <span class="input-group-btn">
                          <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form> 
                <!-- /.search form -->

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          {{Auth::user()->app_users_logo}}
          <img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg")}}" class="img-circle" alt="User Image">
          }
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
  {{--     <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>--}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
       {{-- <li class="treeview @if(@$menu_open=='dash_user') menu-open @endif">
          <a href="#">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>Dashboard User</span>
            <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" @if(@$menu_open=="dash_user") style="display: block;" @endif>
            <li><a href="{{url('dashboard-user')}}"><i class="fa fa-circle-o"></i> Add</a></li>
            <li><a href="{{url('list-dashboard-user')}}"><i class="fa fa-circle-o"></i> List</a></li>
          </ul>
        </li> --}}
        <li class="treeview @if(@$menu_open=='app_user') menu-open @endif">
          <a href="#">
            <i class="fa fa-address-book" aria-hidden="true"></i>
            <span>Merchants</span>
            <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" @if(@$main_menu=="merchant") style="display: block;" @endif>
            <li @if(@$sub_menu=="add") class="active" @endif><a href="{{url('merchant/create')}}"><i class="fa fa-circle-o"></i> Add</a></li>
            <li @if(@$sub_menu=="list") class="active" @endif><a href="{{url('merchant/')}}"><i class="fa fa-circle-o"></i> List</a></li>
          </ul>
        </li>
        <li class="treeview @if(@$main_menu=='category') menu-open @endif">
          <a href="#">
            <i class="fa fa-book" aria-hidden="true"></i>
            <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" @if(@$main_menu=="category") style="display: block;" @endif>
            <li @if(@$sub_menu=="add") class="active" @endif><a href="{{url('category/add')}}"><i class="fa fa-circle-o"></i>Add</a></li>
            <li @if(@$sub_menu=="list") class="active" @endif><a href="{{url('category')}}"><i class="fa fa-circle-o"></i>List</a></li>
          </ul>
        </li>
        <li class="treeview @if(@$main_menu=='book') menu-open @endif">
          <a href="#">
            <i class="fa fa-book" aria-hidden="true"></i>
            <span>Sub Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" @if(@$main_menu=="subcategory") style="display: block;" @endif>
            <li @if(@$sub_menu=="add") class="active" @endif><a href="{{url('subcategory/add')}}"><i class="fa fa-circle-o"></i>Add</a></li>
            <li @if(@$sub_menu=="list") class="active" @endif><a href="{{url('subcategory')}}"><i class="fa fa-circle-o"></i>List</a></li>
          </ul>
        </li>
        {{--<li class="treeview @if(@$menu_open=='csv') menu-open @endif">
          <a href="#">
           <i class="fa fa-file"></i>
            <span>Manage CSV</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" @if(@$menu_open=="csv") style="display: block;" @endif>
            <li><a href="{{url('content-csv')}}"><i class="fa fa-circle-o"></i>Add Content</a></li>
            <li><a href="{{url('edit-content-csv')}}"><i class="fa fa-circle-o"></i>Update Content</a></li>
            <li><a href="{{url('chapter-csv')}}"><i class="fa fa-circle-o"></i>Add Chapter</a></li>
            <li><a href="{{url('edit-chapter-csv')}}"><i class="fa fa-circle-o"></i>Update Chapter</a></li>
          </ul>
        </li>
        <li class="treeview @if(@$menu_open=='device_list') menu-open @endif">
          <a href="#">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>Log Details</span>
            <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" @if(@$menu_open=="dash_user") style="display: block;" @endif>
            <li><a href="{{url('list-device')}}"><i class="fa fa-circle-o"></i> List</a></li>
          </ul>
        </li>--}}
      </ul>
    </section>
    <!-- /.sidebar -->
            </section>
            <!-- /.sidebar -->
        </aside>