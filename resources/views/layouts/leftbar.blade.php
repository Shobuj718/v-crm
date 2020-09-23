<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('/dashboard') }}" class="brand-link">
      <img src="{{ asset('/adminlte/') }}/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SM MANPOWER M.</span>
    </a>
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/adminlte/') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name ?? '' }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item has-treeview @yield('company')">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Companies
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('company.list') }}" class="nav-link @yield('company-list')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Companly List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('add.company') }}" class="nav-link @yield('company-add')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Company</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview @yield('member')">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Members
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('member.list') }}" class="nav-link @yield('member-list')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Members List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('add.member') }}" class="nav-link @yield('add-member')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Member</p>
                </a>
              </li>
            </ul>
          </li>

          
          <li class="nav-item has-treeview @yield('category')">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ asset('/dashboard') }}" class="nav-link @yield('category-list')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('/dashboard') }}" class="nav-link @yield('add-category')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview @yield('expire')">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Expires
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ asset('/dashboard') }}" class="nav-link @yield('expire-list')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expires List</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview @yield('report')">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ asset('/dashboard') }}" class="nav-link @yield('income')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Income</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('/dashboard') }}" class="nav-link @yield('expense')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expense</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('/dashboard') }}" class="nav-link @yield('income-expense')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Income/Expense</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('/dashboard') }}" class="nav-link @yield('due-installment')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Due Installment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('/dashboard') }}" class="nav-link @yield('passport-expired')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Passport Expired</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('/dashboard') }}" class="nav-link @yield('visa-expired')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visa Expired</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('/dashboard') }}" class="nav-link @yield('cidb-submission')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>CIDB Submission</p>
                </a>
              </li>
            </ul>
          </li>

          

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Users</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
</aside>