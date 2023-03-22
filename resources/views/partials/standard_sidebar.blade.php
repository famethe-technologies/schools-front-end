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

        @if(Auth::user()->role =='bursar')
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
                        <a href="{{route("students.view")}}" class="nav-link" id="tests">
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
                        <a href="{{route('classes.index')}}" class="nav-link" id="tests">
                            <i class="nav-icon fas fa-eye"></i>
                            <p>
                                {{__('View')}}
                            </p>
                        </a>
                    </li>
                </ul>

            <li class="nav-item has-treeview" id="prices">
                <a href="#" class="nav-link" id="prices_link">
                    <i class="nav-icon fas fa-money-bill-wave"></i>
                    <p>
                        {{__('Fees Structure')}}
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
                    <i class="nav-icon fas fa-receipt"></i>
                    <p>
                        {{__('Receipts')}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
            <li class="nav-item">
                <a href="{{route("receipts.create")}}" class="nav-link" id="branches">
                    <i class="fas fa-plus nav-icon"></i>
                    <p>{{__('Add')}}</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route("receipts.create-bulk")}}" class="nav-link" id="branches">
                    <i class="fas fa-plus nav-icon"></i>
                    <p>{{__('Bulk Receipting')}}</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route("receipts.printPage")}}" class="nav-link" id="branches">
                    <i class="fas fa-print nav-icon"></i>
                    <p>{{__('Print Receipts')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route("receipts.cpcPage")}}" class="nav-link" id="branches">
                    <i class="fas fa-print nav-icon"></i>
                    <p>{{__('Print CPC')}}</p>
                </a>
            </li>

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
                        <a href="{{route("houses.index")}}" class="nav-link" id="tests">
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


                    {{--                <li class="nav-item">--}}
                    {{--                    <a href="{{route("invoices.create")}}" class="nav-link" id="branches">--}}
                    {{--                        <i class="fas fa-plus nav-icon"></i>--}}
                    {{--                        <p>{{__('Add')}}</p>--}}
                    {{--                    </a>--}}
                    {{--                </li>--}}
                    <li class="nav-item">
                        <a href="{{route("invoices.classPage")}}" class="nav-link" id="tests">
                            {{--                        <i class="nav-icon fas fa-home"></i>--}}
                            <p>
                                {{__('View Class Invoice')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("invoices.schoolPage")}}" class="nav-link" id="tests">
                            {{--                        <i class="nav-icon fas fa-home"></i>--}}
                            <p>
                                {{__('View School Invoices')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("invoices.termPage")}}" class="nav-link" id="tests">
                            {{--                        <i class="nav-icon fas fa-home"></i>--}}
                            <p>
                                {{__('Generate Term Invoices')}}
                            </p>
                        </a>
                    </li>


                </ul>
            </li>
        @endif

        @if(Auth::user()->role =='teacher')
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
                        <a href="{{route("students.view")}}" class="nav-link" id="tests">
                            <i class="nav-icon fas fa-eye"></i>
                            <p>
                                {{__('View')}}
                            </p>
                        </a>
                    </li>
                </ul>

            <li class="nav-item has-treeview" id="prices">
                <a href="#" class="nav-link" id="prices_link">
                    <i class="nav-icon fas fa-money-bill-wave"></i>
                    <p>
                        {{__('Fees Structure')}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
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
                    <i class="nav-icon fas fa-receipt"></i>
                    <p>
                        {{__('Receipts')}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="" class="nav-link" id="branches">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>{{__('View Receipts')}}</p>
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
                        <a href="{{route("houses.index")}}" class="nav-link" id="tests">
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


                    {{--                <li class="nav-item">--}}
                    {{--                    <a href="{{route("invoices.create")}}" class="nav-link" id="branches">--}}
                    {{--                        <i class="fas fa-plus nav-icon"></i>--}}
                    {{--                        <p>{{__('Add')}}</p>--}}
                    {{--                    </a>--}}
                    {{--                </li>--}}
                    <li class="nav-item">
                        <a href="{{route("invoices.classPage")}}" class="nav-link" id="tests">
                            {{--                        <i class="nav-icon fas fa-home"></i>--}}
                            <p>
                                {{__('View Class Invoice')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("invoices.schoolPage")}}" class="nav-link" id="tests">
                            {{--                        <i class="nav-icon fas fa-home"></i>--}}
                            <p>
                                {{__('View School Invoices')}}
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        @if(Auth::user()->role =='it-support')
            <li class="nav-item has-treeview" id="prices">
                <a href="#" class="nav-link" id="prices_link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{__('Students')}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
            <li class="nav-item">
                <a href="/create/student" class="nav-link" id="branches">
                    <i class="fas fa-plus nav-icon"></i>
                    <p>{{__('Add')}}</p>
                </a>
            </li>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route("students.view")}}" class="nav-link" id="tests">
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
                        <a href="{{route('classes.index')}}" class="nav-link" id="tests">
                            <i class="nav-icon fas fa-eye"></i>
                            <p>
                                {{__('View')}}
                            </p>
                        </a>
                    </li>
                </ul>

            <li class="nav-item has-treeview" id="prices">
                <a href="#" class="nav-link" id="prices_link">
                    <i class="nav-icon fas fa-money-bill-wave"></i>
                    <p>
                        {{__('Fees Structure')}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
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
                    <i class="nav-icon fas fa-receipt"></i>
                    <p>
                        {{__('Receipts')}}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="" class="nav-link" id="branches">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>{{__('View Receipts')}}</p>
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
                        <a href="{{route("houses.index")}}" class="nav-link" id="tests">
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


                    {{--                <li class="nav-item">--}}
                    {{--                    <a href="{{route("invoices.create")}}" class="nav-link" id="branches">--}}
                    {{--                        <i class="fas fa-plus nav-icon"></i>--}}
                    {{--                        <p>{{__('Add')}}</p>--}}
                    {{--                    </a>--}}
                    {{--                </li>--}}
                    <li class="nav-item">
                        <a href="{{route("invoices.classPage")}}" class="nav-link" id="tests">
                            {{--                        <i class="nav-icon fas fa-home"></i>--}}
                            <p>
                                {{__('View Class Invoice')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("invoices.schoolPage")}}" class="nav-link" id="tests">
                            {{--                        <i class="nav-icon fas fa-home"></i>--}}
                            <p>
                                {{__('View School Invoices')}}
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        @if(Auth::user()->role =='superadmin')

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
                        <a href="{{route("staff.create")}}" class="nav-link" id="branches">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>{{__('Add')}}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("staff.index")}}" class="nav-link" id="tests">
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
                        <a href="{{route("students.view")}}" class="nav-link" id="tests">
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
                        <a href="{{route('classes.index')}}" class="nav-link" id="tests">
                            <i class="nav-icon fas fa-eye"></i>
                            <p>
                                {{__('View Active Classes')}}
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('viewAllClass')}}" class="nav-link" id="tests">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>
                                {{__('View All Classes')}}
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
                        <a href="{{route("houses.index")}}" class="nav-link" id="tests">
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
                        <a href="{{route("receipts.create-bulk")}}" class="nav-link" id="branches">
                            <i class="fas fa-plus nav-icon"></i>
                            <p>{{__('Bulk Receipting')}}</p>
                        </a>
                    </li>

                        <li class="nav-item">
                            <a href="{{route("receipts.printPage")}}" class="nav-link" id="branches">
                                <i class="fas fa-print nav-icon"></i>
                                <p>{{__('Print Receipts')}}</p>
                            </a>
                        </li>
                    <li class="nav-item">
                            <a href="{{route("receipts.cpcPage")}}" class="nav-link" id="branches">
                                <i class="fas fa-print nav-icon"></i>
                                <p>{{__('Print CPC')}}</p>
                            </a>
                        </li>

                    {{--                <li class="nav-item">--}}
                    {{--                    <a href="{{route("receipts.schoolBalancePage")}}" class="nav-link" id="tests">--}}
                    {{--                        <i class="nav-icon fas fa-home"></i>--}}
                    {{--                        <p>--}}
                    {{--                            {{__('School Balance')}}--}}
                    {{--                        </p>--}}
                    {{--                    </a>--}}
                    {{--                </li>--}}
                    {{--                <li class="nav-item">--}}
                    {{--                    <a href="{{route("receipts.studentBalancePage")}}" class="nav-link" id="tests">--}}
                    {{--                        <i class="nav-icon fas fa-home"></i>--}}
                    {{--                        <p>--}}
                    {{--                            {{__('Student Balance')}}--}}
                    {{--                        </p>--}}
                    {{--                    </a>--}}
                    {{--                </li>--}}
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
                        <a href="{{route("schools.index")}}" class="nav-link" id="tests">
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


                    {{--                <li class="nav-item">--}}
                    {{--                    <a href="{{route("invoices.create")}}" class="nav-link" id="branches">--}}
                    {{--                        <i class="fas fa-plus nav-icon"></i>--}}
                    {{--                        <p>{{__('Add')}}</p>--}}
                    {{--                    </a>--}}
                    {{--                </li>--}}
                    <li class="nav-item">
                        <a href="{{route("invoices.classPage")}}" class="nav-link" id="tests">
                            {{--                        <i class="nav-icon fas fa-home"></i>--}}
                            <p>
                                {{__('View Class Invoice')}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("invoices.schoolPage")}}" class="nav-link" id="tests">
                            {{--                        <i class="nav-icon fas fa-home"></i>--}}
                            <p>
                                {{__('View School Invoices')}}
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route("invoices.classPage")}}" class="nav-link" id="tests">
                            {{--                        <i class="nav-icon fas fa-home"></i>--}}
                            <p>
                                {{__('Generate Class Invoices')}}
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route("invoices.termPage")}}" class="nav-link" id="tests">
                            {{--                        <i class="nav-icon fas fa-home"></i>--}}
                            <p>
                                {{__('Generate Term Invoices')}}
                            </p>
                        </a>
                    </li>


                </ul>
            </li>
        @endif
    </ul>
</nav>

