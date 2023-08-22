<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} | {{ isset($title)? $title:'Dashboard' }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{!! url('assets/plugins/fontawesome-free/css/all.min.css') !!}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{!! url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') !!}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{!! url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') !!}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{!! url('assets/plugins/jqvmap/jqvmap.min.css') !!}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!! url('assets/dist/css/adminlte.min.css') !!}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{!! url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') !!}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{!! url('assets/plugins/daterangepicker/daterangepicker.css') !!}">
    <!-- summernote -->
    <link rel="stylesheet" href="{!! url('assets/plugins/summernote/summernote-bs4.min.css') !!}">

     <!-- DataTables -->
    <link rel="stylesheet" href="{!! url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}">
    <link rel="stylesheet" href="{!! url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}">
    <link rel="stylesheet" href="{!! url('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') !!}">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{!! url('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') !!}">

    <!-- Our Custom style -->
    <link rel="stylesheet" href="{!! url('assets/css/app.css') !!}">
 
  </head>       
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{!! url('assets/dist/img/AdminLTELogo.png') !!}" alt="AdminLTELogo" height="60" width="60">
      </div>

      <!-- Navbar -->
      @include('layouts.partials.nav');
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('home.index') }}" class="brand-link">
          <img src="{!! url('assets/dist/img/AdminLTELogo.png') !!}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        @include('layouts.partials.sidebar');
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper main-content-margin-top">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">@yield('page-title')</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                {{ Breadcrumbs::render() }}
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="mt-2">
            @include('layouts.partials.messages')
          </div>
          @yield('content')
          <style>
            .toggle-button-container {
              position: fixed;
              top: 50%;
              right: 20px;
              transform: translateY(-50%);
              z-index: 9999;
            }

            #toggle-print-toolbar-button {
              position: relative;
              display: flex;
              align-items: center;
              justify-content: center;
              padding: 10px;
              background-color: #007bff;
              color: #fff;
              border: none;
              border-radius: 5px;
              cursor: pointer;
            }

            .toggle-button-icon {
              display: inline-block;
              width: 20px;
              height: 2px;
              background-color: #fff;
              position: relative;
              transition: transform 0.3s ease;
            }

            .toggle-button-icon::before,
            .toggle-button-icon::after {
              content: '';
              position: absolute;
              width: 100%;
              height: 100%;
              background-color: #fff;
              transition: transform 0.3s ease;
            }

            /* .toggle-button-icon::before {
              top: -6px;
            }

            .toggle-button-icon::after {
              bottom: -6px;
            } */

            .print-toolbar-container {
              display: none;
              position: fixed;
              top: 50%;
              right: calc(100% + 10px);
              transform: translateY(-50%);
              z-index: 9998;
            }

            .navbar {
              margin-bottom: 0;
            }

            .navbar-nav .nav-link {
              margin-right: 10px;
            }

            .btn-primary {
              margin-left: 10px;
            }

          </style>
          <div class="toggle-button-container">
            <button id="toggle-print-toolbar-button">
              <span class="toggle-button-icon"><i class="fas fa-print"></i></span>
            </button>
          </div>
          
          <div class="print-toolbar-container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#" id="export-pdf">
                    <i class="fas fa-file-pdf"></i> Export as PDF
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" id="export-excel">
                    <i class="fas fa-file-excel"></i> Export as Excel
                  </a>
                </li>
              </ul>
              <button class="btn btn-primary ml-auto" id="print-button">
                <i class="fas fa-print"></i> Print
              </button>
            </nav>
          </div>          
          
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.2.0
        </div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{!! url('assets/plugins/jquery/jquery.min.js') !!}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{!! url('assets/plugins/jquery-ui/jquery-ui.min.js') !!}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{!! url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <!-- daterangepicker -->
    <script src="{!! url('assets/plugins/moment/moment.min.js') !!}"></script>
    <script src="{!! url('assets/plugins/daterangepicker/daterangepicker.js') !!}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{!! url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') !!}"></script>
    <!-- Summernote -->
    <script src="{!! url('assets/plugins/summernote/summernote-bs4.min.js') !!}"></script>
    <!-- overlayScrollbars -->
    <script src="{!! url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') !!}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{!! url('assets/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') !!}"></script>
    <script src="{!! url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') !!}"></script>
    <script src="{!! url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') !!}"></script>
    <script src="{!! url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') !!}"></script>
    <script src="{!! url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') !!}"></script>
    <script src="{!! url('assets/plugins/jszip/jszip.min.js') !!}"></script>
    <script src="{!! url('assets/plugins/pdfmake/pdfmake.min.js') !!}"></script>
    <script src="{!! url('assets/plugins/pdfmake/vfs_fonts.js') !!}"></script>
    <script src="{!! url('assets/plugins/datatables-buttons/js/buttons.html5.min.js') !!}"></script>
    <script src="{!! url('assets/plugins/datatables-buttons/js/buttons.print.min.js') !!}"></script>
    <script src="{!! url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') !!}"></script>

    <!-- AdminLTE App -->
    <script src="{!! url('assets/dist/js/adminlte.js') !!}"></script>
    {{-- <script src="{!! url('assets/dist/js/adminlte.min.js') !!}"></script> --}}
    <!-- AdminLTE for demo purposes -->
    <script src="{!! url('assets/dist/js/admin-demo-js-file.js') !!}"></script>

    <!-- SweetAlert2 -->
    <script src="{!! url('assets/plugins/sweetalert2/sweetalert2.min.js') !!}"></script>

    @yield('dashboard-scripts')


    <!-- Page specific script -->
    <script>
      $(function () {
        dataTable = $(".data-table").DataTable({
          "processing": true,
          "responsive": true, 
          "lengthChange": false, 
          "autoWidth": false, 
          "searching": false, 
          "paging": false, 
          "info": false,
          "ordering": true,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
        dataTable.buttons().container().addClass( 'float-right' ).appendTo('#data_table_wrapper .col-md-6:eq(1)');
        // dataTable.page.len({{ env('ROW_PER_PAGE') }});
      });
      $('.delete-form').on('submit', function(e) {
          e.preventDefault();
          Swal.fire({
            title: "Are you sure you want to delete this?",
            text: 'If you delete this, it will not be able to recover.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              this.submit();
            }
            
            return false;
          });
      });
    </script>
<script>
  $(document).ready(function() {
    // Toggle print toolbar
  $('#toggle-print-toolbar-button').click(function() {
    console.log($(this).outerWidth());
    $('.print-toolbar-container').toggle();
    $('.print-toolbar-container').css('right', $(this).outerWidth() + 30);
    $('.toggle-button-icon').toggleClass('active');
  });

    // Export as PDF
    $('#export-pdf').click(function(e) {
      e.preventDefault();
      // Perform the PDF export logic
      alert('PDF');
    });

    // Export as Excel
    $('#export-excel').click(function(e) {
      e.preventDefault();
      // Perform the Excel export logic
      alert('excel');
    });

    // Print
    $('#print-button').click(function() {
      window.print();
    });
  });
</script>
    @section("scripts")
    @show
  </body>
</html>