@extends('layouts.layout')
@section('content')
    <section id="registration-form">
        <h2>CEK STATUS PEMBAYARAN</h2>
        <!-- <form action="" method="post"> -->
            @csrf

            <div class="container-search">
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Cari Nama Lengkap Terdaftar...">
                <button onclick="search()">Cari</button>
            </div>
            </div>
        <!-- </form> -->
        <div class="container-table"> 
        <table id="table" style="visibility: hidden;"></table>
        </div>

    </section>

    <script>
        function search() {
            var pendaftar = {!! json_encode($pendaftar) !!};

            var searchInput = document.getElementById("searchInput").value.toLowerCase();

            var result = pendaftar.filter(function (pendaftar) {
                if (pendaftar.name.toLowerCase() == searchInput) {
                    return pendaftar;
                }
            });

            if (result.length > 0) {
                var table = document.getElementById("table");
                var status = result[0].is_paid;
                if (status == 1) {
                    status = "Lunas";
                } else {
                    status = "Belum Lunas / sedang ditinjau";
                }

                table.innerHTML = "<thead><tr><th>Nama</th><th>No. HP</th><th>Status pembayaran</th></tr></thead><tbody><tr><td>" + result[0].name + "</td><td>" + result[0].phone + "</td><td>" + status + "</td></tr></tbody>";
                table.style.visibility = "visible";
            } else {
                var table = document.getElementById("table");

                table.style.visibility = "hidden";
                alert("Pendaftar tidak ditemukan");
            }
                    
        }
    </script>
@endsection
