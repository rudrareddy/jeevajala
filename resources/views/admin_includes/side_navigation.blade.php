<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
               
                <li>
                    <a href="{{url('admin/dashboard')}}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                
                
              
                
                <li>
                    <a href="{{url('admin/transactions')}}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Transactions</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/customers')}}">
                        <i data-feather="users"></i>
                        <span data-key="t-dashboard">Customers</span>
                    </a>
                </li>
               

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="settings"></i>
                        <span>Credit Requests</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/pending-credit-requests')}}"><span>Pending </span></a></li>
                        <li><a href="{{url('admin/approved-credit-requests')}}"><span>Approved </span></a></li>
                        <li><a href="{{url('admin/rejected-credit-requests')}}"><span>Reject</span></a></li>
                        
                    </ul>
                </li>
               
               
                <!--<li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span>Leads</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('admin/appointments')}}"><span>Appointments </span></a></li>
                        
                    </ul>
                </li>-->
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
