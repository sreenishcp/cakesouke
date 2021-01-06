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
        <li class="treeview @if(@$main_menu=='location') menu-open @endif">
          <a href="#">
            <i class="fa fa-book" aria-hidden="true"></i>
            <span>Set Your Location</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" @if(@$main_menu=="location") style="display: block;" @endif>
            <li @if(@$sub_menu=="add") class="active" @endif><a href="{{url('outlet/location/'.$merchant_id)}}"><i class="fa fa-circle-o"></i>Add</a></li>
          </ul>
        </li>
        <li class="treeview @if(@$main_menu=='item') menu-open @endif">
          <a href="#">
            <i class="fa fa-book" aria-hidden="true"></i>
            <span>Item</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" @if(@$main_menu=="item") style="display: block;" @endif>
            <li @if(@$sub_menu=="add") class="active" @endif><a href="{{url('outlet/add-item/'.$merchant_id)}}"><i class="fa fa-circle-o"></i>Add</a></li>
            <li @if(@$sub_menu=="list") class="active" @endif><a href="{{url('outlet/item-list/'.$merchant_id)}}"><i class="fa fa-circle-o"></i>List</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
            </section>
            <!-- /.sidebar -->
        </aside>