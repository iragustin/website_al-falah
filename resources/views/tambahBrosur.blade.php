@extends('layouts.admin.layout')
@section('content')

<div class="container-head">
    <h1>PANEL ADMIN PONDOK PESANTREN AL-QUR'AN AL-FALAH</h1>

</div>
<!-- Tempatkan konten admin di sini -->


<div class="container">

    <!-- Form tambah berita -->
    <div class="container-form">
        
        
        @isset($brosur)
        <h1>EDIT Brosur</h1>
        <form action="/controlpanel/admin/brosur/edit/{{ $brosur->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" value="{{ $brosur->name }}" required>
            </div>
            <div class="form-group">
                <label for="image">Foto:</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>
            <div class="form-group">
                <label for="back_image">Foto Belakang:</label>
                <input type="file" id="image" name="back_image" accept="image/*">
            </div>
            <div class="form-group">
                <label for="description">Keterangan:</label>
                <textarea name="description">{{ $brosur->description }}</textarea>
            </div>
            
            <div class="add-news-button">
                <button type="submit">Edit Brosur</button>
            </div>

            
        </form>
        @else
        <h1>TAMBAH Brosur</h1>

        <form action="/controlpanel/admin/brosur" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="image">Foto:</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>
            <div class="form-group">
                <label for="back_image">Foto Belakang:</label>
                <input type="file" id="image" name="back_image" accept="image/*">
            </div>
            <div class="form-group">
                <label for="description">Keterangan:</label>
                <textarea name="description"></textarea>
            </div>

            <div class="add-news-button">
                <button type="submit">Tambah Brosur</button>
            </div>
        </form>


        @endisset
    </div>

</div>
@endsection
