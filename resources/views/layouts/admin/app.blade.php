<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Sistema</title>
    <link rel="stylesheet" type="text/css" href="css/select2.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->

    <link rel="stylesheet" href="{{ url('css/app.css') }}">

</head>


<body data-sidebar="dark">

<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<!-- Begin page -->
<div id="layout-wrapper">

    <!-- NAVBAR START -->
    @include('layouts.admin.components.navbar')
    <!-- NAVBAR End -->

    <!-- ========== Left Sidebar Start ========== -->
    @include('layouts.admin.components.sidebar')
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            @yield('content')
        </div>
        <!-- End Page-content -->
        @yield("script")
    @include('layouts.admin.components.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{ url('js/app.js') }}"></script>

</body>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</html>
<script>
    $(document).ready(function() {
        $('select').select2();
    });
</script>
