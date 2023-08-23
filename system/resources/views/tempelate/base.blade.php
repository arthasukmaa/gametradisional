<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PERMAINAN TRADISIONAL INDONESIA</title>
  <link rel="shortcut icon" type="image/png" href="{{ url('public') }}/assets/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="{{ url('public') }}/assets/assets/css/styles.min.css" />
  <link rel="stylesheet" href="{{ url('public') }}/assets/datatable/dataTables.bootstrap5.css" />
  <script src="https://cdn.tiny.cloud/1/dvqiqnhw0jc0f8huntc1c0gv6n4gz6mb5z5ocfc3r2hiknuu/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <style>
    .tox-statusbar{
      display: none !important;
    }
  </style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
        @include('tempelate.leftbar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      @include('tempelate.navbar')
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Row 1 -->
        
        @include('tempelate.notif')
        @yield('content')


        
      </div>
    </div>
  </div>
  <script src="{{ url('public') }}/assets/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="{{ url('public') }}/assets/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('public') }}/assets/assets/js/sidebarmenu.js"></script>
  <script src="{{ url('public') }}/assets/assets/js/app.min.js"></script>
  <script src="{{ url('public') }}/assets/datatable/jquery.dataTables.js"></script>
  <script src="{{ url('public') }}/assets/datatable/dataTables.bootstrap5.js"></script>
  

  <script>
    tinymce.init({
      selector: 'textarea#tiny-textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script>
  <script>
    new DataTable('#datatable');
  </script>
</body>

</html>