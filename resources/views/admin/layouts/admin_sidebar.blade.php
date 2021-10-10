 <!-- Main Sidebar Container -->
    <?php
                    use App\Models\Application;
                         $logo=Application::getlogo();
                    ?>
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
      <img src="{{$logo}}" alt="AdminLTE Logo" class="brand-image" style="margin-left: 10px;">
      <span class="brand-text font-weight-" style="color: #008DFF;">Ocean</span><span style="color: #FF936E;">stub</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- SidebarSearch Form -->
      <div class="form-inline">

      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('admin.dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard

              </p>
            </a>

          </li>
         <li class="nav-item">
            <a href="{{route('admin.application.edit')}}" class="nav-link ">
              <i class="nav-icon fa fa-gear"></i>
              <p>
                Manage Application
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{route('admin.all_tickets')}}" class="nav-link ">
              <i class="nav-icon fas fa-ticket-alt"></i>
              <p>
                Manage Tickets
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{route('admin.seller_plan.index')}}" class="nav-link ">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>
                Manage Seller Plans
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.features.index')}}" class="nav-link ">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>
                Features
              </p>
            </a>
          </li>
              <li class="nav-item">
            <a href="{{route('admin.category')}}" class="nav-link ">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>
                Manage Category
              </p>
            </a>
          </li>


            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Manage Events
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

                 <li class="nav-item">
                        <a href="{{ route('admin.upcomingevents')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px"> Upcoming Events</p>
                        </a>
                  </li>
                   <li class="nav-item">
                        <a href="{{ route('admin.ongoingevents')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px"> OnGoing Events</p>
                        </a>
                  </li>
                   <li class="nav-item">
                        <a href="{{ route('admin.completedevents')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px"> Completed Events</p>
                        </a>
                  </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Manage Seller
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

                 <li class="nav-item">
                        <a href="{{ route('admin.activesellers')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Active Sellers</p>
                        </a>
                  </li>
                   <li class="nav-item">
                        <a href="{{ route('admin.pendingsellers')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Pending Sellers</p>
                        </a>
                  </li>
                   <li class="nav-item">
                        <a href="{{ route('admin.blockedsellers')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px"> Blocked Sellers</p>
                        </a>
                  </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Buyers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

                 <li class="nav-item">
                        <a href="{{ route('admin.activebuyers')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Active Buyers</p>
                        </a>
                  </li>
                   <li class="nav-item">
                        <a href="{{ route('admin.pendingbuyers')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Pending Buyers</p>
                        </a>
                  </li>
                   <li class="nav-item">
                        <a href="{{ route('admin.blockedbuyers')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px"> Blocked Buyers</p>
                        </a>
                  </li>
            </ul>
          </li>

           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Manage Payment
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

                 <li class="nav-item">
                        <a href="{{ route('admin.sellerpayment')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Seller Payments</p>
                        </a>
                  </li>
                   <li class="nav-item">
                        <a href="{{ route('admin.buyerpayment')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Buyer Payments</p>
                        </a>
                  </li>

            </ul>
          </li>

          <li class="nav-item">
             <a class="nav-link" href="{{URL('admin/logout')}}"> <i class="nav-icon fas fa-power-off"></i> <p> Logout </p> </a>
          </li>
        </ul>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
