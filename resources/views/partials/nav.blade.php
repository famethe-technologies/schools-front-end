<nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>


    </ul>
    <!-- \Left navbar links -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


      <!--  logout  -->
      <li class="nav-item">


          <form id="sign_out" method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="btn btn-danger btn-sm"  role="button">
                  <i class="fas fa-sign-out-alt"></i>
              </button>
          </form>

      </li>
      <!--  \logout  -->
    </ul>
    <!-- \Right navbar links -->

  </nav>
