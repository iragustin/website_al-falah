<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.admin.head')

</head>

<body>

    @include('layouts.admin.sidebar')

    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    <div class="content">
        @yield('content')

    </div>

</body>

</html>
