<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include("Partials.donner-head-scripts")

</head>
<body class="skin-blue">
<div class="wrapper">
    <!-- Header -->
    @include('Partials.header')

            <!-- Sidebar -->
    @include('Partials.sidebar')

            <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('Partials.footer')

</div><!-- ./wrapper -->
@include('Partials.donner-footer-scripts')
<script src="/js/js.js"></script>
</body>
</html>