<!DOCTYPE html>
<html>
<head>
    @include('admin.layout.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="w3-light-grey">
<script>
    window.Url='<?php echo url('/');?>';
</script>


<div id="app">
@include('admin.layout.navigationbar')

<!-- Sidebar/menu -->


@include('admin.layout.slide')


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity"  @click="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

@yield('content')

    <!-- Footer -->
@include('admin.layout.footer')

<!-- End page content -->
</div>
</div>
<script src="/js/my.js"></script>
<script src="/js/app.js"></script>

</body>
</html>
