<!DOCTYPE html>
<html>
<head>
  @include('layouts.partials.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    @yield('b')
    @include('layouts.partials.script')

    <script type="text/javascript">
    $(document).ready( function () {
        $('.myTable').DataTable();
    } );
    </script>


</body>
</html>
