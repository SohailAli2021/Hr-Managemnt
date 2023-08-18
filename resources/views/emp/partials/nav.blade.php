<!-- Header -->
<div class="header">
		
    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>
    
    <!-- Header Title -->
    <div class="page-title-box">
        <h3>Employee Management</h3>
    </div>
    <!-- /Header Title -->
    
    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
    
    <!-- Header Menu -->
    <ul class="nav user-menu">
    

    
       
    


        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><img src="{{asset('backend//img/profiles/avatar-21.jpg')}}" alt="">
                <span class="status online"></span></span>
                <span>{{@Auth::user()->name}}</span>
            </a>
            <div class="dropdown-menu">
                
                <a class="dropdown-item" href="{{ route('logout')}}">Logout</a>
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->
    
    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
     
            <a class="dropdown-item" href="{{ route('logout')}}">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->
    
</div>
<!-- /Header -->

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"> 
                    <span>Main</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-dashboard"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        
                        <li><a href="{{url('empindex')}}">Employee Dashboard</a></li>
                    </ul>
                </li>
                
                
    
                <li class="menu-title"> 
                    <span>Employees</span>
                </li>
                <li class="submenu">
                    <a href="#" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        
                        
                      
                        <li><a href="{{url('employee/attendance')}}">Attendance</a></li>
                        <li><a href="{{url('employee/leave')}}">Leaves</a></li>
                      
                        {{-- <li> @foreach($employees as $employee)
                            <a href="{{ route('employee.feedback', ['employee' => $employee->id]) }}"> Feedback</a>
                        @endforeach</li> --}}
                        <li><a href="{{url('employee/jobs')}}">Apply for Jobs</a></li>
                        <li><a href="{{url('employee/applications')}}">Jobs Approval</a></li>
                        <li><a href="{{url('employee/project')}}">Projects</a></li>
                        <li><a href="{{url('/employee/feedback')}}">Feedback</a></li>
                        <li><a href="{{url('filemanager/index')}}">File Manager</a></li>
                        
                    </ul>
                </li>
                
                
                
                
                
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->