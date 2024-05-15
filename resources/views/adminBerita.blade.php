@extends('layouts.admin.layout')
@section('content')

<div class="container-head">
    <h1>PANEL ADMIN PONDOK PESANTREN AL-QUR'AN AL-FALAH</h1>

</div>
<!-- Tempatkan konten admin di sini -->


<div class="container">

    <h1>Berita</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Judul</th>
                <th>Author</th>
                <th>Tanggal</th>
                <th>Isi Berita</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($berita as $b)
                <tr>
                    <td>{{ $b->id }}</td>
                    <td><img style="width: auto; height: 100px;" src="{{ asset('images/berita/' . $b->image) }}"
                            alt="image"></td>
                    <td>{{ $b->title }}</td>
                    <td>{{ $b->author }}</td>
                    <td>{{ $b->date }}</td>
                    <td>{!! substr($b->content, 0, 100) !!}...</td>
                    <td>
                        <a href="/berita/{{ $b->slug }}"  class="view-button"><button>Lihat</button></a>
                        <a href="/controlpanel/admin/berita/edit/{{ $b->id }}"  class="edit-button"><button>Edit</button></a>
                        <a href="/controlpanel/admin/berita/hapus/{{ $b->id }}"  class="delete-button"><button>Hapus</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="add-news-button">
        <a href="/controlpanel/admin/berita/tambah"><button>Tambah Berita</button></a>
    </div>
</div>
@endsection