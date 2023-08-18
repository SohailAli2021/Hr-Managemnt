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
        <h3>HR Management</h3>
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
                        <li><a class="active" href="index.html">Admin Dashboard</a></li>
                     
                    </ul>
                </li>
                
                

                <li class="menu-title"> 
                    <span>Employees</span>
                </li>
                <li class="submenu">
                    <a href="#" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('employee.index')}}">All Employees</a></li>
                        
                        <li><a href="{{url('admin/leave')}}">Leaves (Employee)</a></li>
                        {{-- <li><a href="leave-settings.html">Leave Settings</a></li> --}}
                        {{-- <li><a href="">Attendance (Admin)</a></li> --}}
                        <li><a href="{{url('attendance/index')}}">Attendance (Employee)</a></li>
                        <li><a href="{{ route('department.index')}}">Departments</a></li>
                        <li><a href="{{ route('designation.index')}}">Designations</a></li>
                        {{-- <li><a href="timesheet.html">Timesheet</a></li>
                        <li><a href="shift-scheduling.html">Shift & Schedule</a></li> --}}
                        <li><a href="{{url('overtimes')}}">Overtime</a></li>
                        {{-- <li><a href="{{url('filemanager/index')}}">FileManager</a></li> --}}
                    </ul>
                </li>
                {{-- <li> 
                    <a href="clients.html"><i class="la la-users"></i> <span>Clients</span></a>
                </li> --}}
                <li class="submenu">
                    <a href="#"><i class="la la-rocket"></i> <span> Projects</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{url('/projects')}}">Projects</a></li>
                        {{-- <li><a href="tasks.html">Tasks</a></li>
                        <li><a href="task-board.html">Task Board</a></li> --}}
                    </ul>
                </li>
                
                
                <li class="menu-title"> 
                    <span>HR</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-files-o"></i> <span>    Deductions </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        {{-- <li><a href="estimates.html">Estimates</a></li>
                        <li><a href="invoices.html">Invoices</a></li>
                        <li><a href="payments.html">Payments</a></li>
                        <li><a href="expenses.html">Expenses</a></li> --}}
                        {{-- <li><a href="provident-fund.html">Provident Fund</a></li> --}}
                        <li><a href="{{url('deductions')}}">Deductions</a></li>
                    </ul>
                </li>
                {{-- <li class="submenu">
                    <a href="#"><i class="la la-files-o"></i> <span> Accounting </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="categories.html">Categories</a></li>
                        <li><a href="budgets.html">Budgets</a></li>
                        <li><a href="budget-expenses.html">Budget Expenses</a></li>
                        <li><a href="budget-revenues.html">Budget Revenues</a></li>
                    </ul>
                </li> --}}
                <li class="submenu">
                    <a href="#"><i class="la la-money"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{url('addition')}}"> Employee Salary </a></li>
                        {{-- <li><a href="salary-view.html"> Payslip </a></li>
                        <li><a href="payroll-items.html"> Payroll Items </a></li> --}}
                    </ul>
                </li>
               
              
                <li class="menu-title"> 
                    <span>Feedback</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-graduation-cap"></i> <span> Review Feedback </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{url('/monthly-feedback')}}">Give Feedback</a></li>
                        
                    </ul>
                </li>
               
                
                <li class="submenu">
                    <a href="#"><i class="la la-edit"></i> <span> Training </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{url('/trainings')}}"> Training List </a></li>
                        <li><a href="{{url('/trainers')}}"> Trainers</a></li>
                        <li><a href="{{url('trainingtype/index')}}"> Training Type </a></li>
                    </ul>
                </li>
            
                <li class="menu-title"> 
                    <span>Administration</span>
                </li>
               
                <li class="submenu">
                    <a href="#"><i class="la la-briefcase"></i> <span> Jobs </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                      

                        <li><a href="{{url('/jobs/index')}}"> Manage Jobs </a></li>
                        <li><a href="{{url('/job_applications/index')}}"> Manage Resumes </a></li>
                       
                    </ul>
                </li>
                
                
                {{-- <li class="submenu">
                    <a href="#"><i class="la la-key"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="login.html"> Login </a></li>
                        <li><a href="register.html"> Register </a></li>
                        <li><a href="forgot-password.html"> Forgot Password </a></li>
                    </ul>
                </li> --}}
                
                
                
                
                
                
              
                
              
                
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->