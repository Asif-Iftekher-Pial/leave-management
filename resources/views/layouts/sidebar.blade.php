<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      @if (auth()->user()->role == 'admin')
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person"></i><span>Employee</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{ route('employee.index') }}">
                <i class="bi bi-circle"></i><span>Index</span>
              </a>
            </li>
            
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#components-nav-leave" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Leave Manage</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="components-nav-leave" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{ route('leave-request-manage.index') }}">
                <i class="bi bi-circle"></i><span>Index</span>
              </a>
            </li>
            
          </ul>
        </li>
      @endif

      @if (auth()->user()->role == 'employee')
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Leave Requests</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="{{ route('employee-leave-request.index') }}">
                <i class="bi bi-circle"></i><span>Index</span>
              </a>
            </li>
            
          </ul>
        </li><!-- End Forms Nav -->
      @endif
     

     
    </ul>

  </aside>