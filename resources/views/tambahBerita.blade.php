@extends('layouts.admin.layout')
@section('content')
    <div class="container-head">
        <h1>PANEL ADMIN PONDOK PESANTREN AL-QUR'AN AL-FALAH</h1>

    </div>
    <!-- Tempatkan konten admin di sini -->


    <div class="container">

        <!-- Form tambah berita -->
        <div class="container-form">


            @isset($berita)
                <h1>EDIT BERITA</h1>
                <form action="/controlpanel/admin/berita/edit/{{ $berita->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul:</label>
                        <input type="text" id="judul" name="judul" value="{{ $berita->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="author">Author:</label>
                        <input type="text" id="author" name="author" value="{{ $berita->author }}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" id="tanggal" name="tanggal" value="{{ $berita->date }}" required>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi Berita:</label>
                        <textarea id="editor" name="isi">{{ $berita->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto:</label>
                        <input type="file" id="foto" name="foto" accept="image/*">
                    </div>

                    <div class="add-news-button">
                        <button type="submit">Edit Berita</button>
                    </div>


                </form>
            @else
                <h1>TAMBAH BERITA</h1>

                <form action="/controlpanel/admin/berita" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul:</label>
                        <input type="text" id="judul" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="author">Author:</label>
                        <input type="text" id="author" name="author" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi Berita:</label>
                        <textarea id="editor" name="isi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto:</label>
                        <input type="file" id="foto" name="foto" accept="image/*" required>
                    </div>

                    <div class="add-news-button">
                        <button type="submit">Tambah Berita</button>
                    </div>

                </form>
            @endisset
        </div>

    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor

            .create(document.querySelector('#editor'), {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle',
                    'ImageToolbar', 'ImageUpload', 'MediaEmbed'
                ],
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
