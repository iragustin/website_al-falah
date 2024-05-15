@extends('layouts.admin.layout')
@section('content')
    <!-- Konten admin panel -->
    <div class="container-head">
        <h1>PANEL ADMIN PONDOK PESANTREN AL-QUR'AN AL-FALAH</h1>

    </div>
    <!-- Tempatkan konten admin di sini -->


    <div class="container">

        <!-- Form tambah berita -->
        <div class="container-form">
            @isset($info_pendaftaran)
            <h1>EDIT INFORMASI PENDAFTARAN</h1>
            <form action="/controlpanel/admin/info-pendaftaran/edit/{{ $info_pendaftaran->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_instansi">Nama Instansi:</label>
                    <input type="text" id="nama_instansi" name="name" value="{{ $info_pendaftaran->name }}" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" id="alamat" name="address" value="{{ $info_pendaftaran->address }}" required>
                </div>
                <div class="form-group">
                    <label for="link">Link Pendaftaran:</label>
                    <input type="text" id="link" name="link" value="{{ $info_pendaftaran->link }}" required>
                </div>
                <div class="add-news-button">
                    <button type="submit">Edit Informasi Pendaftaran</button>
                </div>
            </form>
            @else
            <h1>TAMBAH INFORMASI PENDAFTARAN</h1>

            <form action="/controlpanel/admin/info-pendaftaran" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul">Nama Instansi:</label>
                    <input type="text" id="nama_instansi" name="name" required>
                </div>
                <div class="form-group">
                    <label for="author">Alamat:</label>
                    <input type="text" id="alamat" name="address" required>
                </div>
                <div class="form-group">
                    <label for="author">Link Pendaftaran:</label>
                    <input type="text" id="link" name="link" required>
                </div>

                <div class="add-news-button">
                    <button type="submit">Tambah</button>
                </div>
                
            </form>
            @endisset
        </div>


    </div>
    
@endsection