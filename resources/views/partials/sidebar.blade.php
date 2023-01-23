<!-- Sidebar -->
<aside class="main-sidebar sidebar-light-primary elevation-4" style="background-color:#fff;">
    <!-- Brand Logo -->
    <br>
{{--    <img src="{{url('img/school2.png')}}" height="120" width="220" >--}}
    <a href="#" class="brand-link">
    </a>
    <!-- \Brand Logo -->

    <div class="sidebar" >
      <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{url('/img/user-profile.png')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">
                {{Auth::user()->first_name}} {{Auth::user()->last_name}}
            </a>
          </div>
        </div>
        @include('partials.admin_sidebar')
    </div>
</aside>
<!-- /.sidebar -->
