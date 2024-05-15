<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $title ?? 'Admin PonPes Al-Falah' }}</title>
<link rel="stylesheet" href="{{ asset('css/stylesadmin.css') }}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Mengambil URL saat ini
        var currentUrl = window.location.href;

        // Loop melalui setiap item navbar
        $('.navbar li').each(function() {
            var menuUrl = $(this).find('a').attr('href');

            // Memeriksa apakah URL saat ini cocok dengan URL menu
            if (currentUrl.indexOf(menuUrl) !== -1) {
                $(this).addClass('active');
            }
        });
    });
</script>
