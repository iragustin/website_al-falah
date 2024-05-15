@extends('layouts.layout')
@section('content')

    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    @if (session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
    <section id="registration-form">
        <h2>UPLOAD BUKTI PEMBAYARAN</h2>
        <form action="/bukti-pembayaran" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Nama Lengkap Terdaftar:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="payment_proof">Upload Foto Bukti Pembayaran:</label>
                <input type="file" id="payment_proof" name="payment_proof" accept="image/*">
            </div>

            <button type="submit">KIRIM</button>
        </form>

    </section>
@endsection
