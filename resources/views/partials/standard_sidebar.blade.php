<nav class="mt-2" >
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            @if(Auth::user()->role=='superadmin')
            <a href="/home" class="nav-link" id="dashboard">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    {{__('Home')}}
                </p>
            </a>
            @else
                <a href="/school/{{Auth::user()->institution_id}}" class="nav-link" id="dashboard">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{__('Home')}}
                    </p>
                </a>
            @endif
        </li>

        <li class="nav-item">
            <a href="" class="nav-link" id="profile">
                <i class="nav-icon fas fa-user-circle"></i>
                <p>
                    {{__('Profile')}}
                </p>
            </a>
        </li>

        <li class="nav-item has-treeview" id="prices">
            <a href="#" class="nav-link" id="prices_link">
                <i class="nav-icon fas fa-user-graduate"></i>
                <p>
                    {{__('Staff')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">


                <li class="nav-item">
                    <a href="/staff" class="nav-link" id="branches">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>{{__('Add')}}</p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="/view/staff/{{Session::get('school_id')}}" class="nav-link" id="tests">
                        <i class="nav-icon fas fa-eye"></i>
                        <p>
                            {{__('View')}}
                        </p>
                    </a>
                </li>
            </ul>
        <li class="nav-item has-treeview" id="prices">
            <a href="#" class="nav-link" id="prices_link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    {{__('Students')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">


                <li class="nav-item">
                    <a href="/create/student" class="nav-link" id="branches">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>{{__('Add')}}</p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="/view/students" class="nav-link" id="tests">
                        <i class="nav-icon fas fa-eye"></i>
                        <p>
                            {{__('View')}}
                        </p>
                    </a>
                </li>



            </ul>
        <li class="nav-item has-treeview" id="prices">
            <a href="#" class="nav-link" id="prices_link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    {{__('Classes')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">


                <li class="nav-item">
                    <a href="/create/class" class="nav-link" id="branches">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>{{__('Add')}}</p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="/view/classes/{{Session::get('school_id')}}" class="nav-link" id="tests">
                        <i class="nav-icon fas fa-eye"></i>
                        <p>
                            {{__('View')}}
                        </p>
                    </a>
                </li>



            </ul>
                <li class="nav-item has-treeview" id="prices">
                    <a href="#" class="nav-link" id="prices_link">
                        <i class="nav-icon fas fa-medal"></i>
                        <p>
                            {{__('Sport Houses')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">


                        <li class="nav-item">
                            <a href="/create/sport-house" class="nav-link" id="branches">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>{{__('Add')}}</p>
                            </a>
                        </li>



                        <li class="nav-item">
                            <a href="/view/sport-houses" class="nav-link" id="tests">
                                <i class="nav-icon fas fa-eye"></i>
                                <p>
                                    {{__('View')}}
                                </p>
                            </a>
                        </li>



            </ul>
        </li>

        <li class="nav-item has-treeview" id="prices">
            <a href="#" class="nav-link" id="prices_link">
                <i class="nav-icon fas fa-receipt"></i>
                <p>
                    {{__('Receipts')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">


                <li class="nav-item">
                    <a href="{{route("receipts.create")}}" class="nav-link" id="branches">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>{{__('Add')}}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route("receipts.schoolBalancePage")}}" class="nav-link" id="tests">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            {{__('School Balance')}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("receipts.studentBalancePage")}}" class="nav-link" id="tests">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            {{__('Student Balance')}}
                        </p>
                    </a>
                </li>
            </ul>

        <li class="nav-item has-treeview" id="prices">
            <a href="#" class="nav-link" id="prices_link">
                <i class="nav-icon fas fa-school"></i>
                <p>
                    {{__('Institutions')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">


                <li class="nav-item">
                    <a href="{{route("institutions.createView")}}" class="nav-link" id="branches">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>{{__('Add')}}</p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="{{route("institutions.view")}}" class="nav-link" id="tests">
                        <i class="nav-icon fas fa-eye"></i>
                        <p>
                            {{__('View')}}
                        </p>
                    </a>
                </li>


            </ul>
        </li>

        <li class="nav-item has-treeview" id="prices">
            <a href="#" class="nav-link" id="prices_link">
                <i class="nav-icon fas fa-money-bill-wave"></i>
                <p>
                    {{__('Fees')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">


                <li class="nav-item">
                    <a href="{{route("fees.create")}}" class="nav-link" id="branches">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>{{__('Add')}}</p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="{{route("fees.index")}}" class="nav-link" id="tests">
                        <i class="nav-icon fas fa-eye"></i>
                        <p>
                            {{__('View')}}
                        </p>
                    </a>
                </li>


            </ul>
        </li>

        <li class="nav-item has-treeview" id="prices">
            <a href="#" class="nav-link" id="prices_link">
                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                <p>
                    {{__('Invoices')}}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">


                <li class="nav-item">
                    <a href="{{route("invoices.create")}}" class="nav-link" id="branches">
                        <i class="fas fa-plus nav-icon"></i>
                        <p>{{__('Add')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("invoices.classPage")}}" class="nav-link" id="tests">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            {{__('Class Invoice')}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("invoices.schoolPage")}}" class="nav-link" id="tests">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            {{__('School Invoice')}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("invoices.termPage")}}" class="nav-link" id="tests">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            {{__('Term Invoice')}}
                        </p>
                    </a>
                </li>


            </ul>
        </li>
    </ul>
</nav>

