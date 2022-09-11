<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                order: [[3, 'desc']],
                buttons: {
                    dom: {
                        button: {
                            className: 'btn btn-outline-info mr-2' //Primary class for all buttons
                        }
                    },
                    buttons: [
                        {
                            //EXCEL
                            extend: 'excelHtml5',
                            // text: '<i class="fas fa-file-excel"></i> EXCEL', //u can define a diferent text or icon
                            title: 'Schools List',
                        },
                        {
                            //CSV
                            extend: 'csvHtml5',
                            //  text: '<i class="fas fa-file-excel"></i>CSV', //u can define a diferent text or icon
                            title: 'Schools List',
                        },
                        {
                            //PRINT
                            extend: 'print',
                            //  text: '<i class="fas fa-print"></i>PRINT',
                            title: 'Schools List',
                        },
                        {
                            //PDF
                            extend: 'pdf',
                            text: '<i class="fas fa-pdf"></i>PDF',
                            title: 'Schools List',
                        }
                    ]
                }
            } );
        } );

    </script>
    <style>
        .dataTables_filter input { width: 200px ;height:40px ;font-size:20px}

        .dataTables_wrapper .dataTables_filter {
            text-align:center;
        }
        #example {
            text-transform: uppercase;

        }
    </style>
    @include('partials.head')



</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">


  <div class="wrapper">

    <!-- Navbar -->
    @include('partials.nav')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('partials.base_sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      @yield('breadcrumb')
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          @include('partials.validation_errors')
          @yield('content')

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    @include('partials.footer')
    <!-- /.Footer -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-light">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

  </div>
  <!-- ./wrapper -->

  @include('partials.scripts')

  @yield('scripts')

</body>
</html>
