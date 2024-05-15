@extends('layouts.admin.layout')
@section('content')

<div class="container-head">
    <h1>PANEL ADMIN PONDOK PESANTREN AL-QUR'AN AL-FALAH</h1>

</div>
<!-- Tempatkan konten admin di sini -->


<div class="container">

    <!-- Form tambah berita -->
    <div class="container-form">
        
        
        @isset($pengasuh)
        <h1>EDIT Pengasuh</h1>
        <form action="/controlpanel/admin/pengasuh/edit/{{ $pengasuh->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" value="{{ $pengasuh->name }}" required>
            </div>
            <div class="form-group">
                <label for="position">Jabatan:</label>
                <input type="text" id="position" name="position" value="{{ $pengasuh->position }}" required>
            </div>
            <div class="form-group">
                <label for="description">Keterangan:</label>
                <textarea name="description">{{ $pengasuh->description }}</textarea>
            </div>
        
            <div class="form-group">
                <label for="image">Foto:</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>
            
            <div class="add-news-button">
                <button type="submit">Edit Pengasuh</button>
            </div>

            
        </form>
        @else
        <h1>TAMBAH Pengasuh</h1>

        <form action="/controlpanel/admin/pengasuh" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="position">Jabatan:</label>
                <input type="text" id="position" name="position" required>
            </div>
            <div class="form-group">
                <label for="description">Keterangan:</label>
                <textarea name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Foto:</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>
            <div class="add-news-button">
                <button type="submit">Tambah Pengasuh</button>
            </div>
        </form>


        @endisset
    </div>

</div>
@endsection
