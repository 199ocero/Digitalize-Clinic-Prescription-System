@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
        <div class="d-flex align-items-center justify-content-center">					 	
          <img src="{{asset('backend/images/logo-dark.png')}}">
       </div>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		  
        @role('admin')
        <li class="{{($route=='dashboard')?'active':''}}">
          <a href="{{route('dashboard')}}">
            <i data-feather="pie-chart"></i>
			        <span>Dashboard</span>
          </a>
        </li>
          <li class="header nav-small-cap">Account Management</li>
          <li class="treeview">
            <a href="#">
              <i data-feather="user"></i>
              <span>Account</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{(($prefix=='admin' && $route=='view.admin.clinician')
              ||($prefix=='admin' && $route=='view.admin.clinician.add'))?'active':''}}"><a href="{{route('view.admin.clinician')}}"><i class="ti-more"></i>View Clinician</a></li>
              <li class="{{(($prefix=='admin' && $route=='view.admin.staff')
              ||($prefix=='admin' && $route=='view.admin.staff.add'))?'active':''}}"><a href="{{route('view.admin.staff')}}"><i class="ti-more"></i>View Staff</a></li>
          </ul>
          </li> 
        @endrole
        @role('staff')
        <li class="{{($route=='dashboard')?'active':''}}">
          <a href="{{route('dashboard')}}">
            <i data-feather="pie-chart"></i>
			        <span>Dashboard</span>
          </a>
        </li>
          <li class="header nav-small-cap">Patient Management</li>
          <li class="treeview">
            <a href="#">
              <i data-feather="user"></i>
              <span>Patient</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{(($prefix=='staff' && $route=='view.staff.patient')
              ||($prefix=='staff' && $route=='view.staff.patient.add'))?'active':''}}"><a href="{{route('view.staff.patient')}}"><i class="ti-more"></i>View Patient</a></li>
          </ul>
          </li> 
        @endrole
        @role('clinician')
        <li class="{{($route=='dashboard')?'active':''}}">
          <a href="{{route('dashboard')}}">
            <i data-feather="pie-chart"></i>
			        <span>Dashboard</span>
          </a>
        </li>
          <li class="header nav-small-cap">Account Management</li>
          <li class="treeview">
            <a href="#">
              <i data-feather="user"></i>
              <span>Account</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{(($prefix=='clinician' && $route=='view.profile.clinician'))?'active':''}}"><a href="{{route('view.profile.clinician')}}"><i class="ti-more"></i>View Profile</a></li>
              <li class=""><a href=""><i class="ti-more"></i>Change Password</a></li>
          </ul>
          </li>
          <li class="header nav-small-cap">Patient Management</li>
          <li class="treeview">
            <a href="#">
              <i data-feather="user"></i>
              <span>Patient</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class=""><a href=""><i class="ti-more"></i>View Patient</a></li>
          </ul>
          </li> 
        @endrole
		  <hr>
		  <li>
          <a href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            <i data-feather="lock"></i>
			        <span>Log Out</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
          
        </li> 
        
      </ul>
    </section>
	
	
  </aside>