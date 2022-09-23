  
  <aside class="main-sidebar orange">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light text-white">icook</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

              <li class="nav-item">
                <a href="/home" class="nav-link">
                  <i class="nav-icon fa-solid fa-arrow-right text-white"></i>
                  <p class="text-white">
                    Dashboard
                  </p>
                </a>
              </li>

              @php
               $role = Auth::User()->role ?? null
              @endphp
           
               @if ($role == 'admin')

          <li class="nav-item">
            <a href="/category" class="nav-link">
              <i class="nav-icon fa-solid fa-list text-white"></i>
              <p class="text-white">
                Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/user" class="nav-link">
              <i class="nav-icon fa-solid fa-user text-white"></i>
              <p class="text-white">
                User
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/resepi" class="nav-link">
              <i class="nav-icon fa-solid fa-book text-white"></i>
              <p class="text-white">
                Resepi
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/video" class="nav-link">
              <i class="nav-icon fa-solid fa-video text-white"></i>
              <p class="text-white">
                Video
              </p>
            </a>
          </li>

          @else

          <li class="nav-item">
            <a href="/resepi" class="nav-link">
              <i class="nav-icon fa-solid fa-book text-white"></i>
              <p class="text-white">
                Resepi
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/video" class="nav-link">
              <i class="nav-icon fa-solid fa-video text-white"></i>
              <p class="text-white">
                Video
              </p>
            </a>
          </li>

          
          @endif

          @php
              $id = Auth::User()->id ?? null
          @endphp

          <li class="nav-item">
            <a href="/setting/{{$id}}" class="nav-link">
              <i class="nav-icon fa-solid fa-gear text-white"></i>
              <p class="text-white">
                Setting
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/change-password" class="nav-link">
              <i class="nav-icon fa-solid fa-gear text-white"></i>
              <p class="text-white">
                Change Password
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>