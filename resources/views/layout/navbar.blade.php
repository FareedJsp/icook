
<nav class="main-header navbar navbar-expand orange">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/home0" class="nav-link text-white">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link text-white">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

      @guest
      <li class="nav-item">
        <a class="nav-link text-white" href="{{route('login')}}">
          {{__('login')}}
        </a>
      </li>
      
      @else

    <li class="nav-item">
        <a class="nav-link text-white" href="#" data-toggle="dropdown">
          {{Auth::User()->name}} <i class="nav-icon fa fa-sign-out-alt"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-item">
                <div class="media">
                    <div class="media-body text-dark">
                        <h3 class="dropdown-item-title">
                            {{Auth::User()->name ?? null}}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item dropdown-footer text-dark text-right" id="btn_logout"
                    href="{{ route('logout') }}" style="color: black !important;"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="nav-icon fa fa-sign-out-alt"></i> Logout
            </a>
            <form action="{{route('logout')}}" method="post" id="logout-form" style="display-none"> @csrf </form>
        </div>
      </li>
      @endguest

    </ul>
  </nav>

  <!-- /.navbar -->