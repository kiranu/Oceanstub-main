 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('seller.dashboard')}}" class="brand-link">
      <img src="{{ asset('assets/seller/dist/img/Asset 1 5.png')}}" alt="AdminLTE Logo" class="brand-image" style="margin-left: 10px;">
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
            <a href="{{route('seller.dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard

              </p>
            </a>

          </li>
          <li class="nav-item menu-open" >
            <a href="{{route('seller.seating_chart_list')}}" class="nav-link active" style="background-color: #28A745;">
              <i class="fas fa-edit" style="    margin-left: 5px;"></i>
              <p style="margin-left: 5px;">
               Design Seating Chart

              </p>
            </a>

          </li>


            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy" ></i>
              <p>
                Manage Venue
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">

                 <a href="{{ URL('seller/add_venue')}}" class="nav-link">
                  <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                  <p style="font-size:14px"> Create Venue</p>
                </a>
              </li>
              <li class="nav-item">
                        <a href="{{ URL('seller/venue')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">View Venues</p>
                        </a>
                     </li>


                     <li class="nav-item">
                        <a href="{{route('seller.seating_chart_list')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Seating chart</p>
                        </a>
                     </li>

            </ul>
          </li>



            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Events
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">

                 <li class="nav-item">
                        <a href="{{ URL('/seller/add_event')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px"> Add Event</p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{route('seller.list_events')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Events</p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ URL('/seller/coupons')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Coupons</p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ URL('/event_statement')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Event Statement</p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ URL('/seller/merchandise_and_services')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size: 14px;">Merchandise/Services</p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ route('seller.package')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Packages</p>
                        </a>
                     </li>

            </ul>
          </li>

              <li class="nav-item">
                  <a href="{{ route('seller.past_events')}}" class="nav-link">
                     <i class="nav-icon fas fa-copy" style="font-size: px;"></i>
                     <p style="font-size:px">Past Events</p>
                  </a>
               </li>

            <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>

            <ul class="nav nav-treeview">

                 <li class="nav-item">
                        <a href="{{ Route('seller.sales_invoice')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px"> Sales & Invoice</p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{Route('seller.get_sold_tickets')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Sold Tickets</p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{Route('seller.unsold_tickets')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Unsold Tickets</p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ Route('seller.get_event_audit')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Event Audit </p>
                        </a>
                     </li>
                     </li>
                     <li class="nav-item">
                        <a href="{{Route('seller.get_referrals')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Referrals </p>
                        </a>
                     </li>

            </ul>
          </li>




          <!--  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Delivery Reports
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">


              <li class="nav-item">
                        <a href="{{ URL('/print_ticket')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px"> Print Tickets</p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ URL('/admission_list')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Admission Lists</p>
                        </a>
                     </li>


            </ul>
          </li> -->



           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Accounts & Settings
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">


                <li class="nav-item">
                        <a href="{{Route('seller.accounts_and_settings.site_settings')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px"> Site Settings</p>
                        </a>
                     </li>
                   <!--   <li class="nav-item">
                        <a href="{{ URL('/add_to_site')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Add to Site</p>
                        </a>
                     </li> -->
                    <!--  <li class="nav-item">
                        <a href="{{ URL('/design_site')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Design Site</p>
                        </a>
                     </li> -->
                    <!--  <li class="nav-item">
                        <a href="{{ URL('/billing_and_payments')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Billing & Payments</p>
                        </a>
                     </li> -->
                     <li class="nav-item">
                        <a href="{{ URL('/plan_and_feature')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Plan & Features Settings</p>
                        </a>
                     </li>

            </ul>
          </li>


           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Content Management
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{Route('seller.content_management.add_content')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Add Content</p>
                        </a>
                     </li>

                <li class="nav-item">
                        <a href="{{Route('seller.content_management.return_policy')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px"> Return Policy</p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{Route('seller.content_management.privacy_policy')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Privacy Policy</p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ Route('seller.content_management.terms_of_use')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Terms of Use</p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{Route('seller.content_management.terms_of_purchase')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Terms of Purchase</p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ Route('seller.content_management.about_us')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">About Us</p>
                        </a>
                     </li>



            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Others
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">

            <li class="nav-item">
                        <a href="{{ URL('/faq')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">FAQ</p>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ URL('/instruction')}}" class="nav-link">
                           <i class="far fa-circle nav-icon" style="font-size: 13px;"></i>
                           <p style="font-size:14px">Instructions</p>
                        </a>
                     </li>

            </ul>
          </li>
             <li class="nav-item">


             <a class="nav-link" href="{{URL('seller/logout')}}"> <i class="nav-icon fas fa-power-off"></i> <p> Logout </p> </a>

          </li>
        </ul>

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
