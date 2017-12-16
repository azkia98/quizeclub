@include('client.layout.head')
<body>


@include('client.layout.nav')
<!-- Header -->
@include('client.layout.header')

<!-- First Grid -->
@yield('content')



<!-- Footer -->
@include('client.layout.footer')
<script src="/js/app.js"></script>
<script src="/js/my.js"></script>
</body>
</html>