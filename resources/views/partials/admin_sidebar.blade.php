<nav class="mt-2" >
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="/home" class="nav-link" id="dashboard">
            <i class="nav-icon fas fa-th"></i>
            <p>
                {{__('Dashboard')}}
            </p>
        </a>
      </li>

        <li class="nav-item has-treeview" id="prices">
        <a href="#" class="nav-link" id="profile">
            <i class="nav-icon fas fa-user-circle"></i>
            <p>
                {{__('User Management')}}
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
          <ul class="nav nav-treeview">


              <li class="nav-item">
                  <a href="/create/user" class="nav-link" id="addusers">
                      <i class="fas fa-map-marked-alt nav-icon"></i>
                      <p>{{__('Add')}}</p>
                  </a>
              </li>



              <li class="nav-item">
                  <a href="/view/users" class="nav-link" id="viewusers">
                      <i class="nav-icon fas fa-home"></i>
                      <p>
                          {{__('View')}}
                      </p>
                  </a>
              </li>




          </ul>
      </li>

            <li class="nav-item has-treeview" id="prices">
                <a href="#" class="nav-link" id="prices_link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                        {{__('Schools')}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">


                        <li class="nav-item">
                            <a href="/add/school" class="nav-link" id="branches">
                                <i class="fas fa-map-marked-alt nav-icon"></i>
                                <p>{{__('Add')}}</p>
                            </a>
                        </li>



                        <li class="nav-item">
                            <a href="/schools" class="nav-link" id="tests">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    {{__('View')}}
                                </p>
                            </a>
                        </li>




    </ul>
</nav>

